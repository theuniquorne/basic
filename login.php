
<!DOCTYPE html>
<html>
  <head>
    <title>User regestration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>


<?php
      require('db.php');
      session_start();
      // If form submitted, insert values into the database.
      if (isset($_POST['username'])){
              // removes backslashes
        $username = stripslashes($_REQUEST['username']);
              //escapes special characters in a string
        $username = mysqli_real_escape_string($con,$username);
        $password = stripslashes($_REQUEST['password_1']);
        $password = mysqli_real_escape_string($con,$password);
        //Checking is user existing in the database or not
              $query = "SELECT * FROM `Login` WHERE MIS='$username'
      and password='".md5($password)."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
              if($rows==1){
            $_SESSION['username'] = $username;
                  // Redirect user to index.php
            header("Location: index.php");
               }else{
        echo "<div class='form'>
      <h3>Username/password is incorrect.</h3>
      <br/>Click here to <a href='login.php'>Login</a></div>";
        }
          }else{
            echo "<div class='form'><h3>data not found </h3></div>";
          }
?>


    <div class="header">
      <h2>Login</h2>
    </div>
    <form action="" method="post">
      <div class="input-group">
        <label>MIS</label>
        <input type="number" name="username">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="Password" name="password_1">
      </div>
      <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
      </div>
      <p>
        Not yet a member? <a href="register.php">Sign up</a>
      </p>
    </form>
  </body>
<html>
