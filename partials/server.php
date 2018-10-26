<?php 

session_start();

$name = "";
$surname = "";
$email = "";
$address = "";
$errors = array();

$db = mysqli_connect('localhost','root','','books');

if(isset($_POST['register_user'])){


    $name = mysqli_real_escape_string($db, $_POST['name']);
    $surname = mysqli_real_escape_string($db, $_POST['surname']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password']);
    $password_2 = mysqli_real_escape_string($db, $_POST['confirmPassword']);

     if (empty($name)) { array_push($errors, "Username is required"); }
    if (empty($surname)) { array_push($errors, "Surname is required"); }
    if (empty($address)) { array_push($errors, "Address is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }

    if ($password_1 != $password_2) {
  	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE email='$email'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

   if ($user) {  
    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }
  else
  {
    $password = md5($password_1);
    $query = "INSERT INTO users (name, surname, address, email, password) 
          VALUES('$name', '$surname', '$address', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['email'] = $email;
    $_SESSION['success'] = "You are now logged in";
    header("Location:index.php");
    exit();
  }

} 


if (isset($_POST['login_user'])) {


  $email = mysqli_real_escape_string($db, $_POST['Email']);
  $password = mysqli_real_escape_string($db, $_POST['Password']);

  if (empty($email)) {
  	array_push($errors, "Email is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";echo "string";
  	  header('location: index.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>


