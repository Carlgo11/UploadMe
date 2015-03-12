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

    public static function transparencyreport($name) {
        global $database, $config;
        $g = "SELECT `name`, `accepted`, `total` FROM `" . $config['tr-table'] . "` WHERE `name` = ?";
        $query = $database->prepare($g);
        $query->bind_param("s", $name);
        $query->execute();
        $query->bind_result($name, $accepted, $total);
        if ($row = $query->fetch()) {
            
        }
        if (!($accepted || $total) == 0) {
            $p = $accepted / $total*100;
        } else {
            $p = 0;
        }
        return $accepted . "/" . $total . " (" . $p . "%)";
    }
}