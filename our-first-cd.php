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

            <title>Our First CD | Goodtimes Chorus</title>

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
                <h1>Our First CD</h1>
            </div>

            <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12 col-lg-3">
                        <img src="gtc-cd.jpeg" alt="Photo of the front of the Goodtimes Chorus CD">
                    </div>

                    <div class="col-xs-12 col-lg-3">
                        <img src="gtc-cd2.jpeg" alt="Photo of the back of the Goodtimes Chorus CD">
                    </div>

                    <div class="col-xs-12 col-lg-6">

                        <p><b>We have released our first CD, titled Where The Goodtimes Are!</b></p>

                        <p>You can purchase this CD to enjoy the sounds of the Goodtimes Chorus and Chapter Quartets for only $12.</p>

                        <p>Please order by emailing or calling us.</p><p> Thank you for your support!</p>

                        <div class="flex-buttons about">
                            <a href="contact.php" class="btn btn-primary" title="Contact Us" id="btn-1">Contact Us</a>
                            <a href="support.php" class="btn btn-primary" title="Donate" id="btn-2">Donate</a>
                        </div>
                    </div>

                </div>
            </div>
            
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
