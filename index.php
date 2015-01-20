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
    <div class="home-picture">
        <div class="center-form home-form">
            <form action="./upload_file.php" method="post" enctype="multipart/form-data">
                <input class="btn btn-success upload" data-filename-placement="inside" id="file" name="file"
                       type="file"/>
                <br>
                <input class="form-control" type="password" autofocus="" placeholder="Password (Optional)"
                       id="password" name="password" value="">
                <input type="submit" name="submit" value="Upload" id="submit" class="btn btn-lg btn-default submit">
            </form>
        </div>
    </div>


    <h1 class="home">Your files anywhere, securely</h1>

    <p class="lead">
        With UpLoadMe you can share your personal files with friends<br>without needing to give out your
        personal information!
    </p>

    <div class="row">
        <div class="col-md-4">
            <span class="glyphicon glyphicon-folder-open"></span>

            <h3>Simple</h3>

            <p>Simply drop a file in the green area and click Upload</p>
        </div>
        <div class="col-md-4">
            <span class="glyphicon glyphicon-eye-close"></span>

            <h3>Private</h3>

            <p>We don't store any information about you. No names, IP addresses or logs!</p>
        </div>
        <div class="col-md-4">
            <span class="glyphicon glyphicon-lock"></span>

            <h3>Secure</h3>

            <p>Files with a password are encrypted as soon as they are uploaded. We can't see what the file contains
                without the password.</p>
        </div>
    </div>
</div>
<?php include './res/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/docs.min.js"></script>
<script src="./js/disable.js"></script>
</body>
</html>
