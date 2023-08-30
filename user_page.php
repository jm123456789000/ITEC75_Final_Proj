<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
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
    <title>Data List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>
<body>

     <!-- Search Data Form -->
     <center>
   
        <h1>USER <?php $user ?></h1>
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
                <th>PDF</th>
                <th>UPDATE</th>
                <th>DELETE</th>
                
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
                        <td><a href="update.php" class="btn">Update</a></td>
                    
                        <td><a href="delete.php" class="btn">Delete</a></td>
                        
                        
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='2'>0 results!!</td></tr>";
            }
            $con->close();
            ?>

        </table>
        <center>
        <div class="button-container">
        <a href="insert_form.php" class="button">Add data</a>
    </div>
              
        </center>
       
    </center>
<p><p>


   
   
</body>
</html>

      
   </div>

</div>

</body>
</html>