<?php 

	session_start();

	$connection = new mysqli('localhost','root','','books');

	$id_book = $_POST['id_book'];
	$id_owner = $_POST['id_owner'];

	$return_date = $_POST['return_date'];

	$insert_date = date("Y-m-d", strtotime($return_date));

	$id_borrower = $_SESSION['id'];

	$status = "REQUESTED";

	if(isset($_POST['return_date'])){

		$query = "SELECT * FROM book WHERE Id_Books = $id_book";

		$result = $connection->query($query);

		while($row = $result->fetch_assoc()){
			$id_owner = $row['Id_User'];
		}

		$searchQuery = "SELECT * from rents where id_book = $id_book and id_borrower = $id_borrower and id_owner = $id_owner";

		$searchResult = $connection->query($searchQuery);

		if(count($searchResult) > 0){
			$connection->query("UPDATE rents set status = 'REQUESTED' where id_book = $id_book and id_borrower = $id_borrower and id_owner = $id_owner");

			header('Location:../index.php');
			die();
		}else{

		$insertQuery = "INSERT INTO rents(id_book,id_owner,id_borrower,return_date,status) VALUES ($id_book , $id_owner, $id_borrower, '$insert_date','$status')"; 

		$insertResult = $connection->query($insertQuery);

		if(!$insertResult){
			echo mysqli_error($connection);

		}else{
			header('Location:../index.php');
		}
	}
	}


 ?>