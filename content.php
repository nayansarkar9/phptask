<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style>
  .wel{
    background-color: brown;
    height: 150px;
    padding: 50px 0 0 0;
    position: relative;

  }
  .log{
    position: absolute;
    top: 0;
    right: 0;
  }
  .logout{
    font-size: 20px;
    color: darkred;
  }
  .mid{
    background-color: grey;
    padding: 10px;
  }
  .index{
    background-color: palegreen;
    padding: 50px 10px;
  }
</style>
<body>
<div class="wel">
  <div class="log">
    <a class="logout" href="logout.php">Log Out</a>
  </div>
<center><h1>Welcome <?php echo $_SESSION['username']; ?> </h1></center>

</div>
<div class="mid">
  <center><h3>Here is the index for you to access the php Task</h3></center>
</div>
<div class='index'>
  Task1-> <a href=test.php>A form with 3 input fields where the third field(fullname) is filled automatically</a><br>
  Task2-> <a href=task2.php>Accept an image from the user. Store it on the server. Display it with the full name below it.</a><br>
  Task3-> <a href=marks.php>Accept Marks from user in a manner specified. Display it in the format of a table</a><br>
  Task4-> <a href=phone_number.php>Create a textfield to accept phone number from user. The number will belong to an Indian user. So, the number should begin with +91 and not be more than 10 digits.</a><br>
  Task5-> <a href=test.php>Accept an email from user and validate it</a><br>
  Task6-> <a href=test.php>Create a form with all the above functionalities . On Submit the data should be submitted and stored in server without page refresh</a><br>
  Task7-> <a href=test.php>When user submit the above form, 2 copies of the data will get created in a doc format. One will store on the server and the other will be downloaded to the user submitting the data. The information in the doc should be presented in a well defined manner.</a><br>
  Task8 -> <a href=gihubapi.php>Create a gist in github using github Api</a><br>
  Task9 -> <a href=ApiTask2.php>Using github Api fetch the most starred repositories in descending order. Create button which when clicked will show all the contributors of that page</a>


</div>

</body>
</html>
