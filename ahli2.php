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
  <h3>List of Active Members, Enter your ID</h3>
  <div class="vulnerable_code_area">
<form  method="GET">
<p>
ID:
<input type="text" size="15" name="id">
<input type="submit" name="Submit" value="Cari">
</p>

<?php
include("db_config.php");
if( isset( $_REQUEST[ 'Submit' ] ) ) {
// Get input
$id = $_REQUEST[ 'id' ];

// Check database
$query  = "SELECT username FROM users WHERE id = '$id';";

if (!mysqli_query($con,$query))
{
die('Error: ' . mysqli_error($con));
}
$result = mysqli_query($con,$query );

// Get results
while( $row = mysqli_fetch_assoc( $result ) ) {
// Get values
$first = $row["username"];


// Feedback for end user
echo "<pre>ID: {$id}<br />Username: {$first}<br /></pre>";
}
}

?>
</div>

</form>
