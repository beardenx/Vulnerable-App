<?php
ob_start();
session_start();
include("db_config.php");
include("style.php");
if (!$_SESSION["username"]){
header('Location:login.php?msg=1');
}
ini_set('display_errors', 1);


$query = "DELETE FROM comment WHERE id = '".$_GET['id']."'";


if (!mysqli_query($con,$query))
{
  die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$query );

  echo "This comment has been deleted   ";
  echo '<button <p> <a style="float:right;text-decoration:none" href="dashboardadmin.php">Back</a></p></button><br>';


?>
