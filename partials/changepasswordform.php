<?php 

	$connection = new mysqli("localhost", "root", "", "books");
	$id_user = $_SESSION['id'];
	
	include 'changepasswordvalidation.php';
 ?>


<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Change Password </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="#" method="POST" class="Manageaccount">
					<?php  include('errors.php'); ?>	
					
					<div class="input-group">
						<input type="password" name="oldPassword" class="form-control"placeholder="Old Password" required="required"/>
					</div>

					<br>


					<div class="input-group">
						<input type="password" name="newPassword" class="form-control"placeholder="New Password" required="required"/>
					</div>

					<br>

					<div class="input-group">
						<input type="password" name="confirmPassword" class="form-control" placeholder="Confirm Password" required="required"/>
					</div>

					<br>

					<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
				</form>
			</div>
		</div>
	</div>
</div>