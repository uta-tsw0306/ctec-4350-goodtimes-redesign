<?php
	include ('shared.inc.php');
    include("dbconn.inc.php"); // database connection 
  include ("shared_session.php");
?>
<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="keywords" content="">
            <meta name="description" content="Read more about Goodtimes Barbershop Chorus mission statement and their vision as an acapella group.">
            <meta name="author" content="Web Wise Media">

            <title>Mission & Vision | Goodtimes Chorus</title>

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
                <h1>Mission and Vision</h1>
            </div>
                
                <div class="container mission-page">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <img src="chorus_ptpg_8.jpg" alt="Photo of Goodtimes Chorus choir dressed formally">
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <h2 class="">Mission Statement:</h2>
                            <p class="">The Goodtimes Chorus exists to pursue musical excellence, encourage fellowship, and provide service to the Community.</p>
                            <h2 class="">Vision Statement:</h2>
                            <p class="">To spread the joy of barbershop and other a cappella harmonies to our members and the community.</p>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            
                        </div>
                    </div>

                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>