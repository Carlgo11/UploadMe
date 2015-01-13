<?php
include './res/head.php';
?>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <?php
            include './res/navbar.php';
            getNavBar();
            ?>
            <div class="inner go">
                <?php if (isset($error) && $error == 0) {
                    ?>
                    <div class="alert alert-danger"><h3>Incorrect password!</h3>

                        <p>The password you entered is incorrect. Please try again.</p></div>
                <?php
                }
                ?>
                <h1>Please enter the decryption password.</h1><br>

                <p class="lead">The file you requested is encrypted with a password by the creator.</p>

                <p>Please enter the decryption password in the box below:</p>
                <center>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input type="password" class="form-control" style="width: 400px;margin-bottom: 20px"
                               autofocus="" required="" id="password" name="password">

                        <button class='btn btn-lg btn-success' type="submit" name="download" id="download">Download
                        </button>
                    </form>
                </center>
            </div>
            <?php include './res/footer.php'; ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/docs.min.js"></script>
<script src="./js/disable.js"></script>
</body>
</html>