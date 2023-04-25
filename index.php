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
            <meta name="description" content="">
            <meta name="author" content="Web Wise Media">

            <title>Home | Goodtimes Chorus</title>

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
                <div class="hero-image">
                    <div class="hero-text">
                        <h1>Singing in Harmony Since 1962</h1>
                    </div>
                </div>
                <div class="container home">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="center_text">The Goodtimes Chorus of Arlington, TX</h2>
                        </div>
                        <div class="col-xs-12 col-lg-5">
                            <img src="gtchorus1.jpg" alt="Choir singing in formal attire">
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <p class="home_pg_text">The Goodtimes Chorus (GTC) is an a cappella chorus based in Arlington, Texas. We are a chapter of the <a href="https://www.barbershop.org/">Barbershop Harmony Society (BHS)</a> - formerly known as the S.P.E.B.S.Q.S.A. - in the highly competitive <a href="https://www.swd.org/">Southwest District of Champions</a>. Founded in 1962, our mission has been to spread good times and the joys of four-part harmony throughout the Dallas/Fort Worth Metroplex. We take great pride in our many awards over the years, and we remain dedicated to continual improvement. It's both lots of fun and lots of hard work, as we strive to be the best we can be.

                            </p>
                        </div>

                        <div class="col-xs-12 col-lg-7">
                            <h2 class="heading center_text">All Singers Welcome!</h2>
                            <p>Ready to harmonize? Become a member of the Goodtimes Chorus and share your voice with the community. Whether you're an experienced or inexperienced singer, we are always thrilled to have new men and women join our musical family!</p>
                            <div class="button_div">
                                <button class="button">Join</button>
                            </div>
                        </div>

                        <div class="col-xs-12 col-lg-5">
                            <h2 class="heading center_text">Hire Us</h2>
                            <p>Experience the joy of a capella music like never before. From intimate gatherings to grand celebrations, our tailored performances are designed to fit your event, your venue, and your theme.</p>
                            <div class="button_div">
                                <button class="button">Book</button>
                            </div>
                        </div>

                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>