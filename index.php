<?php 
	session_start();

	$connection = new mysqli('localhost','root','','books');
	

	if(isset($_GET['logout'])){
		session_destroy();
		header("Location: index.php");
		}

	if(isset($_SESSION['id'])){
		$id_user = $_SESSION['id'];
		$query = "SELECT * FROM book b inner join users u on b.Id_User = u.id left join rents r on b.id_books = r.id_book and r.id_borrower = $id_user  where isPublished = 1  AND id_user <> $id_user";
	}
	else
		$query = "SELECT * FROM book b inner join users u on b.Id_User = u.id where isPublished = 1";

	$result = $connection->query($query);

?>
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
	</head>	
	<body>
  	
		
			<?php 
				include 'partials/header.php';
			?>
		<div class="container">
			
			<div class="margin-100-top"></div>
			
			<div class="row animated fadeInDown delay-1s center-block" style="width:80%;">
			  <div class="col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2">
			  	<form method="GET" action="searchbook.php">
				    <div class="input-group">
				      <input id="searchInput" name="search" type="text" class="form-control" placeholder="Search a book...">
				      <span class="input-group-btn">
				        <input type="submit" class="btn btn-primary" value="Submit"/> &nbsp;
				      </span>
				    </div>
				</form>
			  </div>
			</div>


			<div class="row margin-100-top">

				<?php
					while($row = $result->fetch_assoc()){
						$id_book = $row['Id_Books'];
						$fullName = ucwords($row['name']) . ' ' . ucwords($row['surname']);
						$author = $row['Authors'];
						$title = $row['Title'];
						$isbn = $row['isbn'];
						$isRented = $row['IsRented'];
						$isPublished = $row['IsPublished'];
						$imgPath = $row['img_link'];
						if(isset($id_user)){
							$status = $row['status'];
							$id_borrower = $row['id_borrower'];
					}
				?>

				<div class="col-md-4 col-sm-6 animated fadeIn delay-1s text-center" style="margin-bottom: 40px;">
					<div class="text-center" style="font-size:17px;"> Published by: <strong> <?=$fullName?> </strong></div>
					<img src="uploads/<?=$imgPath?>" width = "250" height = "350"/>
					<div class="text-center" style="font-size: 20px;"> "<?= $title ?>" </div>
					<div class="text-center" style="font-size: 18px;"> <em> - <?= $author ?></em> </div>

					<br>

					<?php
						if(isset($_SESSION['id'])){
						if($id_borrower == $id_user){?>
							<div><button class="btn btn-primary" disabled> <?= $status ?> </button></div>
						<?php }	else{
					?>
					<div><a href="requestbook.php?id_book=<?=$id_book?>" class="btn btn-primary">Request</a></div>
				<?php }
			}?>
				</div>


				<?php } ?>
				</div>

				<div class="margin-60-top">

		</div>
	</div>

			<?php 
				include 'partials/footer.php';
			?>


		
	</body>
</html>