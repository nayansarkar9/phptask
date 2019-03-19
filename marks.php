
<!DOCTYPE html>
<html>
<head>
	<title>Subjects and marks</title>
	<style>
		table{
			width: 100%;

		}
		td,th{
			width: 50%;
		}
	</style>
</head>

<body>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<textarea cols="20" rows="10" name="txtarea"></textarea>
	<input type="submit" name="submit" value="submit">
</form>
<?php
if($_POST['submit']){
$text = ($_POST['txtarea']);
$array_data = explode(PHP_EOL, $text);
$final_data = array();
echo "<table border=1><caption>MARKSHEET</caption><tr><th>Subject</th><th>Marks</th></tr></table>";
foreach ($array_data as $data){
    $format_data = explode('|',$data);
    $final_data[trim($format_data[0])] = trim($format_data[1]);
    echo "<table border=1><tr><td>$format_data[0]</td><td>$format_data[1]</td></tr></table>";
}
}
?>
</body>
</html>