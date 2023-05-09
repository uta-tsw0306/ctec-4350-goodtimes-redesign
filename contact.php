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

            <title>Contact | Goodtimes Chorus</title>

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
                <h1>Contact Us</h1>
            </div>

                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="center_text contact">We'd Love to Hear From You!</h2>
                            <p class="contact_pg">Please contact us with any questions, comments, or feedback you may have and we will do our best to get back to you as soon as possible!</p>
                        </div>
                        <div class="col-xs-12 col-lg-6">

                            <p class="contact-phone"><b><u>Phone</u></b><br><a href="tel:+6822333606">(682) 233-3606</a></p>

                            <p class="contact-phone"><b><u>Email</u></b><br><a href="mailto:gtchorus@gmail.com" >gtchorus@gmail.com</a></p>
                            <!--
                            <a href="mailto:gtchorus@gmail.com" class="btn btn-primary" title="Email Us">Email Us</a>
                            -->
                            <p><b><u>Mailing Address</u></b><br>
                            P.O. Box 1522<br>
                            Arlington, TX 76004
                            </p>

                            <p><b><u>Location</u></b><br>
                            Epworth United Methodist Church<br>
                            1400 S Cooper St Arlington, TX 76013
                            </p>

                            <p><b><u>Rehearsals</u></b><br>
                            Tuesdays from 7:00pm to 9:30pm
                            </p>

                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3356.6447092162944!2d-97.11830932436656!3d32.72206748679227!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e7d15206e84af%3A0x4b3fa8ca9175949c!2sEpworth%20United%20Methodist%20Church!5e0!3m2!1sen!2sus!4v1682811355175!5m2!1sen!2sus" width="" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" id="google-map"></iframe>
                        </div>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>