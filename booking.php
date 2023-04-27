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

            <title>Booking | Goodtimes Chorus</title>

            <link rel="stylesheet" href="style.css">

            <script src="https://kit.fontawesome.com/403c2f4f58.js" crossorigin="anonymous"></script>


        </head>

        <body>
        <?php echo $basicNav; ?>

            <main>
            <div class="banner">
                <div class="banner-text">
                    <h1>Book the Goodtimes Chorus for your Event</h1>
                    <p>From intimate gatherings to grand celebrations, our tailored performances are designed to fit your event, your venue, and your theme.</p>
                    <p class="banner-box">Please fill out the form below to request a performance and we will be in contact shortly!</p>
                </div>
                <div class="banner-image">
                    <img src="chorus_ptpg_4.jpg" alt="Male choir singing wearing green vests">
                </div>
            </div>
                <div class="container home">
                    <div class="row">
                        <div class="col-xs-12 col-lg-6">
                            <form action="submit-form.php" method="POST" class="booking-form">

                            <u>Contact Information</u><br>

                            <label for="name">Name*</label>
                            <input type="text" id="name" name="name" placeholder="First and Last Name" required>

                            <label for="email">Email*</label>
                            <input type="email" id="email" name="email" required>

                            <label for="phone">Phone*</label>
                            <input type="tel" id="phone" name="phone"  placeholder="123-456-7890" required>

                            <u>Event Information</u><br>

                            <label for="date">Date*</label>
                            <input type="text" id="date" name="date" placeholder="MM/DD/YY" required>

                            <label for="time">Time*</label>
                            <input type="text" id="time" name="time"  required>

                            <label for="duration">Duration*</label>
                            <input type="text" id="duration" name="duration" placeholder="How long will you need the choir?"  required>

                            <label for="address">Address*</label>
                            <input type="text" id="address" name="address" placeholder="Event address"  required>

                            <label for="city">City*</label>
                            <input type="text" id="city" name="city"  required>

                            <label for="state">State</label>
                            <input type="text" id="state" name="state"  required>

                            <label for="zip">Zip Code</label>
                            <input type="text" id="zip" name="zip"  required>

                            <label for="theme">Performance Theme</label>
                            <input type="text" id="theme" name="theme" placeholder="Theme of your event"  required>

                            <label for="ensemble">Performance Ensemble*</label>

                            <fieldset>
                                <legend>Choose one option:</legend>
                                <label><input type="checkbox" name="ensemble[]" value="quartet"> Quartet
                                </label>
                                <label><input type="checkbox" name="ensemble[]" value="fullChoir"> Full Choir
                                </label>
                            </fieldset><br>

                            <button type="submit">Submit</button>
                            </form>

                        </div>
                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>