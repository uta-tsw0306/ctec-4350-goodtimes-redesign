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
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h1>UTA Voice Scholarship</h1>
                        </div>

                        <div class="col-xs-12">
                            <p>Part of the Goodtimes chorus mission is to spread the joy of music - in particular, the joy of singing. As a non-profit organization, we devote a portion of the money we earn to provide service to the community. Among our most recent endeavors, the members of the Arlington Chapter have donated $10,000 to UTA in order to establish a Goodtimes Chorus Endowment. This endowment is a self-sufficient fund, permanently providing scholarships to voice majors at UTA.</p>
                            <p>The first scholarship was distributed in 2017. The recipient of this scholarship, in the amount of $500.00, was Hunter Avant, a Baritone in the UTA Chorus.</p>
                            <p>The chorus will continue to make contributions to this Endowment so that larger scholarships can be handed out or multiple students can be supported. If you would like to assist in providing scholarships to future singers, the Goodtimes Chorus will be happy to apply your donation to this Endowment! Call our hotline at 682-233-3606.</p>
                        </div>

                       
                        
                    </div>




                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
