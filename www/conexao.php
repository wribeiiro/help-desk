<?php
	// 0 - false(producao)
    // 1 - true(desenvolvimento)
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(1);

	$host = 'host.docker.internal';
	$user = 'root';
	$pass = 'root';
	$db   = 'help_desk';

	$con = mysqli_connect($host, $user, $pass, $db, 3309);

	if (!$con) {
		printf("Can't connect to localhost. Error: %s\n", mysqli_connect_error());
		exit();
	}
?>