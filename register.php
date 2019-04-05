<?php
SESSION_START();
header('location:login.php?signed=Signed Up Succesfully. Now login');
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
if(empty($name)&&empty($pass)){
  header('location:login.php?empty=Cannot be empty');
}
else{
$q= "select * from signin where username = '$name' && password ='$pass' ";
$result= mysqli_query($con,$q);
$num=mysqli_num_rows($result);

if($num==1){
  header('location:login.php?already= Already a user');
  }else{
    $qq= "insert into signin(username,password) values ('$name','$pass')";
    mysqli_query($con,$qq);

  }
}

?>
