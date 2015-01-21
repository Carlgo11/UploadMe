<?php

if (file_exists('config.php')) {
    header("Location: ./");
} else {

    if (isset($_POST['submit'])) {
        rename("./config.example.php", "./config.php");

        // Modify Config file
        $data=file_get_contents("./config.php");
        $fields=array("mysql-url", "mysql-user", "mysql-password", "mysql-db", "mysql-table");
        foreach($fields as $field) {
            $data=preg_replace('#\$conf\[\''.$field.'\'\] ?= ?([^;]*);#', '$conf[\''.$field.'\'] = '.var_export($_POST[$field], true).';' ,$data);
        }
        file_put_contents("./config.php", $data);

        // Include the new File
        // TODO: What if config does not work?
        include 'config.php';

        // Init Database
        $query='CREATE TABLE IF NOT EXISTS `'.$conf['mysql-table'].'` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(30) NOT NULL,
            `type` varchar(30) NOT NULL,
            `size` int(11) NOT NULL,
            `content` mediumblob NOT NULL,
            `file-name` text,
            `removalcode` text,
            `encryption` text,
            `salt` text,
            PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1';

        $con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']) or header('Location: ./mysql-error.php');
        $query = $con->query($query);
    } else {
        ?>
        <!DOCTYPE html>
        <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Simple way to upload files">
        <meta name="author" content="carlgo11">
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="Expires" CONTENT="-1">
        <link rel="shortcut icon" type="image/icon" href="./resources/media/logo.png"/>
        <title>
            <?php
            include './config.php';
            echo $conf['title'];
            ?>
        </title>
        <link href="./css/bootstrap.min.css" rel="stylesheet">
        <link href="./css/insallation.css" rel="stylesheet">
        <script src="./js/bootstrap.file-input.js"></script>
    </head>
    <body>
    <div class="container" style="margin-top: 100px">
        <div class="jumbotron">
            <h1>Welcome to your UpLoadMe!</h1>
            <p>To begin using UpLoadMe you need to set up a few things.</p>
            <p>This page will help you with that.</p>
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="panel panel-default">
                <div class="panel-heading"><b class="panel-title">Mysql</b></div>
                <div class="panel-body">
                    <p>UpLoadMe uses mysql to store the files and it's accessories.</p>
                    <p>If you haven't installed mysql yet please do so now.</p>
                    <input type='text' class="form-control" placeholder="Mysql url" name='mysql-url' required="">
                    <input type='text' class="form-control" placeholder="Mysql username" name='mysql-user' required="">
                    <input type='password' class='form-control' placeholder="Mysql password" name='mysql-password' required="">
                    <input type="text" class='form-control' placeholder="Mysql database" name="mysql-db" required="">
                    <input type='text' class="form-control" placeholder="Mysql table" name="mysql-table" required="">
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><b class="panel-title">Other</b></div>
                <div class="panel-body">
                    <i>Contact email is used for contact.php's contact form.</i>
                    <input type='email' class="form-control" placeholder="Contact email" name="email-reciver">
                    <input type='text' class='form-control' placeholder="Page title" name="title" required="">
                </div>
            </div>
            <button class='btn btn-lg btn-success' type="submit" name="submit">Install <span class="glyphicon glyphicon-download-alt" aria-hidden='true'></span></button>
        </form>
    </div>
    </body>


    <?php
    }
}
