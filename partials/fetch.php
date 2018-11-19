<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		img{
			width: 150px;
			height: 150px;
		}

	</style>
</head>
<body>
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "books";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM book";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	?>


	<img src="../uploads/<?php echo $row['img_link']; ?>">

	<?php

		    }
		} else {
		    echo "0 results";
		}
	$conn->close();
	?>
</body>
</html>

