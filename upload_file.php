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
        echo "Upload: " . $_FILES["file"]["name"] . "<br>";
        echo "Type: " . $_FILES["file"]["type"] . "<br>";
        echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";
        if (file_exists($conf['upload-dir'] . $_FILES["file"]["name"])) {
            echo $_FILES["file"]["name"] . " already exists. ";
        } else {
            move_uploaded_file($_FILES["file"]["tmp_name"], $conf['upload-dir'] . $_FILES["file"]["name"]);
            echo "Stored in: " . $conf['upload-dir'] . $_FILES["file"]["name"];
            if (isset($_GET['dev']) && !empty($_GET['dev'])) {
                if($_GET['dev'] == "true"){
                    return true;
                }
            }
            header('Location: index.php?file=' . $_FILES["file"]["name"]);
        }
    }
}
?>