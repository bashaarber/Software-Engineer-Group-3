<?php 
	session_start();

	$connection = new mysqli('localhost','root','','books');

	if(!isset($_SESSION['id'])){
		header("Location: index.php");
	}else{
		$id_user = $_SESSION['id'];

		$query = "SELECT * FROM book b inner join users u on b.Id_User = u.id left join rents r on b.id_books = r.id_book where r.id_borrower = $id_user AND (status = 'ACCEPTED' or status = 'LOST' or status = 'RETURN REQUEST' or status = 'RETURNED')";

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

			<h2 class="h2 text-center"> Borrowed books </h2> 
			
			<table class="table table-responsive table-bordered table-hover margin-50-top">
				<tr>
					<th class="text-center">
						Book
					</th>
					<th class="text-center">
						Loaned from
					</th>
					<th class="text-center">
						Return Date
					</th>
					<th class="text-center">
						Status
					</th>
					<th class="text-center">
						Action
					</th>
				</tr>

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
					$id_owner = $row['id_owner'];
					$id_rent = $row['id_rent'];

					$ownerQuery = "SELECT * FROM users where id = $id_owner";
					$ownerResult = $connection->query($ownerQuery);
					while($ownerRow = $ownerResult->fetch_assoc()){
						$fullName = ucwords($ownerRow['name']) . ' ' . ucwords($ownerRow['surname']);
					}

					?>

				<tr class="text-center">
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
						<?= $status ?>
					</td>

					<td>
						<?php if($status == 'ACCEPTED'){ ?>
							<form action="partials/requestreturnbook.php" method="POST">
								<button class="btn btn-primary"> Return </button>
								<input type="hidden" name="id_rent" value="<?= $id_rent?>"/>
							</form>

						<?php }else if($status == 'RETURN REQUEST') {
						?> 
								<button class="btn btn-primary" disabled> Request </button>
							<?php }else if($status == 'RETURNED'){ ?>

						<span class="glyphicon glyphicon-thumbs-up" title="Returned"></span>

					<?php }else{?>


						<a href="#"><span class="glyphicon glyphicon-thumbs-down" title="Lost"></span></a>

						<?php } ?>

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