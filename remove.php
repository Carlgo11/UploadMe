<?php
include './res/head.php';
if (isset($_POST['postbut'])) {
    include 'config.php';
    $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');

    $s = "SELECT COUNT(*) AS num FROM `" . $conf['mysql-table'] . "` WHERE `name` = ?";
    $query = $con->prepare($s);
    $query->bind_param("s", $_POST['filename']);
    $query->execute();
    $result = $query->get_result();

    $gethash = $con->prepare("SELECT `removalcode` FROM `" . $conf['mysql-table'] . "` WHERE `name` = ?");
    $gethash->bind_param("s", $_POST["filename"]);
    $gethash->execute();
    $gethash->bind_result($hash);
    echo $hash;
    if ($row2 = $gethash->fetch()) {
        if (password_verify($_POST['rmcode'], $hash)) {
            $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
            $q1 = $con->prepare("DELETE FROM `" . $conf['mysql-table'] . "` WHERE `name` = ?");
            $q1->bind_param("s", $_POST['filename']);
            $q1->execute();
            $output = "File removed. It's like it never existed!";
        }
    }
}
?>
<body>
    <?php
    include './res/navbar.php';
    getNavBar("remove");
    ?>
    <div class="content">
        <center>
            <?php if (isset($output) && $output != null) { ?>
                <div class="alert alert-success" style="width: 500px"><?php echo $output ?></div>
                <?php
            } elseif (isset($_POST['postbut'])) {
                ?>
                <div class="alert alert-danger" style="width: 500px">Incorrect removal-code</div>
            <?php } ?>
        </center>
        <h1>Removing files</h1><br>

        <p class="lead">
            When uploading a file you received a removal-code.
            <br>
            Enter that code below to remove your file.
            <br>
            If you did not upload the file please go to the <a href="./privacy.php">privacy</a> tab.
        </p>

        <div class="center-form">
            <form method="POST" action="">
                <input type="text" id="filename" name="filename" placeholder="File name" required="" autofocus="" class="form-control" style="margin-bottom: 20px" maxlength="30">
                <input type="text" id="rmcode" name="rmcode" placeholder="Removal-code" required=""
                       maxlength="64" class="form-control"/>
                <input type="submit" value="Delete" id="postbut" name="postbut" class="btn btn-danger btn-lg submit"/>
            </form>
        </div>
    </div>
    <?php include './res/footer.php'; ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <script src="./js/disable.js"></script>
</body>
</html>