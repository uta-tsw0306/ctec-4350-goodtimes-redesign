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
            <meta name="description" content="">
            <meta name="author" content="Web Wise Media">

            <title>UTA Voice Scholarship | Goodtimes Chorus</title>

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
                    <h1>UTA Voice Scholarship</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <p>The Goodtimes Chorus has donated $10,000 to UTA in order to establish a scholarship endowment. This is a self sufficient permanent fund, providing annual scholarships to music department singers at UTA. The winners are selected by audition.</p>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-3">
                            <img src="Emma_Gervasi.jpg" alt="Emma Gervasi">
                        </div>
                        
                        <div class="col-xs-12 col-lg-3">
                            <p>Emma Gervasi won the scholarship in 2021. She is a graduate of Martin High School. Emma has just finished her junior year studying Musical Theatre with a Business Administration minor and sings soprano.</p>
                        </div>
                        <div class="col-xs-12 col-lg-3">
                            <img src="Killian_Watt.jpg" alt="Killian Watt">
                        </div>
                        <div class="col-xs-12 col-lg-3">
                           <p>The 2922 recipient of the scholarship is Killian Watt. Killian sings baritone and is active in the A Cappella Choir, the opera group, and too many other activities to contemplate.</p>
                        </div>
                    </div>
                
                    
                    <div class="row">
                        <div class="col-xs-12 col-lg-2">
                            <br>
                            <img src="QR_code.png" alt="QR Code">
                        </div>
                        <div class="col-xs-12 col-lg-10">
                           <p>We will continue to make contributions to this Endowment so that larger scholarships can be handed out. If you would like to assist in providing scholarships to future singers at UTA, you can speak to any of the chorus members or click on this QR code with your phone.</p>
                        </div>
                    </div>





                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
