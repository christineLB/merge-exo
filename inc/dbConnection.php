<?php

	$dsn = "mysql:host=localhost;dbname=estimates";
	$pdo = new PDO($dsn, 'root', '');

	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$pdo->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES \'UTF8\'');


?>