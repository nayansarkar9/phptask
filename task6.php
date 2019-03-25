<!DOCTYPE html>
<html>
<head>
	<title>task6</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

  <style>
  	body{
  	background-color: teal;
  }
  table{
			width: 100%;

		}
		td,th{
			width: 50%;
		}
  </style>
</head>
<body>
<?php
  
/*$conn = mysql_connect('demolempstack.local', 'nayan', 'Innoraft@1234');
      $db   = mysql_select_db('Form');*/
  	
// define variables and set to empty values
$fname = $lname = $phonenumber= $email= $fullname= "";
$emailErr="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);
  $phonenumber = test_input($_POST["phonenumber"]);
  $email = test_input($_POST["email"]);
  $fullname=test_input($_POST["fullname"]);
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  if($_POST['submit']){
  	echo "<h2>Hello</h2>";
echo "<i>$fname</i>";
echo " ";
echo "<i>$lname</i>";
echo "<br>";
  $mobile=$_POST['phonenumber'];
  if(empty($mobile)){
      echo '<script>alert("Mobile Number field Empty...!!!!!!");</script>';
    }elseif(!preg_match("/^[+][9][1][6-9]{1}\d{9}$/", $mobile)){
  
      echo '<script>alert("Invalid Indian Number");</script>';
    }else{
                      echo "Mobile Number is:-$mobile";
            }
            echo "<br>";
    	if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format:- $email";
    }
    else
    	echo "<h2> E-mail $email</h2>";
    
  }
  echo "<br>";
   /*if(mysql_query("INSERT INTO Information VALUES('$fname', '$lname','$fullname','$phonenumber','$email')"))
          echo "Successfully Inserted";
        else
          echo "Insertion Failed";*/
$text = ($_POST['txtarea']);
$array_data = explode(PHP_EOL, $text);
$final_data = array();
echo "<table border=1><caption>MARKSHEET</caption><tr><th>Subject</th><th>Marks</th></tr></table>";
foreach ($array_data as $data){
    $format_data = explode('|',$data);
    $final_data[trim($format_data[0])] = trim($format_data[1]);
    echo "<table border=1><tr><td>$format_data[0]</td><td>$format_data[1]</td></tr></table>";
    if(mysql_query("INSERT INTO Marksheet VALUES('$fullname','$format_data[0]','$format_data[1]')"))
    	   echo "";
        else
          echo "Insertion Failed";

    
          
}
echo "<br>";

  }
 

?>


<form name="Form" id="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return post();">  
  FirstName: <input type="text" name="fname" id="first" placeholder="FirstName">
  <br><br>
  LastName: <input type="text" name="lname" id="last" placeholder="LastName">
  <br><br>
  FullName: <input type="text" name="fullname" id="full" readonly="readonly" placeholder="FullName">
  <br><br>
  Contact Number<input type="text" name="phonenumber" placeholder="ContactNO." id="contact">
    <br><br>

  E-mail: <input type="text" name="email" placeholder="E-mail" id="email">
  <br><br>
<textarea cols="20" rows="10" name="txtarea" placeholder="Enter Your Subject & Marks" id="txtarea"></textarea>
<br><br>
  <input type="submit" name="submit" value="Submit">  
</form>
<p id="success_para"></p>
<script type="text/javascript">

  $(document).ready(function() {
      $('#first, #last').keyup(function(){
        var str = " ";
        $('#first, #last').each(function() {
          str += $(this).val().replace(' ', ' ')+" ";
        });
        $('#full').val(str);

    });
});

</script>
 <script type="text/javascript">
function post()

{

  var firstname = document.getElementById("first").value;
  var lastname = document.getElementById("last").value;
  var fullname = document.getElementById("full").value;
  var phnumber = document.getElementById("contact").value;


  var email = document.getElementById("email").value;

  var message = document.getElementById("txtarea").value;

  if(firstname && lastname && fullname && phnumber && email && message)

  {

    $.ajax

    ({

      type: 'post',

      url: 'post_data.php',

      data: 

      {

         user_firstname:firstname,

         user_lastname:lastname,
         user_fullname:fullname,
         user_contact:phnumber,

     user_email:email,

     user_message:message

      },

      success: function (response) 

      {

      document.getElementById("success_para").innerHTML="Form Submitted Successfully";;

  

      }

    });

  }

  

  return false;

}

</script>
</script> 
</body>
</html>