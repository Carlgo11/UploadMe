<?php

function getName() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 15; $i++) {
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

    $name = getName().".".$extension;
    $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or die(); 
    $query = $con->prepare("INSERT INTO `" . $conf['mysql-table'] . "` (`name`, `size`, `type`, `content`) VALUES (?, ?, ?, ?);");
    $query->bind_param("ssss", $name , $_FILES['file']['size'], $_FILES['file']['type'], $content);
    $query->execute();
    header('Location: done.php?file=' . $name);
}