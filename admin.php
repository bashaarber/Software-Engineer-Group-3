<?php 
	session_start();

	$connection = new mysqli('localhost','root','','books');
	$Today = date("Y/m/d");

	

	if(isset($_GET['logout'])){
		session_destroy();
		header("Location: index.php");
		}

	$lost = 'LOST';

	$query = "SELECT * FROM rents r  where r.status = '$lost' ";

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
  	
	<nav class="navbar navbar-primary">
	<div class="container-fluid animated SlideInUp">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
		  </button>
		  <a class="navbar-brand" href="index.php"> <span class="logo">Book Renting</span></a>

		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav navbar-right">
			<li><a href="admin.php?logout">Sign out</a></li>
		  </ul>
			
		</div>
	</div>
	</nav>
		<div class="container">

			<div class="container margin-100-top">

			<h2 class="h2 text-center"> Lost Books</h2> 
			
			<table class="table table-responsive table-bordered table-hover margin-50-top">
				<tr>
					<th class="text-center">
						Book
					</th>
					<th class="text-center">
						Owner
					</th>
					<th class="text-center">
						Borrower
					</th>
					<th class="text-center">
						ISBN
					</th>
				</tr>

				<?php while($row = $result->fetch_assoc()){
					
					$id_book = (int)$row['id_book'];
					$id_borrower = (int)$row['id_borrower'];
					$id_owner = (int)$row['id_owner'];


					$bookQuery = "SELECT * from book where Id_Books = $id_book";
					$bookResult = $connection->query($bookQuery);
					while($bookRow = $bookResult->fetch_assoc()){
					$author = $bookRow['Authors'];
					$title = $bookRow['Title'];
					$isbn = $bookRow['isbn'];
					}




					$ownerQuery = "SELECT * FROM users where id = $id_owner";
					$ownerResult = $connection->query($ownerQuery);
					while($ownerRow =$ownerResult->fetch_assoc()){
						$ownerName = ucwords($ownerRow['name']) . ' ' . ucwords($ownerRow['surname']);
					}
					
	



					$borrowerQuery = "SELECT * FROM users where id = $id_borrower";
					$borrowerResult = $connection->query($borrowerQuery);
					while($borrowerRow = $borrowerResult->fetch_assoc()){
						$borrowerName = ucwords($borrowerRow['name']) . ' ' . ucwords($borrowerRow['surname']);
					}
					
					



					?>

				<tr class="text-center">
					<td>
						<?= $title ?>
					</td>

					<td>
						<?= $ownerName ?>
					</td>

					<td>
						<?= $borrowerName ?>
					</td>
					<td>
						<?= $isbn ?>
					</td>
				</tr>

			<?php }
			?>

			</table>

	

		</div>

		</div>

		<div class="margin-285-top">

		</div>

			<?php 
				include 'partials/footer.php';
			?>


		
	</body>
</html>