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
                    
                    <div class="row">
                      <div class='col-xs-12 centerImage'>
                       <iframe src="https://calendar.google.com/calendar/embed?height=600&wkst=1&bgcolor=%23ffffff&ctz=America%2FChicago&src=ZTU4MzFiZTlhOGYyYmI2MTBiMTE0YzA0YTM1ZGI1OWFhNzg1YWE2NTkwOTY1MWM4MjhhZmFiMzVjOGQ3ODY3NEBncm91cC5jYWxlbmRhci5nb29nbGUuY29t&color=%23F09300" style="border:solid 1px #777" width="800" height="600" frameborder="0" scrolling="no"></iframe>
                      </div>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
