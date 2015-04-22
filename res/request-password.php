<?php
include './res/header.php';
?>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="inner go">
                    <center>
                        <?php
                        if (isset($error) && $error == 0) {
                            echo lang("incorrect-password");
                        }
                        echo lang("enter-decryption-password");
                        ?>
                        
                        <form action="" method="POST" enctype="multipart/form-data">
                            <input type="password" class="form-control" style="width: 400px;margin-bottom: 20px"
                                   autofocus="" required="" id="password" name="password">

                            <button class='btn btn-lg btn-success' type="submit" name="download" id="download"><?php echo lang("download"); ?>
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
