<?php 
 require_once("conn.php");
 
    $title = $_GET['title'];

    $sql = "SELECT * FROM `data` WHERE `title` = '".$title."'";

 $result = mysqli_query($con,$sql);

 while($row = $result-> fetch_assoc())
 {
   $title = $row['title'];
   $details = $row['details'];
   $authors = $row['authors'];
  }

?>

<!DOCTYPE>
<html lang="en" dir="ltr">
 <head>

   <meta charset="utf-8">
    <title>Update Data</title>
  </head>
 <body>
    <center>
        <br>
        <h1>UPDATE DATA</h1>
        <form method="post">
        <input type="text" name="title" value="<?php echo  $title ?>" required>
             <br><br>
         <input type="text" name="details" value="<?php echo  $details ?>" required>
             <br><br>
         <input type="text" name="authors" value="<?php echo  $authors ?>" required>
             <br><br>
             <button name="update">UPDATE DATA</button>
             
            </form>
    </center>
 </body>
  </html>

  <?php 

if (isset($_POST['update'])) {
  $title = $_POST['title'];
  $details = $_POST['details'];
  $authors = $_POST['author'];
  $sql = "UPDATE `data` SET `title`='$title', `details`='$details', `authors`='$authors' WHERE `id`='$id'";
  $result = mysqli_query($con, $sql);

  if ($result2) {  // Corrected variable name
      header("location: vieww_data.php");
  } else {
      echo 'please check query';
  }
}
  
  ?>