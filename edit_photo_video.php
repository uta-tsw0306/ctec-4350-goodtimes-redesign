<?php
// acquire shared info from other files
include("dbconn.inc.php"); // database connection 
include("shared.inc.php"); // stored shared contents, such as HTML header and page title, page footer, etc. in variables
include ("shared_session.php");

// make database connection
$conn = dbConnect();

// Process only if there is any submission
if (isset($_POST['upload'])) {
    
    
    //echo("hello post is set <br>");
    
    if (!empty($_FILES['image']['tmp_name']) && $_FILES['image']['size'] > 0) {

        //echo("hello array_key_exists <br>");
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF); 
        $isAllowed = 0;
        $upload = 0;
        
        
        // supress the error/warning message.  Disable it to begin with so you see the error message provided by the php engine
        error_reporting(0);
            
        
            $detectedType = exif_imagetype($_FILES['image']['tmp_name']);
            
            if (in_array($detectedType, $allowedTypes)) {
            $isAllowed = 1;
            }
            
          // define constant for upload folder
          define('UPLOAD_DIR', '/home/erm2015/CTEC4350.erm2015.uta.cloud/goodtimeChorus/images/');
          
          $filename = trim(addslashes($_FILES['image']['name']));
          $filename = str_replace(' ', '_', $filename);
          $_FILES['image']['name'] = $filename;
          
          if($isAllowed == 1){ 
              // move the file to the upload folder and rename it
              if (move_uploaded_file($_FILES['image']['tmp_name'], UPLOAD_DIR.$filename)){
                  // upload successful
                  $message = "The selected file has been successfully uploaded.";
                  $upload = 1;
                  //echo("upload 1");
              } else {
                  // something is wrong
                  $message = "We have encountered issues in uploading this file.  Please try again later or contact the web master. ";
              }
          } else{
              echo("This type of file is not allowed.<br>");
          }
} else{
    $upload = 0;
}
	// ==========================
	//vaUIDate user input
	
	
	// set up the required array 
	//echo($_SESSION['UID']);
	
	$UID = $_SESSION['UID'];

    $required = array("Name", "URL", "media_type");

	// set up the expected array
	$expected = array("PVID", "Name", "altTxt", "caption", "galleryBit", "URL", "media_type"); // again, the spelling of each item should match the form field names
    
    // set up a label array, use the field name as the key and label as the value
    $label = array ('PVID'=>'PVID', 'Name'=>'Name', "altTxt"=>'Alt Txt', 'caption'=>'Caption', "galleryBit"=>'Gallery Bit', 'URL'=>'URL', 'media_type'=>'Media Type');


	$missing = array();
	
	foreach ($expected as $field){
		// Under what conditions the script needs to record a field as missing -- $field is required and one of the following two (1)  $_POST[$field] is not set or (2) $_POST[$field] is empty
        
        // Enable the line below to debug
		//echo "$field: in_array(): ".in_array($field, $required)." empty(_POST[$field]): ".empty($_POST[$field])."<br>"; 

		if (in_array($field, $required) && empty($_POST[$field])) {
			array_push ($missing, $field);
			${$field} = "";
		
		} else {
			// Passed the required field test, set up a variable to carry the user input.  
			// Note the variable set up here uses the $field value as the veriable name. Notice the syntax ${$field}.  This is a "variable variable". For example, the first $field in the foreach loop here is "title" (the first one in the $expected array) and a $title variable will be created.  The value of this variable will be either "" or $_POST["title"] depending on whether $_POST["title"] is set up.
            // once we run through the whole $expected array, then these variables, $title, $artist, $price, $categoryID, $pDtail, and $pid, will be generated.
            
			if (!isset($_POST[$field])) {
				//$_POST[$field] is not set, set the value as ""
				${$field} = "";
			} else {
				
				${$field} = $_POST[$field];
				
			}
		
		}

	}
	
	if($upload){
	
	if (($key = array_search('URL', $missing)) !== false) {
    unset($missing[$key]);
    }
	
    $URL = "images/".$filename;
    //echo("URL is: ".$URL."<br>");
    }

	//if (str_contains($URL, ' ')) {array_push ($missing, "URL");}
	if (!$UID) {array_push ($missing, "UID");}
	
	
	//echo("Admin: $Admin");

	//print_r ($missing); // for debugging purpose

	/* add more data vaUIDation here */
	// ex. $price should be a number

	/* proceed only if there is no required fields missing and all other data vaUIDation rules are satisfied */
	if (empty($missing)){
	    	//echo("hello right after empty missing");
	    if(!$galleryBit){ $galleryBit = 0;}

		//========================
		// processing user input

		$stmt = $conn->stmt_init();


		// compose a query: Insert or Update? Depending on whether there is a $pid.
		
		//echo("UID: $UID<br>");
		$stmt_prepared = 0;
		//echo("hello right before PVID !=");
		if ($PVID != "") {
		    //echo("<br> UID != NOTHING");
			/* there is an existing pid ==> need to deal with an existing reocrd ==> use an update query */ 
			
			// Ensure $pid contains an integer. 
			$UID = intval($UID); 
			$media_type = intval($media_type);
			//echo("hello right before sql");

			$sql = "UPDATE `PHOTOS_VIDEOS` SET `UID`=?,`TID`=?, `Name`=?,`URL`=?,`altTxt`=?,`caption`=?,`inGallery`=? WHERE `PVID`= ?";
				
			if($stmt->prepare($sql)){

				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.
				$stmt->bind_param('iissssii', $UID, $media_type, $Name, $URL, $altTxt, $caption, $galleryBit, $PVID);
				//echo("<br>UID: ".$UID.", Media type:".$media_type.", Name: ".$Name.", URL: ".$URL.", Alt Text:".$altTxt.", Caption:".$caption.", In Gallery:".$galleryBit.", PVID:".$PVID);
				
				$stmt_prepared = 1;// set up a variable to signal that the query statement is successfully prepared.
			}

		} else {

		    $PVID = "";
			// no existing pid ==> this means no existing record to deal with, then it must be a new record ==> use an insert query
			$sql = "INSERT INTO `PHOTOS_VIDEOS`(`UID`, `TID`, `Name`, `URL`, `altTxt`, `caption`, `inGallery`) VALUES (?, ?, ?, ?, ?, ?, ?)";
			//echo("<br>UID: ".$UID.", Media type:".$media_type.", Name: ".$Name.", URL: ".$URL.", Alt Text:".$altTxt.", Caption:".$caption.", In Gallery:".$galleryBit);

			if($stmt->prepare($sql)){
                
				// Note: user input could be an array, the code to deal with array values should be added before the bind_param statment.
                
				$stmt->bind_param('iissssi', $UID, $media_type, $Name, $URL, $altTxt, $caption, $galleryBit);
				
				$stmt_prepared = 1; // set up a variable to signal that the query statement is successfully prepared.
				
			}
		}
		
		//echo("<br>STMT preped: $stmt_prepared");

		if ($stmt_prepared == 1){
		    
			if ($stmt->execute()){
			    
                
                // NOTE: the following code does not produce most user-friendly message.  Particularly the category information is presented as an number which the user will have no idea about.  Can you fix it?
                
				$output = "<span class='success'>Success!</span><p>The following information has been saved in the database:</p>";
				
				
				 header("Location:photo_video_list.php");
                 exit; 
                 
			} else {
				//$stmt->execute() failed.
				$output = "<div class='error'>Database operation failed.  Please contact the webmaster.</div>";
			}
		} else {
			// statement is not successfully prepared (issues with the query).
			$output = "<div class='error'>Database query failed.  Please contact the webmaster.</div>";
		}
		
		foreach($expected as $key){
			$output .= "<b>{$label[$key]}</b>: {$$key} <br>"; 
		}

	} else { 
		// $missing is not empty 
		$output = "<div class='center'><p>The following required fields are missing or incorrectly filled out in your form submission.  Please check your form again and fill them out.  Thank you.</p>\n";
		foreach($missing as $m){
			$output .= "<p>{$label[$m]}</p>\n";
		}
        	$output .= "</ul><br><a class=\"btn btn-secondary\" onclick=\"history.go(-1);\">Go back</a></div>\n";
	}

} else {
	$output = "<p>User information has been successfully submitted.</p>";
}


?>