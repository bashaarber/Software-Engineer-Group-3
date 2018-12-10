<?php 
	session_start();

	$connection = new mysqli('localhost','root','','books');
	
	if(isset($_GET['id_book'])){
		$id_book = $_GET['id_book'];
	}
	
	if(isset($_SESSION['id'])){
		$id_user = $_SESSION['id'];
		$query = "SELECT * FROM book b inner join users u on b.Id_User = u.id where isPublished = 1 AND Id_Books = $id_book";
	}
	$result = $connection->query($query);

?>

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
	</head>	
	<body>
  	
		
			<?php 
				include 'partials/header.php';
			?>

		<div class="container">
			
		<div class="row margin-100-top">

			<?php include 'partials/requestbookform.php'; ?>

		</div>


				

		<div class="margin-100-top">

		</div>
		
		</div>

			<?php 
				include 'partials/footer.php';
			?>


		
	</body>
</html>