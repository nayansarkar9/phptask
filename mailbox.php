<!DOCTYPE html>
<html>
<head>
	<title>mailboxapi</title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		E-Mail<input type="email" name="email" placeholder="email">
		<input type="submit" name="submit" value="submit">
	</form>
<?php
if(isset($_POST['submit'])){
// set API Access Key
$access_key = '5c792cb6d5b4f86ec09fc20a8b1a5b91';
 
// set email address
$email_address = $_POST['email'];

 
// Initialize CURL:
$ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
curl_close($ch);
 
// Decode JSON response:
$validationResult = json_decode($json, true);
echo "<pre>";print_r($validationResult);echo "</pre>";
 
if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
    echo "Email is valid";
}
else{
	echo "Email is invalid";
}
}
?>
</body>
</html>
