<?php include './res/head.php'; ?>
<body>

<?php
include './res/navbar.php';
getNavBar("privacy")
?>
<div class="content privacy">
    <h1>Privacy</h1>
    <?php
    include './res/markdown.php';
    echo markdown("./res/", "privacy.txt");
    ?>
</div>
<?php include './res/footer.php'; ?>
</body>