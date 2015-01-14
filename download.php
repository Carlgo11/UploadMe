<?php

include 'lib/encryption';

if (isset($_GET['file']) && $_GET['file'] != null) {
    $file = $_GET['file'];
    include './config.php';
    $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
    $query = $con->prepare("SELECT name, type, size, content, encryption, salt FROM `" . $conf['mysql-table'] . "` WHERE `name` = ?");
    $query->bind_param("s", $_GET['file']);
    $query->execute();
    $query->bind_result($name, $type, $size, $content, $encryption, $salt);
    if ($row = $query->fetch()) {
        
    }
    if ($encryption != NULL) {
        if (isset($_POST['password'])) {
            $content = Encryption::decrypt($content, $_POST['password'], $salt);
            if (!$content) {
                $error = 0;
                //Request password
                include './res/request-password.php';
            } else {
                header("Accept-Ranges: bytes");
                header("Keep-Alive: timeout=15, max=100");
                header("Content-Disposition: attachment; filename=$name");
                header("Content-type: $type");
                header("Content-Transfer-Encoding: binary");
                header("Content-Description: File Transfer");
                echo stripslashes($content);
            }
        } else {
            //Request password
            include './res/request-password.php';
        }
    } else {
        header("Accept-Ranges: bytes");
        header("Keep-Alive: timeout=15, max=100");
        header("Content-Disposition: attachment; filename=$name");
        header("Content-type: $type");
        header("Content-Transfer-Encoding: binary");
        header("Content-Description: File Transfer");
        echo stripslashes($content);
    }
} else {
    header("Location: index.php");
}