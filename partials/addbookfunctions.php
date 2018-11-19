<?php 
	session_start();

	$conn = mysqli_connect('localhost','root','','books');

	// Upload Images
	$target_dir = "../uploads/";
	$imgName =  basename($_FILES["fileToUpload"]["name"]);
	$isbn = $_POST['isbn'];
	$target_file = $target_dir . $imgName;
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$authors = $_POST['authors'];
	$title = $_POST['title'];
	$id_user = $_SESSION['id'];
	$ispublish = $_POST['isPublish'];
	if($ispublish == 'on'){
		$ispublish = 1;
	}
	else if(!isset($ispublish))
	{
		$ispublish = 0;
	}
	$isRented = 0;
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";

	        $query = "INSERT INTO book(Authors,Title,isbn,IsRented,Id_User,img_link,IsPublished) VALUES ('${authors}', '${title}','${isbn}', ${isRented},${id_user},'${imgName}',${ispublish})";
	        var_dump($query);

	       $result = mysqli_query($conn,$query);

	       if ($result) {
					header('Location: ../mybooks.php');
			}else {
				echo mysqli_error($conn);
			}


	    } else {
	        echo "Sorry, there was an error uploading your file.";
	    }
	}





 ?>