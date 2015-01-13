<?php include './res/head.php'; ?>
<body>
<div class="site-wrapper">
    <div class="site-wrapper-inner">
        <div class="cover-container">
            <?php
            include './res/navbar.php';
            getNavBar("privacy")
            ?>
            <div id="container" style="margin-top: 200px;margin-bottom: 100px">
                <div id="title">
                    <center><h2>Privacy</h2></center>
                </div>
                <div>
                    <?php
                    include './res/markdown.php';
                    echo markdown("./res/", "privacy.txt");
                    ?>
                </div>
            </div>
            <?php include './res/footer.php'; ?>
        </div>
    </div>
</div>
</body>