<?php

class Mysql {

    public static function alreadyExists($row, $matches) {
        include './config.php';
        $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
        $query = $con->prepare("SELECT COUNT(*) AS num FROM `" . $conf['mysql-table'] . "` WHERE `" . $row . "` = ?");
        $query->bind_param("s", $matches);
        $query->execute();
        $result = $query->get_result();
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
            foreach ($row as $r) {
                if ($r > 0) {
                    return true;
                }
            }
        }
        return false;
    }

}