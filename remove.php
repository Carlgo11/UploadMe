<?php
include './res/head.php';
if (isset($_POST['postbut'])) {
    include 'config.php';
    $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');

    $s = "SELECT COUNT(*) AS num FROM `" . $conf['mysql-table'] . "` WHERE `removalcode` = ?";
    $query = $con->prepare($s);
    $query->bind_param("s", $_POST['rmcode']);
    $query->execute();
    $result = $query->get_result();
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        foreach ($row as $r) {
            if ($r == 1) {
                $st = "DELETE FROM " . $conf['mysql-table'] . " WHERE `removalcode` = ?";
                $q = $con->prepare($st);
                $q->bind_param("s", $_POST['rmcode']);
                $q->execute();
                $output = "Removed 1 file. It's like it never existed!";
            }
        }
    }
}
?>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <?php
            include './res/navbar.php';
            getNavBar("remove");
            ?>
            <div class="inner go">
                <?php if (isset($output) && $output != null) { ?>
                    <div class="alert alert-success"><?php echo $output ?></div>
                <?php
                } elseif (isset($_POST['postbut'])) {
                    ?>
                    <div class="alert alert-danger">Incorrect removal-code</div>
                <?php } ?>
                <h1>Removing files</h1><br>

                <p class="lead">When uploading a file you recived a removal-code.<br>
                    Enter that code below to remove your file.<br>
                    If you did not upload the file please go to the <a href="./privacy.php">privacy</a> tab.</p>

                <form method="POST" action="">
                    <center>
                        <input type="text" id="rmcode" name="rmcode" placeholder="Removal-code" required=""
                               maxlength="32"
                               style="margin-bottom: 20px;margin-top: 20px;width: 500px;text-align: center"
                               class="form-control"/>
                    </center>
                    <input type="submit" value="Delete" id="postbut" name="postbut" class="btn btn-danger btn-lg"/>
                </form>
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