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

            <title>About | Goodtimes Chorus</title>

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
                <h1>Who We Are</h1>
            </div>

            <div class="container about-page">
                <div class="row">
                    
                    <div class="col-xs-12 ">
                        <img src="chorus_ptpg_10.jpeg" alt="Photo of chorus wearing formal wear">
                    </div>

                    <div class="col-xs-12 ">

                        <p class="">The Goodtimes Chorus (GTC) is an a cappella chorus based in Arlington, Texas. We are a chapter of the <a href="https://www.barbershop.org/" title="Barbershop Harmony Society Website">Barbershop Harmony Society (BHS)</a> - formerly known as the S.P.E.B.S.Q.S.A. - in the highly competitive <a href="https://www.swd.org/" title="swd.org">Southwest District of Champions.</a> Founded in 1962, our mission has been to spread good times and the joys of four-part harmony throughout the Dallas/Fort Worth Metroplex. We take great pride in our many awards over the years, and we remain dedicated to continual improvement. It's both lots of fun and lots of hard work, as we strive to be the best we can be.</p>
                        <p>Join us every Tuesday evening from 7:00 to 9:30 at Epworth United Methodist Church, located at 1400 South Cooper St., Arlington, TX, just north of Park Row and behind the Starbucks. Our friendly group welcomes newcomers with open arms.

                        <p>Our rehearsals are led by a talented Director and Music Team who bring a wealth of humor, energy, and expertise to each session. For further details, please visit our contact page to get in touch with us.</p>

                        <div class="flex-buttons about">
                            <a href="videos.php" class="btn btn-primary" title="Watch Videos" id="btn-1">Watch Videos</a>
                            <a href="support.php" class="btn btn-primary" title="Donate" id="btn-2">Donate</a>
                        </div>
                    </div>

                </div>
            </div>
            
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>