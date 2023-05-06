<?php 
$nav = "            
<header>
<link rel='stylesheet' href='style.css'>
    <nav>
        <a href='index.php' class='navbar-brand'>Goodtimes Chorus</a>
        <button class='navbar-toggler' type='button' data-target='#main-navigation'><i class='fa-solid fa-bars'></i></button>
        <ul id='main-navigation' class='navbar'>
            <li><a href='index.php' title='Home'>Home</a></li>
            <li class='calendar-tab dropdown'><a href='calender.php' title='Calendar'>Calendar</a>
                <ul class='calendar dropdown-content'>
                    <li><a href='valentines.php' title='Singing Valentines'>Singing Valentines</a></li>
                    <li><a href='#' title='Concerts'>Concerts</a></li>
                </ul>
            </li>
             <li class='about-tab dropdown'><a href='about.php' title='About'>About</a>
                <ul class='about dropdown-content'>
                    <li><a href='mission.php' title='Mission and Vision'>Mission and Vision</a></li>
                    <li><a href='photos.php' title='Photo Gallery'>Photo Gallery</a></li>
                    <li><a href='repertoire.php' title='Repertoire'>Repertoire</a></li>
                    <li><a href='videos.php' title='Past Performances'>Past Performances</a></li>
                </ul>
            </li>
            <li class='connect-tab dropdown'><a href='connect.php' title='Connect'>Connect</a>
                <ul class='connect dropdown-content'>
                    <li><a href='join.php' title='Join'>Join</a></li>
                    <li><a href='contact.php' title='Contact'>Contact</a></li>
                </ul>
            </li>
                <li class='community-tab dropdown'><a href='#' title='Community'>Community</a>
                <ul class='community dropdown-content'>
                    <li><a href='uta_scholarship.php' title='UTA Voice Scholarship'>UTA Voice Scholarship</a></li>
                    <li><a href='sponsors.php' title='Our Supporters'>Our Supporters</a></li>
                    <li><a href='music_team.php' title='Music Team'>Music Team</a></li>
                </ul>
            </li>
            <li class='support-tab dropdown dropdown'><a href='#' title='Support Us'>Support Us</a>
                <ul class='support dropdown-content'>
                    <li><a href='support.php' title='Donate'>Donate</a></li>
                    <li><a href='booking.php' title='Book an Event'>Book an Event</a></li>
                    <li><a href='our-first-cd.php' title='Our First CD'>Our First CD</a></li>
                </ul>
            </li>";

$logOut = "<li><a href='login.php?logout' title='logout'>Log out</a></li>
        </ul>
    </nav>
</header>";

$userOptions = "
            <li class='support-tab dropdown'><a href='admin_userList.php' title='list Users'>Users</a>
                <ul class='support dropdown-content'>
                    <li><a href='admin_userList.php' title='New User'>List Users</a></li>
                    <li><a href='editUserForm.php' title='New User'>Add new User</a></li>
                </ul>
            </li>";
            
$PhandVidOptions = "
        <li class='support-tab dropdown'><a href='photo_video_list.php' title='list Photos and Videos'>Photo and Video</a>
            <ul class='support dropdown-content'>
                <li><a href='photo_video_list.php' title='New User'>List Photos and Videos</a></li>
                <li><a href='photo_video_form.php' title='New User'>Add new Photo or Video</a></li>
            </ul>
        </li>";

$basicNav = $nav . "<li><a href='login.php' title='Login'>Login</a> </li>
        </ul>
    </nav>
</header>";

$adminNav = $nav . $userOptions . $PhandVidOptions . $logOut;

$loggedInNav = $nav . $logOut;



$footer = "   
<footer>
<div class='container-fluid'>
    <div class='row main-footer'>
        <div class='col-xs-12 col-md-4'>
            <div class='footer-text'>
                <h3>Location</h3>
                <p class='footer-subhead'>Rehearsals</p>
                <address><a href='https://www.google.com/maps/place/Epworth+United+Methodist+Church/@32.722063,-97.1157344,17z/data=!3m1!4b1!4m6!3m5!1s0x864e7d15206e84af:0x4b3fa8ca9175949c!8m2!3d32.722063!4d-97.1157344!16s%2Fg%2F1tnjjzz8' target='_blank' title='Google Maps'>Epworth United Methodist Church <br> 1400 S Cooper St <br> Arlington, TX 76013</a></address><br>
                <p> Tuesdays 7:00PM - 9:00PM</p>
            </div>
        </div>
        <div class='col-xs-12 col-md-4'>
            <div class='sitemap'>
                <h3>Sitemap</h3>
                <div class='footer_links'>
                    <a href='index.php' title='Home' class='links'>Home</a><br>
                    <a href='calender.php' title='Calendar' class='links'>Calendar</a><br>
                    <a href='about.php' title='About' class='links'>About</a><br>
                    <a href='contact.php' title='Connect' class='links'>Connect</a><br>
                    <a href='uta_scholarship.php' title='Community' class='links'>Community</a><br>
                    <a href='donate.php' title='Support Us'class='links'>Support Us</a><br>
                </div>
            </div>
        </div>
        <div class='col-xs-12 col-md-4'>
            <div class=''>
                <h3>Contact</h3>
                <p class='footer-subhead'>Mailing Address</p>
                <address><a href='#' class='links'>P.O. Box 1522 <br> Arlington, TX 76004</a>
                </address>
                <p>(682) 233-3606</p>
                <p class='footer_text_center'><a href='gtchorus@gmail.com' title='Webmaster's Email' target='_blank' class='links'>gtchorus@gmail.com</a></p>
                <ul class='social-media'>
                    <li><a href='https://www.facebook.com/GtChorus' title='Goodtimes Chorus Facebook' target='_blank'><i class='fab fa-facebook fa-2xl'></i></a></li>
                    <li><a href='https://www.instagram.com/goodtimes_chorus/' title='Goodtimes Chorus Instagram' target='_blank'><i class='fab fa-instagram fa-2xl'></i></a></li>
                    <li><a href='https://twitter.com/GtChorus' title='Goodtimes Chorus Twitter' target='_blank'><i class='fab fa-twitter fa-2xl'></i></a></li>
                    <li><a href='https://www.youtube.com/@GoodtimeschorusOrgHome/videos' title='Goodtimes Chorus YouTube Channel' target='_blank'><i class='fab fa-youtube fa-2xl'></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class='row legal'>
    <div class='col-sm-12'>
        <p> Copyright &copy 2023 The Goodtimes Chorus. All rights reserved. </p>
    </div>
</div>
</footer>";

$js = "<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js' integrity='sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==' crossorigin='anonymous' referrerpolicy='no-referrer'></script>
<script src='app.js'></script>";


?>