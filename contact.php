<?php
include './resources/head-mainpage.php';
?>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <?php include './resources/navbar.php'; ?>
                <div id="container" style="margin-top: 200px;">
                    <h2>Contact
                    </h2>
                    <p>Fill in a message to us below and we'll get back to you as soon as possible.</p>
                    <form method="POST" action="" style="width: 200px;vertical-align: middle;margin-left: 120px">
                        <?php
                        session_start();
                        
                            if (!class_exists('KeyCAPTCHA_CLASS')) {
                                include('./resources/keycaptcha.php');
                            }
                            $kc_o = new KeyCAPTCHA_CLASS();
                            if (isset($_POST['capcode'])) {
                                if ($kc_o->check_result($_POST['capcode'])) {
                                    $sent = true;
                                    $email = $_GET['email'];
                                    $message = $_GET['message'];
                                    mail("carlgo11@carlgo11.com", "New mail from ".$email, "Hello,<br>You've recived a new question from: ".$email."<br>Message:".$message);
                                   echo '<div class="alert alert-success" role="alert">Email sent!</div>';
                                } else {
                                   // incorrect
                                }
                            }
                        if(!isset($sent) || !$sent){
                        if (!class_exists('KeyCAPTCHA_CLASS')) {
                            include('./resources/keycaptcha.php');
                        }
                        $kc_o = new KeyCAPTCHA_CLASS();
                        echo $kc_o->render_js();
                        }
                        ?>
                        <input type='email' id='email' placeholder="Your email" required="" style="margin-bottom: 20px;margin-top: 20px" class="form-control"/>
                        <textarea rows="4" id="message" cols="50" required="" style="margin-bottom: 20px" placeholder="Message"></textarea>
                        

                        <input type="hidden" name="capcode" id="capcode" value="false" />
                        <input type="submit" value="Send" id="postbut" class="btn btn-success" />
                    </form>
                </div>
<?php include './resources/footer.php'; ?>
            </div>
        </div>
    </div>
</body>
