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

            <title>Repertoire | Goodtimes Chorus</title>

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
                <h1>Repertoire</h1>
            </div>
                <div class="container repertoire">
                    
                    <div class="row">

                        <div class="col-xs-6 col-lg-4">
                            <h3 class="">Patriotic</h3>
                            <div>
                                <ul class="songs">
                                    <li>Armed Forces Medley</li>
                                    <li>God Bless America</li>
                                    <li>O Canada</li>
                                    <li>The Star-Spangled Banner</li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-xs-6 col-lg-4">
                            <h3 class="">Spiritual</h3>
                            <ul class="songs">
                                <li>I Believe</li>
                                <li>I'll Fly Away</li>
                                <li>I'm Feelin' Fine</li>
                                <li>Irish Blessing</li>
                                <li>Hallelujah</li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-lg-4">
                            <h3 class="">Ballads</h3>
                            <ul class="songs">
                                <li>Can You Feel The Love Tonight</li>
                                <li>Kentucky Babe</li>
                                <li>Old Saint Louis</li>
                                <li>Once Upon A Time</li>
                                <li>Smile</li>
                                <li>What A Wonderful World</li>
                                <li>Yesterday</li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-lg-4">
                            <h3 class="">Up-tunes/General</h3>
                            <ul class="songs">
                                <li>Beach Boy Medley</li>
                                <li>California Here I Come</li>
                                <li>Coney Island Baby - We All Fall Medley</li>
                                <li>Drivin' Me Crazy</li>
                                <li>From the First Hello</li>
                                <li>King Of The Road</li>
                                <li>Lida Rose</li>
                                <li>Lion Sleeps Tonight</li>
                                <li>Sh-Boom</li>
                                <li>Under The Boardwalk</li>
                            </ul>
                        </div>

                        <div class="col-xs-6 col-lg-4">
                            <h3>Valentines</h3>
                            <ul class="songs">
                                <li>Let Me Call You Sweetheart</li>
                                <li>Story Of The Rose</li>
                            </ul>
                        </div>



                        
                    </div>

                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
