<?php

$email = $_POST['email'];
$password = $_POST['password'];

//database connection here
$con = new mysqli("localhost","voter","voting","voting_system");
if($con->connect_error){
  die("Failed to connect!");
}
else{
  $stmt = $con->prepare("select * from voters where email = ?");
  $stmt->bind_param("s",$email);
  $stmt->execute();
  $stmt_result = $stmt->get_result();
  if($stmt_result->num_rows > 0){
    $data = $stmt_result->fetch_assoc();
    if($data['password'] == $password){
      header("Location:loggedIn.html");
    }
    else{
      echo("<script>alert('Wrong Password!')</script>");
      echo("<script>window.location = 'index.html';</script>");
    }
  }
  else {
    echo("<script>alert('Invalid Email')</script>");
    echo("<script>window.location = 'index.html';</script>");
  }
}
?>
