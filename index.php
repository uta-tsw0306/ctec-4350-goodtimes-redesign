<?php
	include ('shared.inc.php');
	include("dbconn.inc.php"); 
    include ("shared_session.php");	
    
      $conn = dbConnect();
        $photoRows = "";
    
    	$sql = "SELECT `PVID`, `UID`, `TID`, `Added`, `Name`, `URL`, `altTxt`, `caption`, `inGallery` 
            FROM `PHOTOS_VIDEOS` 
            WHERE `TID` = 2
            ORDER BY `added` DESC
            LIMIT 3";
                	
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
    		       $photoRows .= 
    		       "
    		       <div class=\"col-xs-12 col-lg-4 home-videos\">
                        <iframe  height=\"300px\" src=\"https://www.youtube.com/embed/$URL\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>
                   </div>
    		       ";
    			
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

            <title>Home | Goodtimes Chorus</title>

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
                <div class="hero-image">
                    <div class="hero-text">
                        <h1>Singing in Harmony Since 1962</h1>
                        <p>Welcome to the Goodtimes Chorus website where we are proud to be a part of the vibrant and passionate community of barbershop harmony singers!</p>
                        <div class="flex-buttons">
                            <a href="support.php" class="btn btn-primary" title="Donate" id="btn-2">Donate</a>
                        </div>
                    </div>

                </div>
                <div class="container home">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1 class="center_text addMargin">Connect With Us</h1>
                        </div>
                        <div class="col-xs-12 col-lg-6 homepgBox">
                            <div class="info-box">
                                <h2 class="heading center_text">All Singers Welcome!</h2>
                                <p>Ready to harmonize? Become a chorus member and share your voice with the community. Whether you're an experienced or novice singer, we're always thrilled to have new men and women join us!</p>
                                <div class="button_div">
                                    <a href="join.php" class="btn btn-primary" title="Join Us!" id="btn-2">Join Us!</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-6">
                            <div class="info-box">
                                <h2 class="heading center_text">Hire Us</h2>
                                <p>Experience the joy of a capella music like never before. From intimate gatherings to grand celebrations, our tailored performances are designed to fit your event, your venue, and your theme. Hire Us Today!</p>
                                <div class="button_div">
                                <a href="booking.php" class="btn btn-primary" title="Book an Event" id="btn-2">Book an Event</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <div class="mission_div">
                            <h1 class="center_text">Our Mission</h1>
                            <p>The Goodtimes Chorus is a group of talented singers who are passionate about achieving musical excellence, creating a sense of fellowship, and serving the community through the power of music. Our mission is to bring people together through our shared love of singing and to provide a positive impact on the community.</p>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <h1 class="center_text addMargin">Videos</h1>
                        </div>
                        
                        <?php echo $photoRows; ?>

                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>