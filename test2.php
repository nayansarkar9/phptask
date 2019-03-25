<?php
error_reporting(0);
?>
<html>
<body>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="file" name="uploadfile" value=""/>
		<input type="submit" name="submit" value="upload file"/>
	</form>
</body>
</html>
<?php
$filename = $_FILES["uploadfile"]["name"];
$tempname = $_FILES["uploadfile"]["tmp_name"];
$folder = "uploads/".$filename;
move_uploaded_file($tempname,$folder);
if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
   echo "File ". $_FILES['uploadfile']['name'] ." uploaded successfully.\n";
}
echo "<img src='$folder'/>";
?>