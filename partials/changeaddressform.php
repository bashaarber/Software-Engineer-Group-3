<?php  
	$connection = new mysqli("localhost", "root", "", "books");
	$id_user = $_SESSION['id'];

	$query = "SELECT * FROM users where id = $id_user";
	$result = $connection->query($query);

	while($row = $result->fetch_assoc()){
		$qyteti = $row['city'];
	}

	include 'changeaddressvalidation.php';

?>


<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Change City & Address </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="#" method="POST" class="Manageaccount">
					<?php  include('errors.php'); ?>	
					
					<div class="input-group">
						<select name="city" class="form-control" required="true">
							<option disabled> City </option>
							<option <?php if($qyteti == "Prishtine") echo 'selected';?> >Prishtine</option>
							<option <?php if($qyteti == "Mitrovice") echo 'selected';?> >Mitrovice</option>
							<option <?php if($qyteti == "Vushtrri") echo 'selected';?> >Vushtrri</option>
							<option <?php if($qyteti == "Peje") echo 'selected';?> >Peje</option>
							<option <?php if($qyteti == "Prizren") echo 'selected';?> >Prizren</option>
							<option <?php if($qyteti == "Ferizaj") echo 'selected';?> >Ferizaj</option>
							<option <?php if($qyteti == "Gjilan") echo 'selected';?> >Gjilan</option>
							<option <?php if($qyteti == "Gjakove") echo 'selected';?> >Gjakove</option>
						</select>
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="address" class="form-control" placeholder="New Address" required />
					</div>
					
					<br>


					<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
				</form>
			</div>
		</div>
	</div>
</div>