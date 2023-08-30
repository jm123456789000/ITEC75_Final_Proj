<!DOCTYPE html>
<html lang="en">
<head>
    <title>Data Search</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <center>
        <h2>Data Search</h2>
        <form method="get" action="index.php">
            <label>Search by Title:</label>
            <input type="text" name="search_title">
            <input type="submit" value="Search">
        </form>

        <br>

        <?php
        if (isset($_GET['search_title'])) {
            // Include the connection file
            include "conn.php";

            // Retrieve the search criteria from the form
            $search_title = $_GET['search_title'];

            // Add validation and data sanitization if required

            // Fetch data from the 'data' table based on the search criteria
            $sql = "SELECT * FROM data WHERE title LIKE ?";
            $stmt = $con->prepare($sql);
            $search_title = '%' . $search_title . '%'; // Add wildcards for partial search
            $stmt->bind_param("s", $search_title);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Display the search results
                echo "<table border='1'>";
                echo "<tr><th>Title</th><th>Details</th><th>Authors</th><th>View</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['title'] . "</td><td>" . $row['details'] . "</td><td>" . $row['authors'] . "</td><td><a href='view_data.php?title=" . urlencode($row['title']) . "'>View</a></td></tr>";
                }
                echo "</table>";
            } else {
                // No results found
                echo "No results found!";
            }

            // Close the database connection
            $stmt->close();
            $con->close();
        }
        ?>
    </center>
</body>
</html>
