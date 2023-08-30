<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            text-align: center;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        .button-container {
            margin-top: 20px;
        }

        .button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            margin-right: 10px;
        }

        .button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <h1>Login as:</h1>
    <div class="button-container">
        <a href="superadmin_login.php" class="button">Log in as Super Admin</a>
        <a href="login_form.php" class="button">Log in as Admin/User</a>
    </div>
</body>
</html>
