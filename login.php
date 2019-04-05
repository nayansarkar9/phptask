<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <title>LoginForm</title>
</head>
<style>
  .no{
    background-color: #ff8080;
    color: red;
  }
  .yes{
    background-color: #99ff66;
  }
  .d1{
    background-color: khaki;
    color: goldenrod;
  }
  .d2{
    background-color: cadetblue;

  }
</style>
<body>
  <center><h1>Welcome</h1></center>
  <div class="container">
    <div class="row">
      <div class="col-md-6 d1">
        <h2>Login</h2>
        <form method="post" action="verify.php">
          UserName <input type="text" name="user" class="form-control"><br><br>
          Password <input type="password" name="password" class="form-control"><br>
          <input type="submit" name="submit" Value="Login">
          <span>New User? SignUp</span>
          <?php
          if($_GET['invalid']==true){

            ?>
          <div class="no"><?php echo $_GET['invalid']?></div>
          <?php

          }
          ?>
        </form>
      </div>

      <div class="col-md-6 d2">
        <h2>SignUp</h2>
        <form method="post" action="register.php">
          UserName <input type="text" name="user" class="form-control"><br><br>
          Password <input type="password" name="password" class="form-control"><br>
          <input type="submit" name="submit" Value="SignUp">
          <span>Already a user? Just Login</span>
          <?php
          if($_GET['already']==true){

            ?>
          <div class="no"><?php echo $_GET['already']?></div>
          <?php

          }
          ?>
          <?php
          if($_GET['signed']==true){

            ?>
          <div class="yes"><?php echo $_GET['signed']?></div>
          <?php

          }
          ?>
          <?php
          if($_GET['empty']==true){

            ?>
          <div class="no"><?php echo $_GET['empty']?></div>
          <?php

          }
          ?>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
