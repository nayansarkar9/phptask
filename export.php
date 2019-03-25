<?php
if(isset($_POST["submit"])){
  header("Content-Type: application/vnd.ms-word");
  header("Content-Disposition: attachment;Filename=".rand().".doc");
  header("Pragma: no-cache");
  header("Expires: 0");
      	 $fname = ($_POST["fname"]);
  $lname = ($_POST["lname"]);
  $phonenumber = ($_POST["phonenumber"]);
  $email = ($_POST["email"]);
  $fullname=($_POST["fullname"]);
  $text=($_POST["txtarea"]);
  
  echo "<p>Fullname- $fullname</p>";
  
  echo "<p>Contact- $phonenumber</p>";

  
  echo "<p>Email_id- $email</p>";

  
  echo "<p>marks- $text</p>";


}

?>