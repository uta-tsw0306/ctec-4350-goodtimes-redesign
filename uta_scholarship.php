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

                        <div class="col-xs-12 col-lg-6">
                        <img src="uta.jpeg" alt="Photo of the UTA Arlington Campus">
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <p>Part of the Goodtimes Chorus' mission is to spread the joy of music, particularly the joy of singing. As a non-profit organization, we dedicate a portion of our earnings to provide community service. Among our recent initiatives, the members of the Arlington Chapter donated $10,000 to UTA to establish a Goodtimes Chorus Endowment. This endowment is a self-sustaining fund that provides permanent scholarships to voice majors at UTA.</p>
                            <p>The first scholarship was awarded in 2017. The recipient of the scholarship, in the amount of $500.00, was Hunter Avant, a baritone in the UTA Chorus.</p>
                        </div>
                        <div class="col-xs-12">
                            <p>The chorus will continue to contribute to this Endowment so that larger scholarships can be awarded or multiple students can be supported. If you would like to assist in providing scholarships to future singers, the Goodtimes Chorus would be pleased to apply your donation to this Endowment! Please contact us. </p>
                            <a href="contact.php" class="btn btn-primary" title="Contact Us" id="btn-1">Contact Us</a>
                        </div>

                       
                        
                    </div>




                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
