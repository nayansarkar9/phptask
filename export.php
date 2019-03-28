<?php
if(isset($_GET["email"])){
  $email = $_GET['email'];
  header("Content-Type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=".rand().".doc");
  header("Pragma: no-cache");
  header("Expires: 0");
      	 $fname = ($_GET["firstname"]);
  $lname = ($_GET["lastname"]);
  $phonenumber = ($_GET['number']);

  $fullname=($_GET["fullname"]);
  $text=($_GET["message"]);
  
  echo "<p>Fullname- $fullname</p>";
  
  echo "<p>Contact- $phonenumber</p>";

  
  echo "<p>Email_id- $email</p>";

  
  echo "<p>marks- $text</p>";


}

?>