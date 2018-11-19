<?php 

	session_start();

	$connection = new mysqli('localhost','root','','books');
	
	$id_user = $_SESSION['id'];
	$id_book = $_GET['id'];

	$query = "SELECT * FROM book where id_User = $id_user AND Id_Books = $id_book";
	
	$result = $connection->query($query);

	while($row = $result->fetch_assoc()){
		$isPublished = $row['IsPublished'];
	}

	if($isPublished == 0){
		$updateQuery = "UPDATE book set IsPublished = 1 where id_User = $id_user AND Id_Books = $id_book";
	}else{
		$updateQuery = "UPDATE book set IsPublished = 0 where id_User = $id_user AND Id_Books = $id_book";
	}

	$connection->query($updateQuery);
	$connection->close();

	header("Location: mybooks.php");
	

?>