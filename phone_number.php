<?php
if(isset($_POST['submit'])){
    $mobile=$_POST['phonenumber'];
  if(empty($mobile)){
      echo '<script>alert("Mobile Number field Empty...!!!!!!");</script>';
    }elseif(!preg_match("/^[+][9][1][6-9]{1}\d{9}$/", $mobile)){
  
      echo '<script>alert("Invalid Indian Number. The number should start with +91 and should be a 10 digit number");</script>';
    }else{
                      echo "<center><h2>Mobile Number is valid:-$mobile</h2></center>";
            }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>PhoneNumber</title>
</head>
<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<div>Enter your phone number</div>
	<input type="text" name="phonenumber">
	<input type="submit" name="submit">
	
</form>
</body>
</html>