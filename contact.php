<?php
include './res/head.php';
include './config.php';
?>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <?php
                include './res/navbar.php';
                getNavBar("contact")
                ?>
                <div class="inner go">
                    <h2>Contact</h2>
                    <?php
                    session_start();

                    if (!class_exists('KeyCAPTCHA_CLASS')) {
                        include('./res/keycaptcha.php');
                    }
                    $kc_o = new KeyCAPTCHA_CLASS();
                    if (isset($_POST['capcode'])) {
                        if ($kc_o->check_result($_POST['capcode'])) {
                            $sent = true;
                            $email = $_POST['email'];
                            $message = $_POST['message'];
                            $to = $conf['email-reciver'];
                            $subject = "New mail from " . $email;
                            $message = "Hello,\nYou've recived a new message from: " . $email . "\n\nMessage:\n" . $message;
                            $headers = 'From: ' . $_POST['email'] . "\r\n" .
                                    'Reply-To: ' . $_POST["email"] . '' . "\r\n" .
                                    'X-Mailer: PHP/' . phpversion();
                            mail($to, $subject, $message);
                            echo '<div class="alert alert-success" role="alert" style="height: 100px">Email sent!<br><br>Thank you for your email. A reply will be sent to:' . $email . '.</div>';
                        }
                    }
                    if (!isset($sent) || !$sent) {
                        if (!class_exists('KeyCAPTCHA_CLASS')) {
                            include('./res/keycaptcha.php');
                        }
                        $kc_o = new KeyCAPTCHA_CLASS();
                        echo '<p>Fill in a message to us below and we\'ll get back to you as soon as possible.</p><form method="POST" action="" style="width: 200px;vertical-align: middle;margin-left: 100px">';
                        echo $kc_o->render_js();
                        echo '<input type="email" id="email" name="email" placeholder="Your email" required="" style="margin-bottom: 20px;margin-top: 20px" class="form-control"/>
                        <textarea rows="4" id="message" name="message" cols="50" required="" style="margin-bottom: 20px" placeholder="Message"></textarea>
                        <input type="hidden" name="capcode" id="capcode" value="false" />
                        <input type="submit" value="Send" id="postbut" class="btn btn-success btn-lg" /></form>';
                    }
                    ?>
                </div>
                <?php include './res/footer.php'; ?>
            </div>
        </div>
    </div>
</body>
