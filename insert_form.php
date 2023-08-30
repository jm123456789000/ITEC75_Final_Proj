<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Insertion Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
<a href="user_page.php?>">Back</a>
    <center>
        <h2>Data Insertion</h2>
        <form method="post" action="insert_data.php">
            <label>Title:</label>
            <input type="text" name="title" required><br><br>

            <label>Details:</label>
            <input type="text" name="details" required><br><br>

            <label>Authors:</label>
            <input type="text" name="authors" required><br><br>

            <input type="submit" value="Insert Data">
        </form>
    </center>
</body>
</html>
