<?php

class Mysql {

    public static function alreadyExists($row, $matches) {
        global $database, $config;
        $query = $database->prepare("SELECT COUNT(*) AS num FROM `" . $config['mysql-table'] . "` WHERE `" . $row . "` = ?");
        $query->bind_param("s", $matches);
        $query->execute();
        $query->bind_result($num);
        $query->fetch();
        return($num > 0);
    }

}
