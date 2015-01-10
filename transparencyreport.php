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
                    <?php
                    class dbclass{
                     
                       var $con;
                    
                    
                    function stats($name, $conf) {
                        
                       $db = new dbclass();
                       $this->con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']);
                        $db->$query = $con->prepare("SELECT `name`, `accepted`, `total` content FROM `" . $conf['tr-table'] . "` WHERE `name` = ?");
                        $db->$query->bind_param("s", $name);
                        $db->$query->execute();
                        $db->$query->bind_result($name, $accepted, $total);
                        if ($row = $query->fetch()) {
                            
                        }
                        $p = $accepted/$total;
                        return $accepted."/".$total." (".$p.")";
                    }
                    }
                    ?>
                    <div id = "title"><center><h2>Transparency Report</h2></center></div>
                    <div>
                        <h4>Copyright-related takedown requests: <?php echo dbclass::stats("DMCA", $conf)?></h4>
                        <h4>User information requests: <?php ?></h4>
                        <h4>File removal request (Not Copyright-related): <?php ?></h4>
                    </div>
                </div>
                <?php include './res/footer.php'; ?>
            </div>
        </div>
    </div>
</body>