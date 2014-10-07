<?php

function getName() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < 10; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

include './config.php';

$allowedExts = array("php", "exe", "bat", "iso", "msi");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);

if (
        in_array($extension, $allowedExts)) {
    echo "Invalid file format";
} else {
    if ($_FILES["file"]["error"] > 0) {
        echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    } else {
        $name = getName();
        if (file_exists($conf['upload-dir'] . $name)) {
            move_uploaded_file($_FILES["file"]["tmp_name"], $conf['upload-dir'] . $name . getName() . $extension); //Fix this to a random filename later
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $conf['upload-dir'] . $name . "." . $extension);
        }
        header('Location: index.php?file=' . $name . "." . $extension);
    }
}