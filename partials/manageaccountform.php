<?php @include('server.php'); 
	
	$db = mysqli_connect('localhost','root','','books');

	$id = $_SESSION['id'];

	$querry = "SELECT * FROM users WHERE id = $id";

	$result = mysqli_query($db,$querry);

	while($row = mysqli_fetch_assoc($result)){
		$name = $row['name'];
		$surname = $row['surname'];
		$address = $row['address'];
		$email = $row['email'];
		$password = $row['password'];
	}



?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Manage account </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="" method="POST" class="Manageaccount">
					<?php  include('errors.php'); ?>	
					<div class="input-group">
						<input type="text" name="name" class="form-control" value="<?= $name?>" disabled />
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="surname" class="form-control" value="<?= $surname?>" disabled />
					</div>

					<br>
					<div class="input-group">
						<input type="text" name="city" class="form-control" value="" disabled>
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="address" class="form-control" value="<?= $address?>" disabled />
					</div>
					
					<br>

					<div class="input-group">
						<input type="email" name="email" class="form-control" value="<?= $email ?>" disabled/>
					</div>

					<br>

					<div class="input-group">
						<input type="password" name="password" class="form-control" value="hahaha" disabled />
					</div>

					<br>

					<input type="submit" class="btn btn-primary" name="changeAddCity" value="Change City & Address"/>
					<input type="submit" class="btn btn-primary" name="changePass" value="Change Password"/>
				</form>
			</div>
		<div class="panel-footer text-center text-danger"> All fields are required*</div>
		</div>
	</div>
</div>