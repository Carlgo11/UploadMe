<?php
include './res/header.php';

if (isset($_POST['postbut'])) {
    $s = "SELECT COUNT(*) AS num FROM `" . $config['mysql-table'] . "` WHERE `name` = ?";
    $query = $database->prepare($s);
    $query->bind_param("s", $_POST['filename']);
    $query->execute();
    $result = $query->get_result();

    $gethash = $database->prepare("SELECT `removalcode` FROM `" . $config['mysql-table'] . "` WHERE `name` = ?");
    $gethash->bind_param("s", $_POST["filename"]);
    $gethash->execute();
    $gethash->bind_result($hash);

    if ($row2 = $gethash->fetch()) {
        if (password_verify($_POST['rmcode'], $hash)) {
            $st = "DELETE FROM `" . $config['mysql-table'] . "` WHERE `name` = ?";
            echo $st;
            $q1 = $database->prepare($st);
            var_dump($database->error);
            $q1->bind_param("s", $_POST['filename']);
            $q1->execute();
            $output = "File removed. It's like it never existed!";
        }
    }
}
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
            If you did not upload the file please go to the <a href="./privacy">privacy</a> tab.
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <script src="./js/disable.js"></script>

<?php include './res/footer.php'; ?>
