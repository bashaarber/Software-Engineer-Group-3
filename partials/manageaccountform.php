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
				<div class="table-responsive">
				  <table class="table table-bordered text-center">
				  	<tr>
				  		<th class="text-center">Name</th>
				  		<td><?= $name?></td>
				  	</tr>
				  	
				  	<tr>
				  		<th class="text-center">Surname</th>
				  		<td><?= $surname?></td>
				  	</tr>
				  	
				  	<tr>
				  		<th class="text-center">City</th>
				  		<td><?= $city?></td>
				  	</tr>
				  	
				  	<tr>
				  		<th class="text-center">Address</th>
				  		<td><?= $address?></td>
				  	</tr>
					
					<tr>
				  		<th class="text-center">Email</th>
				  		<td><?= $email?></td>
				  	</tr>

				  </table>
				</div>
				<button type="submit" class="btn btn-primary" name="changeAddCity" onclick="location.href='changeaddress.php'">Change Address</button>
				<button type="submit" class="btn btn-primary" name="changePass" onclick="location.href='changepassword.php'"/>Change Password</button>
			</div>
		</div>
	</div>
</div>