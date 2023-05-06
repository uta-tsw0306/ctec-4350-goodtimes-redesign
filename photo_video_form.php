<?php
	include ('shared.inc.php');
	include("dbconn.inc.php"); 
    include ("shared_session.php");
?>

<script>
function init(){
   var Mphoto = document.getElementById('media_photo');
   var Mvideo = document.getElementById('media_video');
   
   document.getElementById("formBase").style.display = "none";
   document.getElementById("URLinput").style.display = "none";
   document.getElementById("imgUpload").style.display = "none";
   document.getElementById("submit_button").style.display = "none";
   
   if(Mphoto.checked == true){makeForm(1);}
   if(Mvideo.checked == true){makeForm(2);}

  Mphoto.onclick = function(){
      if(Mphoto.checked == true){
          makeForm(1);
      }
  }

  Mvideo.onclick = function(){
       if(Mvideo.checked == true){
          makeForm(2);
      }
      
  }
    
}

function makeForm(type){
    document.getElementById("formBase").style.display = "block";

    if(type == 1){
        document.getElementById("imgUpload").style.display = "block";
        document.getElementById("URLinput").style.display = "none";
    }
    
    else if(type == 2){
        document.getElementById("URLinput").style.display = "block";
        document.getElementById("imgUpload").style.display = "none";
    }
    
    document.getElementById("submit_button").style.display = "block";
}


window.onload = init;
</script>

<?php

//photo upload stuff

//Db conn stuff

$conn = dbConnect();

$TID=""; $Name=""; $URL=""; $altTxt=""; $caption=""; $inGallery="";

$errMsg = "";

if (isset($_GET['PVID'])) { 

	$PVID = intval($_GET['PVID']); 

	//echo($PVID);
	
	if ($PVID > 0){
			
		//compose a select query
		$sql = "SELECT `TID`, `Name`, `URL`, `altTxt`, `caption`, `inGallery` FROM `PHOTOS_VIDEOS` WHERE `PVID` = ?";
			
		$stmt = $conn->stmt_init();
		

		if($stmt->prepare($sql)){
		    
			$stmt->bind_param('i',$PVID);
			$stmt->execute();
			
				
			$stmt->bind_result($TID, $Name, $URL, $altTxt, $caption, $inGallery); 
			$stmt->store_result();
				
		
			if($stmt->num_rows == 1){
				$stmt->fetch();
			} else {
				$errMsg = "<div class='error'>Information on the record you requested is not available.  If it is an error, please contact the webmaster.  Thank you.</div>";
				$PVID = ""; 
			}

		} else {
			
			$PVID = "";
		
			$errMsg = "<div class='error'> If you are expecting to edit an exiting item, there are some error occured in the process -- the selected product is not recognizable.  Please follow the link below to the product adminstration interface or contact the webmaster.  Thank you.</div>";
		}
		
		//echo("<br>hello end of php reached<br>");
		$stmt->close();
	} 
	
} else{$PVID = "";}


?>



<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" href="style.css">
<title>File upload</title>
</head>

<body>
<?php 
    if(is_session_started() === FALSE || empty($_SESSION['access'])){echo $basicNav;}
    else if ($_SESSION['access'] == true){
        $thisUID = $_SESSION['UID'];
        $thisUserAdmin = $_SESSION['Admin'];
        if($thisUserAdmin){echo $adminNav;}
        else {echo $loggedInNav;}
    }else {echo $basicNav;}
    ?>

<!--<div style="margin: 1em;"><//?=$message?></div>-->
    
<form action="edit_photo_video.php" method="post" enctype="multipart/form-data" name="uploadImage" id="uploadImage">
    <input type="hidden" name="PVID" value="<?=$PVID?>">
        <div class="page-title">
            <h1>Photos and Videos Upload</h1>
        </div>
        <p>The media type, a name and a URL are reqired.</p>
        <label for="media_type">Media Type:</label>
        <input class = "width20" type="radio" id="media_photo" name="media_type" value="1" <?php if($TID == 1){echo("checked");} ?>>Photo&emsp;<input class = "width20" type="radio" id="media_video" name="media_type" value="2" <?php if($TID == 2){echo("checked");} ?>>Video&emsp;
        
        <div id="formBase">
        
            <div>
    		<label for="Name" id="NameLabel">Name: </label>
    		<input id="Name" type="text" name="Name" size="100" value="<?= htmlentities($Name)?>">
    		</div>
    		
    		<div>
    		<label for="altTxt" id="altTxtLabel">Alt Text: </label>
    		<input id="altTxt" type="text" name="altTxt" size="100" value="<?= htmlentities($altTxt)?>">
    		</div>
    		
    		<div>
    		<label for="caption" id="captionLabel">Caption: </label>
    		<input id="caption" type="text" name="caption" size="100" value="<?= htmlentities($caption)?>">
    		</div>
            
            <div>
            <label for="galleryBit">Does this go in the gallery?</label>
            <input class = "width20" type="radio" id="galleryBit" name="galleryBit" value="0" <?php if(!$inGallery){echo("checked");} ?>>
                No&emsp;<input class = "width20" type="radio" id="galleryBit" name="galleryBit" value="1" <?php if($inGallery){echo("checked");} ?>>Yes&emsp;    
            </div>
        
        </div>
        
        <div id= "URLinput">
		<label for="URL" id="URLLabel">URL (for youtube videos): </label>
		<input id="URL" type="text" name="URLvideo" size="100" value="<?=$URL?>" >
		<p>In this box you must put the Video ID of the YouTube Video. The video ID will be located in the URL of the video page, right after the v= URL parameter. In this case, the URL of the video is: https://www.youtube.com/watch?v=aqz-KE-bpKQ. Therefore, the ID of the video is aqz-KE-bpKQ. If this is not input correctly the Video will not work.</p>
		</div>
        
        <div id = "imgUpload">
		<label for="image">Upload image:</label>
        <input type="file" name="image" id="image" /> 
        <input type="hidden" name="URLphoto" value="<?=$URL?>">
        </div>
        
    </p>
    <div id="submit_button">
        <p>
            <input type="submit" name="upload" id="upload" value="Upload" />
        </p>
    </div>
        
</form>



<pre>
<?php
// for debugging purpose
/*
if (array_key_exists('upload', $_POST)) {
  print_r($_FILES);
  } */
?>
</pre>
</body>
</html>