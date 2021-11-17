<?php
// database connection code
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');

// get the post records
$email = $_POST['email'];
$pass = $_POST['pass'];
$social = $_POST['social'];
$add = $_POST['add'];
$add2 = $_POST['add2'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];

$conn = new mysqli('localhost','root','kawhi','voting_system');
if($conn->connect_error){
  echo "$conn->connect_error";
  die("Connection Failed : ". $conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into voters(email,password,social,address,address2,city,state,zip) values(?, ?, ?, ?, ?, ?,?,?)");
  $stmt->bind_param("sssssssi", $email,$pass,$social,$add,$add2,$city,$state,$zip);
  $execval = $stmt->execute();
  echo $execval;
  echo "Registration successfully...";
  $stmt->close();
  $conn->close();
}
header("Location:index.html");
?>
