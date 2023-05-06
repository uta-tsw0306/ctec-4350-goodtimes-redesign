<?php
	  include("dbconn.inc.php"); 
      include ("shared_session.php");
      include ('shared.inc.php');
      
        $conn = dbConnect();
        $photoRows = "";
    
    	$sql = "SELECT `PVID`, `UID`, `TID`, `Added`, `Name`, `URL`, `altTxt`, `caption`, `inGallery` FROM `PHOTOS_VIDEOS`";
    	
    	/* create a prepared statement */
    	$stmt = $conn->stmt_init();
    		
    	if ($stmt->prepare($sql)) {
    
    		/* execute statement */
    		$stmt->execute();
    
    		/* bind result variables */
    		$stmt->bind_result($PVID, $UID, $TID, $Added, $Name, $URL, $altTxt, $caption, $inGallery);
    
    		
            print("<ul>");
    		/* fetch values */
    		while ($stmt->fetch()) {
    		    if($inGallery && $TID == 1){
    		       $photoRows .= 
    		       "<div class='col-xs-12 col-lg-4'>
                        <img class='' src='$URL' alt='$altTxt'>
                        <figcaption>$caption</figcaption>
                    </div>";
    		    }
    			
    		}
    		print("</ul>");
    
    		/* close statement */
    		$stmt->close();
    
    	} else {
    		print ("query failed");
    	}
    
    /* close connection */
    $conn->close();
?>
<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="keywords" content="">
            <meta name="description" content="">
            <meta name="author" content="Web Wise Media">

            <title>Photos | Goodtimes Chorus</title>

            <link rel="stylesheet" href="style.css">

            <script src="https://kit.fontawesome.com/403c2f4f58.js" crossorigin="anonymous"></script>


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
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 page-title">
                            <h1>Photos of the Chorus</h1>
                        </div>
                    </div>
                    
                    <div class="row centerImage">
                       <?php echo $photoRows ?>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
