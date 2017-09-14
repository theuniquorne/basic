
<!DOCTYPE html>
<html>
  <head>
    <title>User registration</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
  <?php
      require('db.php');
      // If form submitted, insert values into the database.
      if (isset($_REQUEST['username'])){

          $name = stripslashes($_REQUEST['names']);
      $name = mysqli_real_escape_string($con,$name);

            // removes backslashes
      $username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
      $username = mysqli_real_escape_string($con,$username); 

      $email = stripslashes($_REQUEST['email']);
      $email = mysqli_real_escape_string($con,$email);

      $branch = stripslashes($_REQUEST['branch']);
      $branch = mysqli_real_escape_string($con,$branch);

      $password1 = stripslashes($_REQUEST['password_1']);
      $password1 = mysqli_real_escape_string($con,$password1);

      $password2 = stripslashes($_REQUEST['password_2']);
      $password2 = mysqli_real_escape_string($con,$password2);


      $login_date = date("Y-m-d H:i:s");

 
            $query = "INSERT into Student (MIS, name, email, branch, rating) VALUES('$username', '$name', '$email', '$branch','0.0')";

            
            $result = mysqli_query($con,$query);
            $query = "INSERT into Login (MIS,password,last_login) VALUES('$username', '".md5($password1)."', '$login_date')";
            $result = mysqli_query($con,$query);
            if($result){
                echo "<div class='form'>
      <h3>You are registered successfully.</h3>
      <br/>Click here to <a href='login.php'>Login</a></div>";
            }
        }

        else{

        }
?>
    <div class="header">
      <h2>Register</h2>
    </div>

    <form action="" method="post">
     
      <div class="input-group">
        <label>MIS</label>
        <input type="number" name="username">
      </div>
      <div class="input-group">
        <label>Name</label>
        <input type="text" name="names" >
      </div>
      <div class="input-group">
        <label>Branch</label>
        <input type="text" name="branch" >
      </div>
      <div class="input-group">
        <label>Email</label>
        <input type="text" name="email">
      </div>
      <div class="input-group">
        <label>Password</label>
        <input type="Password" name="password_1">
      </div>
      <div class="input-group">
        <label>Confirm Password</label>
        <input type="Password" name="password_2">
      </div>
      <div class="input-group">
        <button type="submit" name="register" class="btn">Register</button>
      </div>
      <p>
        Already a member? <a href="login.php">Sign in</a>
      </p>
    </form>
  </body>
<html>
