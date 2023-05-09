<?php
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
            <script src="https://donorbox.org/widget.js" paypalExpress="false"></script>


        </head>

        <body>
        <?php echo $basicNav; ?>

            <main>
                <div class="page-title">
                    <h1>Support Us</h1>
                </div>
                <div class="container support">
                    <div class="row">
                        <div class="col-xs-12 col-lg-7">
                            <p class="home_pg_text">As a non-profit organization, we rely on the generosity of our friends and supporters to fund our programs and events. Your contribution can help us continue to spread the love of a cappella music to audiences of all ages. Whether you make a one-time donation or become a regular sponsor, we'd be honored to have your support.</p>

                            <p>You can also show your support by purchasing our first CD.</p>
                            
                            <div class="flex-buttons">
                                <a href="our-first-cd.php" class="btn btn-primary" title="Our First CD" id="btn-1">Our First CD</a>
                                <a href="#donate-examples" class="btn btn-primary" title="How Donations Help" id="btn-1">Donation Uses</a>
                            </div>
                        
                        </div>
                        <div class="col-xs-12 col-lg-5">
                            <iframe src="https://donorbox.org/embed/two-donations" name="donorbox" allowpaymentrequest="allowpaymentrequest" seamless="seamless" frameborder="0" scrolling="no" height="900px" width="100%" style="max-width: 500px; min-width: 250px; max-height:none!important"></iframe>
                        </div>
                        <div class="col-xs-12" id="donate-examples">
                            <hr>
                            <p>Here are some ways your donation can make a difference:</p>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="supportImages img1">
                                <div class="support-text">
                                    <p class="donationP">$50-99</p>
                                    <ul>
                                        <li>Buy  sheet music rights for one new song</li>
                                        <li>Buy GTC shirts for 2-4 new members</li>
                                        <li>Send a high school quartet to Harmony Explosion camp</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="supportImages img2">
                                <div class="support-text">
                                    <p class="donationP">$100-199</p>
                                    <ul>
                                        <li>Buy a tuxedo for a new member</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="supportImages img3">
                                <div class="support-text">
                                    <p class="donationP">$200-299</p>
                                    <ul>
                                        <li>Buy a riser back rail</li>
                                        <li>Buy a riser 4th row</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="supportImages img4">
                                <div class="support-text">
                                    <p class="donationP">$400-1599</p>
                                    <ul>
                                        <li>Buy a new riser section</li>
                                        <li>Send a music teacher to a cappella training school</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="supportImages img5">
                                <div class="support-text">
                                    <p class="donationP">$1400-2999</p>
                                    <ul>
                                        <li>Buy a new sound system</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <div class="supportImages img6">
                                <div class="support-text">
                                    <p class="donationP">$3000+</p>
                                    <ul>
                                        <li>Underwrite our annual show</li>
                                        <li>Provide an acoustic shell for the chorus</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>