<?php
include_once(__DIR__.'/../lib/init.php');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Simple way to upload files">
    <meta name="author" content="carlgo11">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="Expires" CONTENT="-1">
    <link rel="shortcut icon" type="image/icon" href="./res/media/logo.png"/>
    <title><?php echo htmlspecialchars((isset($title)&&$title?$title.' - ':'').$config['title']); ?></title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/ns-default.css">
    <link rel="stylesheet" type="text/css" href="./css/ns-style-other.css">
    <link href="./css/stylesheet.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="./js/bootstrap.file-input.js"></script>
    <script src="./js/modernizr.custom.js"></script>
    <script src="./js/snap.svg-min.js"></script>
</head>
<body>
    <nav>
        <a class="brand" href="./">
            <img height="60" width="170" src="./res/media/uploadme.png">
        </a>
        <ul class="nav-right">
<?php
            $component=defined("DEBUG")?PATHINFO_BASENAME:PATHINFO_FILENAME;
            $urlpath=parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
            $current=pathinfo($urlpath, $component);
            
            $navs=array(""=>"Home", "contact.php"=>"Kontakt", "remove.php"=>"Remove", "privacy.php"=>"Privacy");
            foreach($navs as $file => $label) {
                $page=pathinfo($file, $component);
                if ($page == $current) {
                    echo '            <li class="active"><a href="">'.htmlspecialchars($label).'</a></li>'.PHP_EOL;
                } else {
                    echo '            <li><a href="./'.htmlspecialchars($page).'">'.htmlspecialchars($label).'</a></li>'.PHP_EOL;
                }
            } ?>
         </ul>
     </nav>



