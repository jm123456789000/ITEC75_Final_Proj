<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<?php
if (isset($_COOKIE['name'])) {
    $user = $_COOKIE['name'];

    echo "<h1 class='text-center'>Welcome $user</h1>";
}


?>
<a href="login_form.php" class="btn">logout</a>
   <!DOCTYPE html>
<html lang="en">
<head>
    <script>
    window.history.forward();
    function noBack() { window.history.forward(); }
</script>
    <title>Welcome <?php $user ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>
     <!-- Search Data Form -->
     <center>
   
        <h2>Welcome <?php $user ?> </h2>
        <form method="get" action="search_data.php">
            <label>Search by Title:</label>
            <input type="text" name="search_title">
            <input type="submit" value="Search">
        </form>
    </center>
    <center>
        <p><p>
        
        <table border="50">
            <tr>
                <th>TITLE</th>
                <th>VIEW</th>
            </tr>

            <?php
            include "conn.php";

            // Fetch data from the 'data' table
            $sql = "SELECT * FROM data";
            $result = $con->query($sql);

            // Check if the query was successful and there are rows in the result
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $title = $row["title"];
                    $details = $row["details"];
                    $authors = $row["authors"];
            ?>


                    <tr>
                        <td><?php echo $title; ?></td>
                        <td><a href="vieww_data.php?title=<?php echo urlencode($title); ?>">View</a></td>
                    </tr>

            <?php
                }
            } else {
                echo "<tr><td colspan='2'>0 results!!</td></tr>";
            }
            $con->close();
            ?>

        </table>
    </center>
<p><p>



   <center>
   <div class="button-container">
        <a href="registerr.php" class="button">Register</a>
    </div>
        </center>
</body>
</html>

      
   </div>

</div>

</body>
</html>