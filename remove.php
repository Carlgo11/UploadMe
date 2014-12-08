<?php
include './resources/head-mainpage.php';
if(isset($_POST['postbut'])){
}
?>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <?php
                include './resources/navbar.php';
                getNavBar("remove");
                ?>
                <div class="inner go">
                    <h1>Removing files</h1><br>
                    <p class="lead">When uploading a file you recived a removal-code.<br>
                        Enter that code below to remove your file.<br>
                        If you did not upload the file please go to the <a href="./privacy.php">privacy</a> tab.</p>
                    <form method="POST" action="">
                        <center>
                        <input type="text" id="rmcode" name="rmcode" placeholder="Removal-code" required=""  maxlength="32" style="margin-bottom: 20px;margin-top: 20px;width: 300px;text-align: center" class="form-control"/>
                        </center>
                        <input type="submit" value="Delete" id="postbut" name="postbut" class="btn btn-danger btn-lg" />
                    </form>
                </div>
                <?php include './resources/footer.php'; ?>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <script src="./js/disable.js"></script>
</body>
</html>