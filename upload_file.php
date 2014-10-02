<?php

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
        if (file_exists($conf['upload-dir'] . $_FILES["file"]["name"])) {
            move_uploaded_file($_FILES["file"]["tmp_name"], $conf['upload-dir'] . $_FILES["file"]["name"] . ".1." . $extension); //Fix this to a random filename later
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $conf['upload-dir'] . $_FILES["file"]["name"]);
        }
        header('Location: index.php?file=' . $_FILES["file"]["name"]);
    }
}
?>