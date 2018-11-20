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
		$city = $row['city'];
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
						<input type="text" name="name" class="form-control" value="<?= ucfirst($name)?>" disabled />
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="surname" class="form-control" value="<?= ucfirst($surname)?>" disabled />
					</div>

					<br>
					<div class="input-group">
						<input type="text" name="city" class="form-control" value="<?= ucfirst($city)?>" disabled>
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="address" class="form-control" value="<?= ucfirst($address)?>" disabled />
					</div>
					
					<br>

					<div class="input-group">
						<input type="email" name="email" class="form-control" value="<?= $email ?>" disabled/>
					</div>

					<br>

				</form>
				<button type="submit" class="btn btn-primary" name="changeAddCity" onclick="location.href='changeaddress.php'">Change Address</button>
				<button type="submit" class="btn btn-primary" name="changePass" onclick="location.href='changepassword.php'"/>Change Password</button>
			</div>
		</div>
	</div>
</div>