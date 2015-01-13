<?php
if (isset($_GET['file']) && $_GET['file'] != null) {
    include './res/head.php';
} else {
    header("Location: ./");
}
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
                    <h1>Success!</h1><br><p class="lead">Use this link to download your file:</p>
                    <?php
                    $url = "https://uploadme.carlgo11.com/download.php?file=" . $_GET["file"];
                    echo '<pre><a href="' . $url . '" style="color:black">' . $url . '</a></pre>';
                    ?>
                    <p class="lead">Your removal code is:</p>
                    <center>
                    <?php
                    session_start();
                    echo '<pre style="width: 450px">'.$_SESSION["rmcode"].'</pre>';
                    ?>
                        <p>Keep this code secret and in a good place.<br>You'll need it if you ever want to remove the file from the system.</p>
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