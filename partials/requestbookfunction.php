<?php 

	session_start();

	$connection = new mysqli('localhost','root','','books');

	$id_book = $_POST['id_book'];

	$return_date = $_POST['return_date'];

	$insert_date = date("Y-m-d", strtotime($return_date));

	$id_borrower = $_SESSION['id'];

	$status = "REQUEST";

	if(isset($_POST['return_date'])){

		$query = "SELECT * FROM book WHERE Id_Books = $id_book";

		$result = $connection->query($query);

		while($row = $result->fetch_assoc()){
			$id_owner = $row['Id_User'];
		}

		$insertQuery = "INSERT INTO rents(id_book,id_owner,id_borrower,return_date,status) VALUES ($id_book , $id_owner, $id_borrower, '$insert_date','$status')"; 


		$insertResult = $connection->query($insertQuery);

		if(!$insertResult){
			echo mysqli_error($connection);

		}else{
			header('Location:../index.php');
		}
	}


 ?>