<?php
include './res/head.php';
?>
<body>
<nav>
    <a class="brand" href="./">
        <img height="60" width="170" src="./res/media/uploadme.png">
    </a>
</nav>
<div class="mysql-content">
    <h2>Whoops, that wasn't supposed to happen!</h2><br>
    <?php echo '<img src="./res/media/errors/' . rand(1, 11) . '.jpg" width="500"/>'; ?><br><br>
    <h4>But do not fear! Out tech-kittens have already been notified!</h4>

    <p>Most likely our storage-server is down. Try again soon.</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/docs.min.js"></script>
<script src="./js/disable.js"></script>
</body>
</html>