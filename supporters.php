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
            <meta name="description" content="Read about Goodtimes chorus supporters. The sponsors who support the acapella group.">
            <meta name="author" content="Web Wise Media">

            <title>Our Supporters | Goodtimes Chorus</title>

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
                            <h1>Our Supporters</h1>
                        </div>

                        <div class="col-xs-12">
                            <h3 class="center_text s_head">The members of the Arlington Goodtimes Chorus wish to thank the following individuals and firms who sponsor some or all of our events:</h3>
                        </div>

                        <div class="col-xs-12 col-lg-6">
                            <ul class="supporter_list">
                                <li>AAA Paint</li>
                                <li>Abram Chiropractic Center</li>
                                <li>Arkansas Lane Animal Hospital</li>
                                <li>Barry Johnson CPA</li>
                                <li>Bond Cleaners</li>
                                <li>Cannon Florist</li>
                                <li>Durant Toyota</li>
                                <li>First Texas Insurance</li>
                                <li>(Bob Walch)</li>
                                <li>Grand Bank of Texas</li>
                                <li>Greg Schellhammer, Attorney</li>
                                <li>Hank Jacobs DDS</li>
                                <li>IC Wellness</li>
                                <li>Independent Security</li>
                                <li>James T. Rudd. Attorney</li>
                                <li>John Mc Donald, MD</li>
                                <li>Keiffer's Janitorial</li>
                                <li>Lone Star Inspection</li>
                                <li>Main Lane Auto</li>
                                <li>Max Hair Design</li>
                                <li>Michael Remme, J.D.</li>
                                <li>Museum of IT at Arlington</li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-lg-6">
                            <ul class="supporter_list">
                                <li>Nuts and Bolts Hardware</li>
                                <li>Phil Mitchell, J.D.</li>
                                <li>Piccolo Mondo</li>
                                <li>Premier Printing</li>
                                <li>Robert D. Courtney</li>
                                <li>RTM Realty</li>
                                <li>Sanford Spa & Salon</li>
                                <li>Shofner Auto Repair</li>
                                <li>Short Motor Company</li>
                                <li>Skillet and Grill</li>
                                <li>State Farm Ins.</li>
                                <li>(Charles England)</li>
                                <li>The Sanford House</li>
                                <li>Symphony Arlington</li>
                                <li>Unfinished Business</li>
                                <li>Upscale Quartet</li>
                                <li>Whitsell and Company,P.C.</li>
                                <li>WHS J Bergstrom, MD</li>
                                <li>WHS Nangrani, D.O.</li>
                                <li>WHS Peppler, M.D.</li>
                                <li>WHS Puffer, M.D.</li>
                                <li>WHS Watson, M.D.</li>
                            </ul>
                        </div>


                        
                        
                    </div>




                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
