<?php
$con = new mysqli("localhost","root","root","sci");
function email_rec($string){
  $email_a = $string;
}

$email_a = $email;
$image1 = $_POST['image1'];
$image2 = $_POST['image2'];


$sql = "UPDATE forms SET image1 = '$image1', image2 = '$image2' WHERE email = $email_a";
mysql_query($sql);

header("Location:startVoting.html");
 ?>
