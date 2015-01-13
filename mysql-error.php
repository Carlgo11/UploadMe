<?php
include './res/head.php';
?>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">
                <div class="inner go">
                    <h2>Whoops, that wasn't supposed to happen!</h2><br>
                    <?php echo '<img src="./res/media/errors/'.rand(1,11).'.jpg" width="500"/>';?><br><br>
                    <h4>But do not fear! Out tech-kittens have already been notified!</h4>
                    <p>Most likely our storage-server is down. Try again soon.</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/docs.min.js"></script>
    <script src="./js/disable.js"></script>
</body>
</html>