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
            <meta name="description" content="Read about Goodtimes chorus supporters. The sponsors who support the acapella group.">
            <meta name="author" content="Web Wise Media">

            <title>Sponsors | Goodtimes Chorus</title>

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
                <h1>Thank You to Our Sponsors</h1>
            </div>
                <div class="container support">
                    <div class="row">
                        <div class="col-xs-12">
                            <p class>The members of the Arlington Goodtimes Chorus are pleased to recognize and thank the following individuals and firms who sponsor some or all of our events. Their contributions help us achieve our mission to...</p>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <p class="sponsors">
                            AAA Paint<br>
                            Abram Chiropractic Center<br>
                            Arkansas Lane Animal Hospital<br>
                            Barry Johnson CPA<br>
                            Bond Cleaners<br>
                            Cannon Florist<br>
                            Durant Toyota<br>
                            First Texas Insurance (Bob Walch)<br>
                            Grand Bank of Texas<br>
                            Greg Schellhammer, Attorney<br>
                            Hank Jacobs DDS<br>
                            IC Wellness<br>
                            Independent Security
                            </p>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <p class="sponsors">

                            James T. Rudd, Attorney<br>
                            John McDonald, MD<br>
                            Keiffer's Janitorial<br>
                            Lone Star Inspection<br>
                            Main Lane Auto<br>
                            Max Hair Design<br>
                            Michael Remme, J.D.<br>
                            Museum of IT at Arlington<br>
                            Nuts and Bolts Hardware<br>
                            Phil Mitchell, J.D.<br>
                            Piccolo Mondo<br>
                            Premier Printing<br>
                            Robert D. Courtney<br>
                            RTM Realty<br>
                            Sanford Spa & Salon<br>
                            Shofner Auto Repair<br>
                            Short Motor Company
                            </p>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                            <p class="sponsors">
                            Skillet and Grill<br>
                            State Farm Insurance (Charles England)<br>
                            The Sanford House<br>
                            Symphony Arlington<br>
                            Unfinished Business<br>
                            Upscale Quartet<br>
                            Whitsell and Company, P.C.<br>
                            WHS J Bergstrom, MD<br>
                            WHS Nangrani, D.O.<br>
                            WHS Peppler, M.D.<br>
                            WHS Puffer, M.D.<br>
                            WHS Watson, M.D.
                            </p>
                        </div>


                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>