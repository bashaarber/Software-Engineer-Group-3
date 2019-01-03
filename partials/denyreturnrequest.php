<?php 

	$connection = new mysqli('localhost', 'root', '', 'books');

	if($_GET['id']){

	$id_rent = $_GET['id'];

	$query = "UPDATE rents set status = 'LOST' where id_rent = $id_rent";

	$connection->query($query);

	header("Location: ../lends.php");


}
?>