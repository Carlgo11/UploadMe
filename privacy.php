<?php
include './res/header.php';
?>
<div class="header">
    <h1>Privacy</h1>
</div>
<div class="privacy">
    <?php
    include './res/markdown.php';
    echo markdown("./res/", "privacy.txt");
    ?>
</div>
<?php include './res/footer.php'; ?>
