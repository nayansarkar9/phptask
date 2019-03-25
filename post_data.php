<?php
$conn = mysql_connect('demolempstack.local', 'nayan', 'Innoraft@1234');
      $db   = mysql_select_db('Form');

      if(isset($_POST['user_fullname']) && isset($_POST['user_contact']) && isset($_POST['user_email']))
      {
      	 $fname = ($_POST["user_firstname"]);
  $lname = ($_POST["user_lastname"]);
  $phonenumber = ($_POST["user_contact"]);
  $email = ($_POST["user_email"]);
  $fullname=($_POST["user_fullname"]);
  $message=($_POST["user_message"]);
      
      if(mysql_query("INSERT INTO Information VALUES('$fname', '$lname','$fullname','$phonenumber','$email')"))
          echo "Successfully Inserted";
        else
          echo "Insertion Failed";
      }

$array_data = explode(PHP_EOL, $message);
$final_data = array();
echo "<table border=1><caption>MARKSHEET</caption><tr><th>Subject</th><th>Marks</th></tr></table>";
foreach ($array_data as $data){
    $format_data = explode('|',$data);
    $final_data[trim($format_data[0])] = trim($format_data[1]);
      if(mysql_query("INSERT INTO Marksheet VALUES('$fullname','$format_data[0]','$format_data[1]')"))
    	   echo "";
        else
          echo "Insertion Failed";
  }

?>