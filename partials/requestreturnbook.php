<?php 

$connection = new mysqli('localhost', 'root', '', 'books');

if(isset($_POST['id_rent'])){

	$id_rent = $_POST['id_rent'];

	$query = "UPDATE rents set status = 'RETURN REQUEST' where id_rent = $id_rent";

	$connection->query($query);

	header("Location: ../borrowedbooks.php");


}

?>