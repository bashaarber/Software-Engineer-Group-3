<style>

</style>

<html>
	<head>
		<title>Book Renting</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
		<link rel="stylesheet" href="libs/bootstrap/css/bootstrap.min.css">
		<script src="libs/jquery/jquery.js"></script>
  		<script src="libs/bootstrap/js/bootstrap.min.js"></script>
  		<link rel="stylesheet" href="libs/css/style.css">
		<link rel="stylesheet" href="libs/css/animate.css">
		<link rel="icon" href="images/book.ico">
  		<script src="libs/particles/particles.js"></script>
  		<script>
  			particlesJS.load('particles-js', 'libs/particles/demo/particles.json');
	  	</script>
	</head>	
	<body>
  	
  		<div id="particles-js"></div>

		<div class="container">
		
			<?php 
				include 'partials/header.php';
			?>
			
			<div class="margin-100-top"></div>
			
			<div class="row animated fadeIn delay-1s">
			  <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
			    <div class="input-group">
			      <input id="searchInput" type="text" class="form-control" placeholder="Search a book...">
			      <span class="input-group-btn">
			        <button class="btn btn-primary" type="button"> &nbsp;
			        	<span class="glyphicon glyphicon-search"/>
			        </button>
			      </span>
			    </div>
			  </div>
			</div>

			<div class="margin-500-top"></div>



			<?php 
				include 'partials/footer.php';
			?>

		</div>

		
	</body>
</html>