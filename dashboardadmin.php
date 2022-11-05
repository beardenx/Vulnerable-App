<style>
/* Popup container - can be anything you want */
.popup {
  position: relative;
  display: inline-block;
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* The actual popup */
.popup .popuptext {
  visibility: hidden;
  width: 160px;
  background-color: #555;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 8px 0;
  position: absolute;
  z-index: 1;
  bottom: 125%;
  left: 50%;
  margin-left: -80px;
}

/* Popup arrow */
.popup .popuptext::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: #555 transparent transparent transparent;
}

/* Toggle this class - hide and show the popup */
.popup .show {
  visibility: visible;
  -webkit-animation: fadeIn 1s;
  animation: fadeIn 1s;
}

/* Add animation (fade in the popup) */
@-webkit-keyframes fadeIn {
  from {opacity: 0;}
  to {opacity: 1;}
}

@keyframes fadeIn {
  from {opacity: 0;}
  to {opacity:1 ;}
}
</style>

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
<br>
<div class="profile-info-name"> Comment: </div>
======== <br><br>
<div class="profile-info-value">
<?php
echo "<table>";
$query="select * from comment order by id";
if (!mysqli_query($con,$query))
{
  die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$query );
while( $row = mysqli_fetch_assoc( $result ) ) {
  // Get values
  $first = $row["sender_name"];
  $second = $row["comment"];
  $third = $row["id"];

  echo "Comment from ", $first," : ",$second, "&nbsp", "&nbsp", "&nbsp", "&nbsp";
  echo '<button <p> <a style="float:right;text-decoration:none;color:red" href="deletecomment.php?id=',$third,'">Delete</a></p></button><br>';}



echo "</table>";
// $id = $_GET['id'];
// $username = $_COOKIE['username'];
// $query  =  "SELECT sectext  FROM users WHERE id = '$id';";
// if (!mysqli_query($con,$query))
// {
//   die('Error: ' . mysqli_error($con));
// }
// $result = mysqli_query($con,$query );
//
// // Get results
// while( $row = mysqli_fetch_assoc( $result ) ) {
//   // Get values
//   $first = $row["sectext"];
//
//   // Feedback for end user
//   echo "{$first}<br/>";
?>
<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
