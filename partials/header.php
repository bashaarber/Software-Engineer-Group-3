<?php

	// Authentication test
	$authenticated = false;
?>

<nav class="navbar navbar-primary">
	<div class="container-fluid animated slideInUp">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="index.php"> <span class="logo">Book Renting</span></a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
		  	<?php
				if($authenticated === true):
			?>
			<li><a href="#"> Add a book <span class="sr-only">(current)</span></a></li>
			
			<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> My account <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="#">My books</a></li>
				<li><a href="#">Manage account</a></li>
				<li class="divider"></li>
				<li><a href="#">Sign out</a></li>
			  </ul>
			</li>
			<?php
				else:
			?>
					<li><a href="#">Register</a></li>
					<li><a href="#">Log in</a></li>

			<?php
				endif;
			?>
			
		</ul>
		</div>
	</div>
</nav>