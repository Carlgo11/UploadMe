<?php

function error($status, $title, $message) {
	// TODO: modify this to reflect our template
	header($_SERVER["SERVER_PROTOCOL"]." ".$status." ".$title);
	echo('<!DOCTYPE HTML>'.PHP_EOL);
	echo('<html><head>'.PHP_EOL);
	echo('<title>'.htmlspecialchars($status." ".$title).'</title>'.PHP_EOL);
	echo('</head><body>'.PHP_EOL);
	echo('<h1>'.htmlspecialchars($title).'</h1>'.PHP_EOL);
	echo('<p>'.$message.'</p>'.PHP_EOL);
	if (defined("DEBUG")) echo('<hr>'.PHP_EOL.$_SERVER['SERVER_SIGNATURE'].PHP_EOL);
	echo('</body></html>'.PHP_EOL);
}

// Use composer autoload if installed
if (file_exists('../vendor/autoload.php')) {
	include('../vendor/autoload.php');
} else { // use manual autoload in /lib
	spl_autoload_register(function ($class) {
		$file=__DIR__."/".str_replace("\\", "/", $class).".php";
		if (file_exists($file)) {
			include($file);
			return true;
		} else {
			return false;
		}
	});
}

if (file_exists('../config.php')) {
	include('../config.php');
} else {
	die(error(500, "Configuration Error", "The Configuration file could not be found"));
}

//$con = mysqli_connect($conf['mysql-url'], $conf['mysql-user'], $conf['mysql-password'], $conf['mysql-db']);

if (!$con) die(error(500, "Database Error", "Cant connect to database"));


?>
