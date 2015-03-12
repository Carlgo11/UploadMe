<?php include './res/header.php'; ?>

<div id="container" style="margin-top: 200px;margin-bottom: 100px">
    <div id="title">
        <center><h2>Transparency Report</h2></center>
    </div>
    <div class="privacy">
        <h4>Copyright-related takedown requests: <?php echo Mysql::transparencyreport("DMCA") ?></h4>
        <h4>User information requests: <?php echo Mysql::transparencyreport("userinfo") ?></h4>
        <h4>File removal request (Not Copyright-related): <?php echo Mysql::transparencyreport("file-removal") ?></h4>
    </div>
</div>
<?php include './res/footer.php'; ?>