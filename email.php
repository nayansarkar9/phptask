<?php
$email ="";
$emailErr ="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["email"])) {
    $emailErr = "*Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format:- $email";
    }
    else
    	echo "<h2> Valid email $email</h2>";
    
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Validation</title>
</head>
<body>
	<h1>Email-Validation</h1>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
E-mail: <input type="text" name="email">
  <span class="error"> <?php echo $emailErr;?></span>
<input type="submit" name="submit">
</form>
</body>
</html>