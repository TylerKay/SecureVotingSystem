<?php
$email_b = $_POST['email'];

$con = new mysqli("localhost","root","root","sci");
if($con->connect_error){
  die("Failed to connect!");
}
else{
  $st = $con->prepare("select * from voters where email = ?");
  $st->bind_param("s",$email_b);
  $st->execute();
  $st_result = $st->get_result();
  if($st_result->num_rows > 0){
    header("Location:forgotPassword2.html");
  }
  else{
    echo("<script>alert('Invalid Email')</script>");
    echo("<script>window.location = 'index.html';</script>");
}
}

?>
