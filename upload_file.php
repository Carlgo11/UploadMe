<?php

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

include './config.php';
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if ($_FILES["file"]["error"] > 0) {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
} else {
    $tmpName = $_FILES['file']['tmp_name'];
    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);

    $password = NULL;
    if ($_POST['password'] != "") {
        include 'lib/Encryption.php';
        $salt = getName(32);
        $content = Encryption::encrypt($content, $_POST['password'], $salt);
        $password = $_POST['password'];
    }

    $name = getName(15) . "." . $extension;
    $rmcode = getName(32);

    $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
    $q = "INSERT INTO `" . $conf['mysql-table'] . "` (`name`, `size`, `type`, `content`, `removalcode`) VALUES (?, ?, ?, ?, ?);";
    $query = $con->prepare($q);
    $query->bind_param("sssss", $name, $_FILES['file']['size'], $_FILES['file']['type'], $content, $rmcode);
    $query->execute();

    if ($_POST['password'] != "") {
        $m = $con->prepare("UPDATE `" . $conf['mysql-table'] . "` SET `salt`=?, `encryption`=? WHERE `name`=?");
        $g = TRUE;
        $m->bind_param("sss", $salt, $g, $name);
        $m->execute();
    }

    session_start();
    $_SESSION["rmcode"] = $rmcode;
    header('Location: done.php?file=' . $name);
}