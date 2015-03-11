<?php

function error($status, $title, $message) {
	header($_SERVER["SERVER_PROTOCOL"]." ".$status." ".$title);
	include(__DIR__.'/../res/header.php');
	// TODO: Error messages look shitty
	echo('<div class="content">');
	echo('<h2>Whoops, that wasn\'t supposed to happen!</h2><br>'.PHP_EOL);
	echo('<img src="./res/media/errors/'.rand(1, 11).'.jpg" width="500"/><br><br>'.PHP_EOL);
	echo('<h4>But do not fear! Out tech-kittens have already been notified!</h4>'.PHP_EOL);
	echo('<p>'.$message.'</p>'.PHP_EOL);
	echo('</div>');
	if (defined("DEBUG")) echo('<hr>'.PHP_EOL.$_SERVER['SERVER_SIGNATURE'].PHP_EOL);
	include(__DIR__.'/../res/footer.php');
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

if (file_exists(__DIR__.'/../config.php')) {
	$config=include(__DIR__.'/../config.php');
} else {
	die(error(500, "Configuration Error", "The Configuration file could not be found"));
}

$database = mysqli_connect($config['mysql-host'], $config['mysql-username'], $config['mysql-password'], $config['mysql-database']);
if (!$database) die(error(500, "Database Error", "Cant connect to database"));

session_start();

define("DEBUG", 1);

?>
