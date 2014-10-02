<?php include './resources/head.php'; ?>
<body>
    <div class="site-wrapper">
        <div class="site-wrapper-inner">
            <div class="cover-container">

                <?php include './resources/navbar.php';
                getNavBar("privacy")
                ?>
                <div id="container" style="margin-top: 200px">
                    <div id="title"><center><h2>Privacy</h2></center></div>
                    <div>
                        <?php include './resources/markdown.php';
                        echo markdown("./resources/", "privacy.txt");
                        ?>
                    </div>

                </div>
<?php include './resources/footer.php'; ?>
            </div>
        </div>
    </div>
</body> 