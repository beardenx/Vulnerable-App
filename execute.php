<?php
session_start();
include('db_config.php');
$username=$_POST['username'];
$result = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
$num_rows = mysqli_num_rows($result);
if ($num_rows) {
 header("location: login.php?remarks=failed");
}else {
 $fname=$_POST['fname'];
 $username=$_POST['username'];
 $password=$_POST['password'];
 $email=$_POST['email'];
 $sectext=$_POST['sectext'];
 if(mysqli_query($con,"INSERT INTO users(fname, username, password, email, sectext )VALUES('$fname', '$username', '$password', '$email', '$sectext')")){
 header("location: register.php?remarks=success");
 }else{
  $e=mysqli_error($con);
 header("location: register.php?remarks=error");
 }
}
?>
