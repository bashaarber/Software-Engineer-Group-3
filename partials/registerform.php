<?php @include('server.php') ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Register </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="" method="POST" class="registerform">
					<?php  include('errors.php'); ?>	
					<div class="input-group">
						<input type="text" name="name" class="form-control" placeholder="Name" required="required"/>
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="surname" class="form-control" placeholder="Surname" required="required" />
					</div>

					<br>
					<div class="input-group">
						<select name="city" class="form-control" required="true">
							<option disabled selected> City </option>
							<option>Prishtine</option>
							<option>Mitrovice</option>
							<option>Vushtrri</option>
							<option>Peje</option>
							<option>Prizren</option>
							<option>Ferizaj</option>
							<option>Gjilan</option>
							<option>Gjakove</option>
						</select>
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="address" class="form-control"placeholder="Address" required="required"/>
					</div>
					
					<br>

					<div class="input-group">
						<input type="email" name="email" class="form-control" placeholder="Email" required="required"/>
					</div>

					<br>

					<div class="input-group">
						<input type="password" name="password" class="form-control"placeholder="Password" required="required"/>
					</div>

					<br>

					<div class="input-group">
						<input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required="required"/>
					</div>

					<br>

					<input type="submit" class="btn btn-primary" name="register_user" value="Submit"/>
				</form>
			</div>
		<div class="panel-footer text-center text-danger"> All fields are required*</div>
		</div>
	</div>
</div>