<?php

spl_autoload_register(function($class) {
    require preg_replace('{\\\\|_(?!.*\\\\)}', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';
});

use \Michelf\Markdown;

if (isset($_GET['file']) && !empty($_GET['file'])) {
    $file = $_GET['file'];
    $dir = $conf['upload-dir'];
    if(file_exists($dir.$file)){
        include './resources/fileHead.php';
        return true;
        header("Location: ".$dir.$file);
    }
}

function markdown($post) {
    $file = $_GET['file'];
    $dir = $conf['upload-dir'];
    $text = file_get_contents($dir.$file);
    $html = Markdown::defaultTransform($text);

    return $html;
}