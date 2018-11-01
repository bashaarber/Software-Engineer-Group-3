<?php

	$server = 'localhost';
	$username = 'root';
	$password = 'root';
	$database = 'bookrenting';

	$connection = new mysqli($server, $username, $password, $database);

	if($connection->error){
		die('An error ocurred');
	}
?>