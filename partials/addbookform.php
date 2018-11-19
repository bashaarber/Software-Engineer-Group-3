<?php 
	@include('server.php');
 ?>

<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Add a Book </h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="partials/addbookfunctions.php" method="POST" class="registerform" enctype="multipart/form-data">
					<?php  include('errors.php'); ?>	
					<div class="input-group">
						<input type="text" name="authors" class="form-control"placeholder="Authors" required="required"/>
					</div>
					
					<br>

					<div class="input-group">
						<input type="text" name="title" class="form-control" placeholder="Title" required="required"/>
					</div>

					<br>

					<div class="input-group">
						<input type="text" name="isbn" class="form-control" placeholder="ISBN" required="required"/>
					</div>

					<br>

					<div class="input-group">
						<input type="file" name="fileToUpload" id="fileToUpload"  required="required" />
					</div>

					<br>

					<div >
						<input type="checkbox" name="isPublish"  />&nbsp;Publish
					</div>

					<br>

					<input type="submit" class="btn btn-primary" name="register_book" value="Submit"/>
				</form>
			</div>
		<div class="panel-footer text-center text-danger"> All fields are required*</div>
		</div>
	</div>
</div>