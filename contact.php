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

            <title>Contact | Goodtimes Chorus</title>

            <link rel="stylesheet" href="style.css">

            <script src="https://kit.fontawesome.com/403c2f4f58.js" crossorigin="anonymous"></script>


        </head>

        <body>
        <?php echo $$basicNav; ?>

            <main>

                <div class="container home">
                    <div class="row">
                        <div class="col-xs-12">
                            <h2 class="center_text">Contact Us</h2>
                        </div>
                        <div class="col-xs-12 col-lg-6">
                            <h4 class="contact-subhead">The Goodtimes Chorus of Arlington</h4>
                            <p><u>Rehearsal Information</u><br>
                            Epworth United Methodist Church<br>
                            1400 S Cooper St Arlington, TX 76013<br><br>

                            Tuesdays from 7:00pm to 9:00pm
                            </p>

                        </div>
                        <div class="col-xs-12 col-lg-6">
                        <form action="submit-form.php" method="POST" class="contact-form">

                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" placeholder="First and Last Name" required>

                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone"  placeholder="123-456-7890" required>

                        <label for="message">Message:</label>
                        <textarea id="message" name="message" rows="5" required></textarea>

                        <button type="submit">Send</button>
                        </form>
                        </div>

                    </div>
                </div>
            </main>

            <?php echo $footer; ?>

            <?php echo $js; ?>

        </body>
    </html>