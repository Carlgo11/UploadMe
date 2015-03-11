<?php
include './res/header.php';

// Register API keys at https://www.google.com/recaptcha/admin
$siteKey = $config['recaptcha-key'];
$secret = $config['recaptcha-secret'];
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = "en";
// The response from reCAPTCHA
$resp = null;
// The error code from reCAPTCHA, if any
$error = null;
if (!defined("DEBUG")) $reCaptcha = new ReCaptcha($secret);

// Was there a reCAPTCHA response?
if (isset($_POST["g-recaptcha-response"]) && $_POST["g-recaptcha-response"]) {
    $resp = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"], $_POST["g-recaptcha-response"]
    );
}
$output = null;
if (isset($_POST['post'])) {
    if ($resp != null && $resp->success) {
        $sent = true;
        $email = $_POST['email'];
        $message = $_POST['message'];
        $to = $config['email-receiver'];
        $subject = "New mail from " . $email;
        $message = "Hello,\nYou've recived a new message from: " . $email . "\n\nMessage:\n" . $message;
        $headers = 'From: ' . $_POST['email'] . "\r\n" .
                'Reply-To: ' . $_POST["email"] . '' . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        // mail($to, $subject, $message);
    } else {
        $error = 1;
    }
}
?>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <div class="content">
        <h2>Contact</h2>
        <?php
        if (!isset($sent) || !$sent) {
            ?><p>Fill in a message to us below and we'll get back to you as soon as possible.</p><div class="contact"><form method="POST" action="">
            <?php if ($error != NULL) { ?>
                        <div class="alert alert-danger"><h4>You need to click the ReCaptcha!</h4><p>Don't forget to click the "I'm not a robot" button.</p></div>
                    <?php } ?>
                    <input type="email" id="email" name="email" placeholder="Your email" required="" class="form-control"/>
                    <textarea rows="4" id="message" name="message" cols="50" required="" placeholder="Message"></textarea>
                    <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
                    <script type="text/javascript"
                            src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
                    </script>
                    <button name="post" id="post" type="submit" class="btn btn-lg btn-success">Send</button></form></div><?php } else {
                ?>
            <center><div class="alert alert-success" role="alert" style="height: 100px;width: 500px">Email sent!<br><br>Thank you for your email. A reply will be sent to: <?php echo $email; ?></div></center>
                <?php
            }
            ?>
    </div>
<?php include './res/footer.php'; ?>
