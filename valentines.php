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
            <meta name="description" content="Reserve your singing valentine from Goodtimes chorus and deliver musical excellences to a loved one.">
            <meta name="author" content="Web Wise Media">

            <title>Singing Valentines | Goodtimes Chorus</title>

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
                <h1>Singing Valentines</h1>
            </div>

            <div class="container">
                <div class="row">
                    
                    <div class="col-xs-12 col-lg-5">
                        <img src="sv_flyer.jpeg" alt="Singing Valentines Flyer">
                    </div>

                    <div class="col-xs-12 col-lg-6">

                        <p>Get ready to surprise your loved ones with Singing Valentines delivered by the talented quartets of The Goodtimes Chorus!</p>
                        
                        <p>Our dapper gents in tuxedos will arrive with a silk rose and a Valentine's card to serenade your wife, husband, boss, colleagues, or anyone you fancy at the location of your choice - be it a restaurant, shopping mall, retirement home, or even your workplace. We're available to travel and sing anytime from 9 am to 9 pm on February 14th. Don't miss out on this special opportunity to make someone's day! 
                        
                        <p>Book by calling our hotline at 682-233-3606 or emailing us at gtchorus@gmail.com. Prices start from $59.</p>

                        <div class="flex-buttons about">
                            <a href="contact.php" class="btn btn-primary" title="Contact Us" id="btn-1">Contact Us</a>
                            <a href="#serenades" class="btn btn-primary" title="See Videos" id="btn-2">See Videos</a>
                        </div> 
                    </div>
                    <div class="col-xs-12">
                        <h2 id="serenades" class="center_text">See Past Serenades</h2>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <iframe width="400px" height="300px" src="https://www.youtube.com/embed/rqjtM8ng1D8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <iframe width="400px" height="300px" src="https://www.youtube.com/embed/v1Owj4FNylE" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                    <div class="col-xs-12 col-lg-4">
                        <iframe width="400px" height="300px" src="https://www.youtube.com/embed/zNlPx-_CzVI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>

                </div>
            </div>
            
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>