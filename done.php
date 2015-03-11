<?php
if (!(isset($_GET['file']) && $_GET['file'] != null)) {
    header("Location: ./");
    die("Redirecting...");
}

include './res/header.php';

$url = "https://" . $_SERVER['HTTP_HOST'] . "/download.php?file=" . $_GET["file"];

?>
    <div class="content done">
        <h1>Success!</h1><br>

        <p class="lead">Use this link to download your file:</p>
        <?php echo '<pre style="width: 450px"><a href="' . $url . '">' . $url . '</a></pre>'; ?>
        <p class="lead">Your removal code is:</p>
        <?php echo '<pre style="width: 450px">' . $_SESSION["rmcode"] . '</pre>'; ?>
        <p>Keep this code secret and in a good place.<br>You'll need it if you ever want to remove the file
            from the system.</p>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <script src="./js/disable.js"></script>
<?php include './res/footer.php'; ?>
