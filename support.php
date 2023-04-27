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

            <title>Support | Goodtimes Chorus</title>

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
                <div class="container support">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2>Support Us</h2>
                        </div>
                        <div class="col-xs-12 col-lg-5">
                            <img src="donate.jpg" alt="Male volunteer holding a donation box">
                        </div>
                        <div class="col-xs-12 col-lg-7">
                            <p class="home_pg_text">As a non-profit organization, we rely on the generosity of our friends and supporters to fund our programs and events. Your contribution can help us continue to spread the love of a cappella music to audiences of all ages. Whether you make a one-time donation or become a regular sponsor, we'd be honored to have your support.</p><br><br>

                            <p>To participate as a donor please <a href="#">contact us</a>.</p><br><br>

                            <p>Thank you for considering the Goodtimes Chorus as your partner in promoting the beauty of barbershop harmony.</p>
                        
                        </div>
                        <div class="col-xs-12">
                            <hr>
                            <p>Here are some ways your donation can make a difference:</p>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            
                            <p class="donationP">$50-99</p>
                            <ul>
                                <li>Buy the sheet music rights for one new song</li>
                                <li>Buy Goodtimes Chorus shirts for 2-4 new members</li>
                                <li>Send a high school quartet to Harmony Explosion camp</li>
                            </ul>

                            <p class="donationP">$100-199</p>
                            <ul>
                                <li>Buy a tuxedo for a new member</li>
                            </ul>

                            <p class="donationP">$200-299</p>
                            <ul>
                                <li>Buy a riser back rail</li>
                                <li>Buy a riser 4th row</li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-lg-6">
                            <p class="donationP">$400-1599</p>
                            <ul>
                                <li>Buy a new riser section</li>
                                <li>Send a music teacher to a week-long training school focused on a cappella singing</li>
                            </ul>

                            <p class="donationP">$1400-2999</p>
                            <ul>
                                <li>Buy a new sound system</li>
                            </ul>

                            <p class="donationP">$3000+</p>
                            <ul>
                                <li>Underwrite our annual show</li>
                                <li>Buy an acoustic shell for singing outdoors or in noisy locations</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>