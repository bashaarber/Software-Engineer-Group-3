<!-- <?php
session_start();
$connection = new mysqli('localhost', 'root', '', 'books');


function getFullName(){
  $fullNameQuery = "SELECT name,surname from users where id = $_SESSION['id']";
  $fullNameResult = $db->query($fullNameQuery);

  while($row = $fullNameResult->fetch_assoc()){
    $fullName = $row['name'] + $row['surname'];
  }

  return $fullName;
}
?> -->