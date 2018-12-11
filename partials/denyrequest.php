<?php
	session_start();

	$connection = new mysqli('localhost','root','','books');

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}else{
		$id_user = $_SESSION['id'];

		$id_rent = $_GET['id_rent'];

		$query = "UPDATE rents SET status = 'DENIED'  WHERE id_rent = $id_rent AND id_owner = $id_user";

		$connection->query($query);

		header("Location: ../requests.php");
	}


?>