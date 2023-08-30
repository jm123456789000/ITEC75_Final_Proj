<?php




require 'config.php';

if (!empty($_SESSION["admin_id"])) {
  header("Location: index.php");
}

if (isset($_POST["submit"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  

  // Trim whitespace from entered password
  $enteredPassword = trim($password);

  $result = mysqli_query($conn, "SELECT * FROM super_admin WHERE email = '$email'");
  $row = mysqli_fetch_assoc($result);

  if (mysqli_num_rows($result) > 0) {
    // Debugging: Display entered and stored hashed passwords
    echo "Entered Password: $enteredPassword<br>";
    echo "Stored Hashed Password: " . $row['password'] . "<br>";

    // Get the hashed password from the database
    $storedHashedPassword = $row['password'];

    if (password_verify($enteredPassword, $storedHashedPassword)) {
      // Password verification successful
      $_SESSION["login"] = true;
      $_SESSION["admin_id"] = $row["admin_id"];
      header("Location: SA_page.php");
    } else {
      // Password verification failed
      echo "Password verification result: " . (password_verify($enteredPassword, $storedHashedPassword) ? "true" : "false") . "<br>";
      echo "<script> alert('Wrong Password'); </script>";
    }
  } else {
    echo "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <title>Login</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f1f1f1;
    }

    h2 {
      color: #333;
      text-align: center;
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
  </script>
</head>
<body>
  <h2>Login</h2>
  <form class="" action="" method="post" autocomplete="off">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required value="">
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required value="">
    <center>
    <button type="submit" name="submit">Login</button>
    </center>
  </form>
  <br>
  <a href="SA_page.php">Registration</a>
</body>
</html>
