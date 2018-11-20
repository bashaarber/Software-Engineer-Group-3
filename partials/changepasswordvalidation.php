<?php

	$oldPassword = "";
	$newPassword = "";
	$confirmPassword = "";
	$errors = [];


	if(isset($_POST['submit'])){

		if(!isset($_POST['oldPassword']) || $_POST['oldPassword'] == ""){
			array_push($errors, "The 'Old Password' field is invalid!");
		}else{
	    	$oldPassword = mysqli_real_escape_string($db, $_POST['oldPassword']);
		}

		if(!isset($_POST['newPassword']) || $_POST['newPassword'] == ""){
			array_push($errors, "The 'New Password' field is invalid!");
		}else{
	    	$newPassword = mysqli_real_escape_string($db, $_POST['newPassword']);
		}

		if(!isset($_POST['confirmPassword']) || $_POST['confirmPassword'] == ""){
			array_push($errors, "The 'Confirm Password' field is invalid!");
		}else{
	    	$confirmPassword = mysqli_real_escape_string($db, $_POST['confirmPassword']);
		}

		if(count($errors) == 0){

			$selectQuery = "SELECT password from users where id = $id_user";
			$result = $connection->query($selectQuery);

			while($row = $result->fetch_assoc()){
				$hashPassword = $row['password'];
			}

			if(md5($oldPassword) != $hashPassword){
				array_push($errors, "The 'Old Password' field is invalid!");
			}

			if($newPassword != $confirmPassword){
				array_push($errors, "The 'New Passowrd' and 'Confirm Password' fields do not match!");
			}else{
				$newHashPassword = md5($newPassword);
			}
		}

		if(count($errors) == 0){
			$updateQuery = "UPDATE users set password = '$newHashPassword' where id = $id_user";
			$connection->query($updateQuery);
			header("Location: manageaccount.php");
		}

	}

?>