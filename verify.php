<?php
SESSION_START();
header('location:login.php');
include "credentials.php";
$con= mysqli_connect($server, $username, $password);
if($con){
  echo "Connection Successful";
}
else{
  echo "Unsuccessful";
}
mysqli_select_db($con, 'registration');
$name= $_POST['user'];
$pass= $_POST['password'];

$q= "select * from signin where username = '$name' && password ='$pass' ";
$result= mysqli_query($con,$q);
$num=mysqli_num_rows($result);

if($num==1){
  $_SESSION['username']= $_POST['user'];
  $_SESSION['password']= '$pass';
  header('location:content.php');

  }else{
    header('location:login.php?invalid=invalid username and password');

  }

?>
