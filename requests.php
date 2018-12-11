<?php 
	session_start();

	$connection = new mysqli('localhost','root','','books');

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}else{
		$id_user = $_SESSION['id'];

		$query = "SELECT * FROM book b inner join users u on b.Id_User = u.id left join rents r on b.id_books = r.id_book where r.id_owner = $id_user AND r.status = 'REQUESTED'";

		$result = $connection->query($query);
	}

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

		<div class="container margin-100-top">

			<h2 class="h2 text-center"> Book borrow requests </h2> 
			
			<table class="table table-responsive table-bordered table-hover margin-50-top">
				<th>
					Book
				</th>
				<th>
					Requester
				</th>
				<th>
					Return Date
				</th>
				<th>
					Actions
				</th>

				<?php while($row = $result->fetch_assoc()){
					$id_book = $row['Id_Books'];
					$author = $row['Authors'];
					$title = $row['Title'];
					$isbn = $row['isbn'];
					$isRented = $row['IsRented'];
					$isPublished = $row['IsPublished'];
					$imgPath = $row['img_link'];
					$status = $row['status'];
					$returnDate = $row['return_date'];
					$id_borrower = $row['id_borrower'];
					$id_rent = $row['id_rent'];

					$borrowerQuery = "SELECT * FROM users where id = $id_borrower";
					$borrowerResult = $connection->query($borrowerQuery);
					while($borrowerRow = $borrowerResult->fetch_assoc()){
						$fullName = ucwords($borrowerRow['name']) . ' ' . ucwords($borrowerRow['surname']);
					}

					?>

				<tr>
					<td>
						<?= $title ?>
					</td>

					<td>
						<?= $fullName ?>
					</td>

					<td>
						<?= $returnDate ?>
					</td>

					<td>
						<a href="partials/acceptrequest.php?id_rent=<?= $id_rent ?>"><span class="glyphicon glyphicon-ok" title="Accept"></span></a>
						<a href="partials/denyrequest.php?id_rent=<?= $id_rent ?>"><span class="glyphicon glyphicon-remove" title="Deny"></span></a>
					</td>
				</tr>

			<?php }
			?>

			</table>

			<div class="margin-285-top"></div>

		</div>

			<?php 
				include 'partials/footer.php';
			?>


		
	</body>
</html>