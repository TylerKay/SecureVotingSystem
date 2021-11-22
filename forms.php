<?php
//<a href = "startVoting.html" class="newBtn">Continue</a>
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

// get the post records
$email = $_POST['email'];
$image1 = $_POST['image1'];
$image2 = $_POST['image2'];

$conn = new mysqli('localhost','voter','voting','sci');
if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into forms(image1,image2) values(?, ?, ?, ?, ?, ?,?,?)");
  $stmt->bind_param("sssssssi", $email,$password,$social,$add,$add2,$city,$state,$zip);
  $execval = $stmt->execute();
  echo $execval;
  echo "Registration successfully...";
  $stmt->close();
  $conn->close();
}
header("Location:startVoting.html");
 ?>
