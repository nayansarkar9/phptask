<?php
include "credentials.php";
$conn = mysql_connect($server, $username, $password);
      $db   = mysql_select_db('Form');




  $fname = ($_POST["user_firstname"]);
  $lname = ($_POST["user_lastname"]);
  $phonenumber = ($_POST["user_contact"]);
  $email = ($_POST["user_email"]);
  $fullname=($_POST["user_fullname"]);
  $message=($_POST["user_message"]);
    
$bool1 = $bool2 = false;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      
      
    }
    else{

   		      $bool1 = true;
	}
	if(!preg_match("/^[+][9][1][6-9]{1}\d{9}$/", $phonenumber)){
  
      
    }
    else{
                      $bool2=true;
            }
	if($bool1 && $bool2){

		$response=1;
		echo (json_encode($response));
		mysql_query("INSERT INTO Information VALUES('$fname', '$lname','$fullname','$phonenumber','$email')");
        $array_data = explode(PHP_EOL, $message);
$final_data = array();
foreach ($array_data as $data){
    $format_data = explode('|',$data);
    $final_data[trim($format_data[0])] = trim($format_data[1]);
      mysql_query("INSERT INTO Marksheet VALUES('$fullname','$format_data[0]','$format_data[1]')");
    	  
        
   		}
   	}
   			else
   			{
   				$response=0;
   				echo (json_encode($response));
   			}
