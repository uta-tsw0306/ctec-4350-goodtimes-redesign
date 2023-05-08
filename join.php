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
            <meta name="description" content="Contact the Goodtimes chorus to further your interest in a Capella. Do not let inexperience hold you back all singers are welcome.">
            <meta name="author" content="Web Wise Media">

            <title>Join Us | Goodtimes Chorus</title>

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
                <h1>Join Our Musical Family</h1>
            </div>
            <div class="container">
                <div class="row">

                    <div class="col-xs-12 col-lg-6">
                        <img src="chorus_ptpg_13.jpg" alt="Male choir singing during a rehearsal">
                    </div>

                    <div class="col-xs-12 col-lg-6">
                        <p>If you love singing and want to be part of a fun and welcoming group, look no further!</p>
                        
                        <p>Don't let inexperience hold you back - we welcome singers of all levels, from beginners to experienced choristers. 
                        
                        <p>Whether you're already familiar with a cappella singing or just curious, we invite you to attend one of our rehearsals to sing along or simply listen.</p>

                        <p>Please contact us to join the chorus.</p>

                        <a href="contact.php" class="btn btn-primary" alt="Contact Us">Contact Us</a>

                    </div>

                </div>
            </div>

            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>