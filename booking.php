<?php
	include ('shared.inc.php');
	include("dbconn.inc.php"); 
    include ("shared_session.php");	
?>
<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="keywords" content="">
            <meta name="description" content="">
            <meta name="author" content="Web Wise Media">

            <title>Booking | Goodtimes Chorus</title>

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

            <div class="page-title">
                <h1>Want to Book Goodtimes Chorus?</h1>
            </div>

            <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12 col-lg-6">
                        <img src="chorus_ptpg_4.jpg" alt="Male choir singing wearing green vests">
                    </div>

                    <div class="col-xs-12 col-lg-6">

                        <p>From intimate gatherings to grand celebrations, our tailored performances are designed to fit your event, your venue, and your theme. Choose from our sophisticated formal outfits or let us match our costumes to your event's unique style.</p>

                        <p>Whether you're looking to create an upbeat atmosphere or to set a serene mood, the Goodtimes Chorus can deliver a performance that exceeds your expectations. We can adapt to any space, from cozy living rooms to stunning outdoor venues, and offer options ranging from a quartet to a full chorus.</p>

                        <p>Please contact us to book an event.</p>

                        <div>
                            <a href="contact.php" class="btn btn-primary" title="Contact Us" id="btn-1">Contact Us</a>
                        </div>  
                    </div>

                </div>
            </div>
            
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>