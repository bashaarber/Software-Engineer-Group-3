<?php 

	$connection = new mysqli('localhost', 'root', '', 'books');

	if($_GET['id']){

	$id_rent = $_GET['id'];

	$today = date("Y-m-d");

	$query = "UPDATE rents set status = 'RETURNED', returned_date = '$today' where id_rent = $id_rent";

	$connection->query($query);

	header("Location: ../lends.php");


}
?>