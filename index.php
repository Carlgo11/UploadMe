<?php
include 'config.php';
include './res/indexhead.php';
?>
<body>
<?php
include './res/navbar.php';
getNavBar("home");
?>
<div class="notification-shape shape-box" id="notification-shape" data-path-to="m 0,0 500,0 0,500 -500,0 z">
    <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 500 500" preserveAspectRatio="none">
        <path d="m 0,0 500,0 0,500 0,-500 z"/>
    </svg>
</div>
<div class="content">
    <div class="home-picture" style="background-image: url('./res/media/<?php echo rand(1, 6) ?>.jpg');">
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
<script src="./js/docs.min.js"></script>
<script src="./js/disable.js"></script>
<script src="js/classie.js"></script>
<script src="js/notificationFx.js"></script>
<script>
    (function () {
        var svgshape = document.getElementById('notification-shape'),
            s = Snap(svgshape.querySelector('svg')),
            path = s.select('path'),
            pathConfig = {
                from: path.attr('d'),
                to: svgshape.getAttribute('data-path-to')
            };

        setTimeout(function () {
            path.animate({ 'path': pathConfig.to }, 300, mina.easeinout);

            // Create the notification
            var notification = new NotificationFx({
                wrapper: svgshape,
                message: '<p><span class="icon glyphicon glyphicon-cloud"></span> UploadMe is also available at <a href="http://ufcefwubqauib6of.onion">ufcefwubqauib6of.onion</a></p>',
                layout: 'other',
                effect: 'cornerexpand',
                type: 'notice', // notice, warning or error
                onClose: function () {
                    setTimeout(function () {
                        path.animate({ 'path': pathConfig.from }, 300, mina.easeinout);
                    }, 200);
                }
            });

            // Show the notification
            notification.show();

        }, 2400);
    })();
</script>
</body>
</html>
