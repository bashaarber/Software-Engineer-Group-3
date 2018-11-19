<?php
	session_start();

	$connection = new mysqli('localhost','root','','books');
	
	$id_user = $_SESSION['id'];
	$query = "SELECT * FROM book where id_User = $id_user";
	$result = $connection->query($query);
	
?>

<html>
	<head>
		<title>My Books</title>
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

			<h2 class="text-center h2 margin-100-top animated bounceInDown delay-1s"> My Books </h2>

			
			
			<div class="margin-100-top">
				<div class="row">

				<?php
					while($row = $result->fetch_assoc()){
						$id_book = $row['Id_Books'];
						$author = $row['Authors'];
						$title = $row['Title'];
						$isbn = $row['isbn'];
						$isRented = $row['IsRented'];
						$isPublished = $row['IsPublished'];
						$imgPath = $row['img_link'];
				?>

				<div class="col-md-3 col-sm-6 animated fadeIn delay-1s" style="margin-bottom: 40px;">
					<img src="uploads/<?=$imgPath?>" width = "250" height = "350"/>
					<div class="text-center" style="font-size: 20px;"> "<?= $title ?>" </div>
					<div class="text-center" style="font-size: 18px;"> - <?= $author ?> </div>

					<button class="btn btn-primary margin-20-top center-block" onclick="location.href='publishbook.php?id=<?=$id_book?>'">
						<?php if($isPublished)
								 echo 'Unpublish';
						 	  else
						 	  	echo 'Publish'; ?>
			 	  	</button>
			</div>


				<?php } ?>
				</div>


			


			<div class="margin-100-top">



			<?php 
				include 'partials/footer.php';
			?>

		</div>

		
	</body>
</html>