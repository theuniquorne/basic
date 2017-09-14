<?php

  $errors = array();
  $db = mysqli_connect('localhost', 'root', 'root', 'Universe');
  if(!$db ) {
      die('Could not connect: ' . mysql_error());
   }
   echo 'Connected Sucessfully';
   mysql_close($db);

   if(isset($_POST['register'])) {
    $username = mysql_real_escape_string($db, $_POST['username']);
    $names = mysql_real_escape_string($db, $_POST['names']);
    $branch = mysql_real_escape_string($db, $_POST['branch']);
    $email = mysql_real_escape_string($db, $_POST['email']);
    $password_1 = mysql_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysql_real_escape_string($db, $_POST['password_2']);

  
    if(empty($username)) {
      array_push($errors, "Username is required");
    }
    if(empty($names) {
      array_push($errors, "Name is required");
    }
    if(empty($email)) {
      array_push($errors, "Email is required");
    }
    if(empty($branch)) {
      array_push($errors, "Branch is required");
    }
    if(empty($password_1)) {
      array_push($errors, "Password is required");
    }
    if($password_1 != $password_2) {
      array_push($errors, "Passwords do not match");
    }
    if(count($errors) == 0) {
      $password = md5($password_1);
      $sql = INSERT INTO Student(MIS, name, email, branch, rating) VALUES('$username', '$names', '$email', '$branch','0.0');
      mysqli_query($db, $sql);
      $dt = date('Y-m-d H:i:s');
      $sql = INSERT INTO Login(MIS, password, last_login) VALUES('$username', '$password', '$dt');
      mysqli_query($db, $sql);
    }
  }


 ?>
