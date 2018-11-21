<?php 
	include'partials/server.php';
 ?>
<html>
	<head>
		<title> Add a book </title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
		<script src="libs/jquery/jquery.js"></script>
  		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="libs/css/style.css">
		<link rel="stylesheet" href="libs/css/animate.css">
		<link rel="icon" href="images/book.ico">
  		
	</head>	
	<body>
  	
		
		<?php 
			include 'partials/header.php';
		?>

		<div class="container">

			<div class="margin-100-top"></div>

			<?php
				include 'partials/changeaddressform.php';
			?>

			<div class="margin-100-top"></div>

		</div>

		<?php 
			include 'partials/footer.php';
		?>


		
	</body>
</html>