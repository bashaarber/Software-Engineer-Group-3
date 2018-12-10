
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
				?>

				<div class="col-md-6 col-sm-6 animated fadeIn delay-1s text-center" style="margin-bottom: 40px;">
					<div class="text-center" style="font-size:17px;"> Published by: <?=$fullName?> </div>
					<img src="uploads/<?=$imgPath?>" width = "250" height = "350"/>
					<div class="text-center" style="font-size: 20px;"> "<?= $title ?>" </div>
					<div class="text-center" style="font-size: 18px;"> - <?= $author ?> </div>
				</div>


				<?php } ?>

		<div class="col-md-4 animated fadeIn delay-1s text-center" style="margin-top: 95px;">

		<div class="panel panel-primary animated fadeIn delay-1s">

			<div class="panel-heading text-center">
				<h2> Return Date</h2>
			</div>

			<br>

			<div class="panel-body text-center">
				<form action="partials/requestbookfunction.php" method="POST" class="registerform" enctype="multipart/form-data">
					<?php  include('errors.php'); ?>	
					<div class="input-group">
						<input type="date" name="return_date" class="form-control" required="required"/>
					</div>
					
					<br>
					<input type="hidden" name="id_book" value="<?=$id_book?>">
					
					<input type="submit" class="btn btn-primary" name="register_book" value="Request"/>
				</form>
			</div>
		<div class="panel-footer text-center text-danger"> You need to choose a date*</div>
		</div>
	</div>