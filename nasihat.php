<?php
ob_start();
session_start();
include("db_config.php");
include("style.php");
if (!$_SESSION["username"]){
header('Location:login.php?msg=1');
}
ini_set('display_errors', 1);
?>

<!-- <span onclick="this.parentElement.style.display='none'" class="topright">&times</span> -->
<form name="XSS" action="nasihat.php" method="POST">
<p>
  <h3>Comment For improvement ?</h3>
  <input type="text" name="comment">
  <input type="submit" value="Submit">
</p>

<?php
header ("X-XSS-Protection: 0");
// Is there any input?
if (!empty($_REQUEST['comment'])) {
    // Feedback for end user

    $comment=$_POST['comment'];
    $username=$_COOKIE['username'];

    if(mysqli_query($con,"INSERT INTO comment(comment, sender_name)VALUES('$comment', '$username')")){
    header("location: nasihat.php?remarks=submited");
    echo "Thank you for your comment. We appreciate all your ";
    }else{
     $e=mysqli_error($con);
    header("location: nasihat.php?remarks=error");
    }

}
?>
</form>
