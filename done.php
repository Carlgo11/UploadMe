<?php
if (isset($_GET['file']) && $_GET['file'] != null) {
    include './res/head.php';
} else {
    header("Location: ./");
}
?>
<body>
    <?php
    include './res/navbar.php';
    getNavBar();
    ?>
    <div class="content done">
        <h1>Success!</h1><br>

        <p class="lead">Use this link to download your file:</p>
        <?php
        $url = $_SERVER['HTTP_HOST']."/download.php?file=" . $_GET["file"];
        echo '<pre style="width: 450px"><a href="' . $url . '">' . $url . '</a></pre>';
        ?>
        <p class="lead">Your removal code is:</p>
        <?php
        session_start();
        echo '<pre style="width: 450px">' . $_SESSION["rmcode"] . '</pre>';
        ?>
        <p>Keep this code secret and in a good place.<br>You'll need it if you ever want to remove the file
            from the system.</p>
    </div>
    <?php include './res/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <script src="./js/disable.js"></script>
</body>
</html>