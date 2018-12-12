<?php
	session_start();

	$connection = new mysqli('localhost','root','','books');

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}else{
		$id_user = $_SESSION['id'];
		$id_book = $_GET['id_book'];
		$id_rent = $_GET['id_rent'];

		$query = "UPDATE rents SET status = 'ACCEPTED' WHERE id_rent = $id_rent AND id_owner = $id_user";
		$connection->query($query);

		$secondQuery = "UPDATE rents SET status = 'DENIED' WHERE id_rent <> $id_rent AND id_owner = $id_user AND id_book = $id_book";
		$connection->query($secondQuery);

		header("Location: ../requests.php");
	}


?>