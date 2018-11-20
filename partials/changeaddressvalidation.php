<?php

	$city = "";
	$address = "";
	$errors = [];

	if(isset($_POST['submit'])){

		if(!isset($_POST['city']) || $_POST['city'] == ""){
			array_push($errors, "The 'City' field is invalid!");
		}else{
	    	$city = mysqli_real_escape_string($db, $_POST['city']);
		}

		if(!isset($_POST['address']) || $_POST['address'] == ""){
			array_push($errors, "The 'Address' field is invalid!");
		}else{
	    	$address = mysqli_real_escape_string($db, $_POST['address']);
		}

		if(count($errors) == 0){
			$updateQuery = "UPDATE users set city = '$city', address = '$address' where id = $id_user";
			echo $updateQuery;
			$connection->query($updateQuery);
			header("Location: manageaccount.php");
		}

	}
?>