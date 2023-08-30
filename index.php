<?php
require 'config.php';

if (!empty($_SESSION["admin_id"])) {
  header("Location: index.php");
}

if (isset($_POST["submita"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];

  // Hash the password before storing it
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $duplicate = mysqli_query($conn, "SELECT * FROM super_admin WHERE email = '$email'");

  if ($duplicate) {
    if (mysqli_num_rows($duplicate) > 0) {
      echo "<script> alert('Email Has Already Been Taken'); </script>";
    } else {
      // Insert the user's information along with the hashed password
      $insertQuery = "INSERT INTO super_admin (email, password) VALUES ('$email', '$hashedPassword')";
      $insertResult = mysqli_query($conn, $insertQuery);

      if ($insertResult) {
        echo "<script> alert('Registration Successful'); </script>";
        header("Location: login.php"); // Redirect to the login page
      } else {
        echo "<script> alert('Error registering user: " . mysqli_error($conn) . "'); </script>";
      }
    }
  } else {
    // Handle query execution error
    echo "<script> alert('Error executing query: " . mysqli_error($conn) . "'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
      background-image: url('reg.png');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-position: center center;
      background-size: 10% 10%;
    }

    h2 {
      color: #333;
      text-align: center;
    }

    .icon {
      display: flex;
      justify-content: center;
    }

    .icon img {
      width: 100px;
      height: 100px;
    }

    form {
      max-width: 300px;
      margin: 0 auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    }

    a {
      display: block;
      text-align: center;
      margin-top: 10px;
      color: #333;
      text-decoration: none;
    }
  </style>
</head>

<body>

  
 
  <h2>SUPERMAN ADMIN</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required value="">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required value="">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required value="">
    <label for="confirmpassword">Confirm Password:</label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value="">
    <center><button type="submit" name="submit">Register</button></center>
  </form>
  <br>
  <a href="login.php">Login</a>
</body>

</html>