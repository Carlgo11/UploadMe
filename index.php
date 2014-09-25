<?php

include 'config.php';
include './resources/https.php';

if (isset($_GET['file']) && !empty($_GET['file'])) {
    $file = $_GET['file'];
    $dir = $conf['upload-dir'];
    if (file_exists($dir . $file)) {
        include './resources/fileHead.php';
        header("Location: " . $dir . $file);
        return true;
    }
}
?>

<?php

include './resources/upload.php';
