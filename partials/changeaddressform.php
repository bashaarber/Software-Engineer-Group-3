<?php @include('server.php') ?>


<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Change City & Address </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="" method="POST" class="Manageaccount">
					<?php  include('errors.php'); ?>	
					
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
						<input type="text" name="address" class="form-control" value="New Address " required />
					</div>
					
					<br>


					<input type="submit" class="btn btn-primary" name="back" value="Back"/>
					<input type="submit" class="btn btn-primary" name="submit" value="Submit"/>
				</form>
			</div>
		</div>
	</div>
</div>