<?php 
	@include('server.php');
 ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Log in </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="" method="POST" class="registerform">
					<?php  include('errors.php'); ?>	
					<div class="input-group">
						<input type="text" name="Email" class="form-control" placeholder="Email" required="required" />
					</div>

					<br>

					<div class="input-group">
						<input type="password" name="Password" class="form-control"placeholder="Password" required="required"/>
					</div>
                  
					<br>

					<input type="submit" class="btn btn-primary" name="login_user" value="Submit"/>
				</form>

				
				
			</div>
		</div>
	</div>
</div>
