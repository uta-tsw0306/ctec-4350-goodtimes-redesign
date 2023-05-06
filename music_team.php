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

            <title>Music Team | Goodtimes Chorus</title>

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
                    <h1>Music Team</h1>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <table>
                                <tr>
                                    <td><h3 class="s_head">Administration</h3></td>
                                </tr>
                                <tr>
                                    <td>President</td>
                                    <td class="team_name">David Weick</td>
                                </tr>
                                <tr>
                                    <td>Immediate Past President	</td>
                                    <td class="team_name">Scott Simmons</td>
                                </tr>
                                <tr>
                                    <td>Chapter Development VP</td>
                                    <td class="team_name">Gil Carrick</td>
                                </tr>
                                <tr>
                                    <td>Music and Performance VP</td>
                                    <td class="team_name">Eddie Holmes</td>
                                </tr>
                                <tr>
                                    <td>Secretary</td>
                                    <td class="team_name">Michael Hair</td>
                                </tr>
                                <tr>
                                    <td>Treasurer</td>
                                    <td class="team_name">Bob Ferbend</td>
                                </tr>
                                <tr>
                                    <td>Newsletter Editor</td>
                                    <td class="team_name">David Weick</td>
                                </tr>
                                <tr>
                                    <td>Webmaster</td>
                                    <td class="team_name">Gil Carrick</td>
                                </tr>
                                <tr>
                                    <td>Sunshine Chairman</td>
                                    <td class="team_name">Dan Ehrhorn</td>
                                </tr>
                                <tr>
                                    <td><h3 class="s_head">Music Team</h3></td>
                                </tr>
                                <tr>
                                    <td>Chorus Director</td>
                                    <td class="team_name">Eddie Holmes</td>
                                </tr>
                                <tr>
                                    <td>Wardrobe Chairman</td>
                                    <td class="team_name">Roger Williams</td>
                                </tr>
                                <tr>
                                    <td>Music Librarian</td>
                                    <td class="team_name">Chris Chamberlain</td>
                                </tr>
                                <tr>
                                    <td>Director Emeritus</td>
                                    <td class="team_name">Dick Kneeland</td>
                                </tr>
                                <tr>
                                    <td><h3 class="s_head">Section Leaders</h3></td>
                                </tr>
                                <tr>
                                    <td>Bass</td>
                                    <td class="team_name">Michael Hair</td>
                                </tr>
                                <tr>
                                    <td>Baritone</td>
                                    <td class="team_name">Ron Chafetz</td>
                                </tr>
                                <tr>
                                    <td>Lead</td>
                                    <td class="team_name">Scott Simmons</td>
                                </tr>
                                <tr>
                                    <td>Tenor</td>
                                    <td class="team_name">David Weick</td>
                                </tr>
                            </table>
                           
                        </div>

                        

                       
                    </div>
                    	
	
                
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>
