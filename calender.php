<?php
	  include("dbconn.inc.php"); 
      include ("shared_session.php");
      include ('shared.inc.php');
?>

<!doctype html>
    <html>
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="keywords" content="">
            <meta name="description" content="">
            <meta name="author" content="Web Wise Media">

            <title>Calender | Goodtimes Chorus</title>

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
                    <h1>Calender</h1>
                </div>
                <div class="container">
                    
                    <div class="row centerImage">
                        <div class="col-lg-1">
                            <span class="fa-solid fa-arrow-left"></span>
                        </div>
                        <div class="col-lg-10">
                            <p>The week of the 17th to the 23rd</p>
                        </div>

                        <div class="col-lg-1 leftArrow">
                            <span class="fa-solid fa-arrow-right"></span>
                        </div>
                    </div>
                    
                    <div class="row">
                      <div class='col-xs-12 col-lg-2 dayBG'>
                       <p>Monday the 17th</p>
                      </div>
                      <div class='col-xs-12 col-lg-2 dayBG'>
                       <p>Tuesday the 18th</p>
                       <p>Live rehearsal - 7-9:30pm</p>
                      </div>
                      <div class='col-xs-12 col-lg-2 dayBG'>
                       <p>Wednesday the 19th</p>
                      </div>
                      <div class='col-xs-12 col-lg-2 dayBG'>
                       <p>Thursday the 20th</p>
                      </div>
                      <div class='col-xs-12 col-lg-2 dayBG'>
                       <p>Friday the 21st</p>
                      </div>
                      <div class='col-xs-12 col-lg-2 dayBG'>
                       <p>Saturday the 22nd and Sunday the 23rd</p>
                      </div>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
