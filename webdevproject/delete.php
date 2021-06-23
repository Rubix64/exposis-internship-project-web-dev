<?php
session_start();
require_once "blogconfig.php";
if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $id=$_POST['delete'];
        $query="DELETE FROM blogpost WHERE id=$id;";
        // mysqli_error($link);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete</title>
</head>
<body>
 <?php
 if($_SERVER["REQUEST_METHOD"]=="POST")
 {
  echo "<script>alert('Do you wish to delete the article?')</script>";
  mysqli_query($link, $query);
}
 mysqli_close($link);
 header("location: myarticles.php");
 ?>   
</body>
</html>