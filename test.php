
<!DOCTYPE HTML>  
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>  

<?php
// define variables and set to empty values
$fname = $lname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fname = test_input($_POST["fname"]);
  $lname = test_input($_POST["lname"]);

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<form name="Form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  FirstName: <input type="text" name="fname" id="first">
  <br><br>
  LastName: <input type="text" name="lname" id="last">
  <br><br>
  FullName: <input type="text" name="fullname" id="full" readonly="readonly">
  <br><br>

  <input type="submit" name="submit" value="Submit">  
</form>
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
<?php
if($_POST['submit']){
echo "<h2>Hello</h2>";
echo $fname;
echo " ";
echo $lname;
echo "<br>";
}
?>

</body>
</html>
