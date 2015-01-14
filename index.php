<?php
include 'config.php';
include './res/head.php';
?>
<body>
<?php
include './res/navbar.php';
getNavBar("home");
?>
<div class="content">
    <h1>UpLoadMe, Uploading made simple</h1>

    <p class="lead">
        With UpLoadMe you can share your personal files with friends<br>without needing to give out your
        personal information!
        <br>Simply Drop the file in the green area and click Upload
    </p>

    <div class="upload-form">
        <form action="./upload_file.php" method="post" enctype="multipart/form-data">
            <input class="btn btn-success upload" data-filename-placement="inside" id="file" name="file" type="file"/>
            <br>
            <input class="form-control password" type="password" autofocus="" placeholder="Password (Optional)"
                   id="password" name="password" value="">
            <input type="submit" name="submit" value="Upload" id="submit" class="btn btn-lg btn-default submit"
                   disabled>
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
