<?php

include 'config.php';

if (isset($_GET['file']) && !empty($_GET['file'])) {
    $file = $_GET['file'];
    $dir = $conf['upload-dir'];
    if (file_exists($dir . $file)) {
        include './resources/fileHead.php';
        $path_info = pathinfo($dir.$file);
        if($path_info['extension'] == "txt"){
            include './resources/markdown.php';
            echo markdown($dir, $file);
            return true;
        }
        header("Location: " . $dir . $file);
        return true;
    }
}
?>

<?php
include './resources/upload.php';
