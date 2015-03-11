<?php
include('./lib/init.php');

if (isset($_GET['file']) && $_GET['file'] != null) {
    $file = $_GET['file'];
    $query = $database->prepare("SELECT name, type, size, content, `file-name`, encryption, salt FROM `" . $conf['mysql-table'] . "` WHERE `name` = ?");
    $query->bind_param("s", $_GET['file']);
    $query->execute();
    $query->bind_result($name, $type, $size, $content, $filename, $encryption, $salt);
    if ($row = $query->fetch()) {

    }
    if ($encryption != NULL) {
        if (isset($_POST['password'])) {
            include 'lib/Encryption.php';
            $content = Encryption::decrypt($content, $_POST['password'], $salt);
            if (!$content) {
                $error = 0;
                //Request password
                include './res/request-password.php';
            } else {
                if ($filename == NULL) {
                    $filename = $name;
                } else {
                    $filename = Encryption::decrypt($filename, $_POST['password'], $salt);
                }
                header("Accept-Ranges: bytes");
                header("Keep-Alive: timeout=15, max=100");
                header("Content-Disposition: attachment; filename=$filename");
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
        if ($filename == NULL) {
            $filename = $name;
        }
        if($name == NULL && $content == NULL){
            header("Location: index.php");
        }else{
        header("Accept-Ranges: bytes");
        header("Keep-Alive: timeout=15, max=100");
        header("Content-Disposition: attachment; filename=$filename");
        header("Content-type: $type");
        header("Content-Transfer-Encoding: binary");
        header("Content-Description: File Transfer");
        echo stripslashes($content);
        }
    }
} else {
    header("Location: index.php");
}
