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

<div class="container">
<div id="user-profile-2" class="user-profile">
    <div class="tabbable">


      <div class="tab-content no-border padding-24">
        <div id="home" class="tab-pane in active">
          <div class="row">
            <div class="col-xs-12 col-sm-3 center">


              <div class="space space-4"></div>



            </div><!-- /.col -->

            <div class="col-xs-12 col-sm-9">
              <h4>
                <?php echo "Welcome " . $_COOKIE["username"] .  " <br/>"; ?>
              </h4>

              <div class="profile-user-info">
                  <div class="profile-info-name"> ID Number : <?php
                  echo $_GET['id']; ?>
                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Email :                     <?php
                                      $id = $_GET['id'];
                                      $username = $_COOKIE['username'];
                                      $query  =  "SELECT email  FROM users WHERE id = '$id';";
                                      if (!mysqli_query($con,$query))
                                      {
                                        die('Error: ' . mysqli_error($con));
                                      }
                                      $result = mysqli_query($con,$query );

                                      // Get results
                                      while( $row = mysqli_fetch_assoc( $result ) ) {
                                        // Get values
                                        $first = $row["email"];

                                        // Feedback for end user
                                        echo "{$first}<br/>";
                                      }?>
                                    </div>

                </div>

                <div class="profile-info-row">
                  <div class="profile-info-name"> Security Text :

                    <?php
                    $id = $_GET['id'];
                    $username = $_COOKIE['username'];
                    $query  =  "SELECT sectext  FROM users WHERE id = '$id';";
                    if (!mysqli_query($con,$query))
                    {
                      die('Error: ' . mysqli_error($con));
                    }
                    $result = mysqli_query($con,$query );

                    // Get results
                    while( $row = mysqli_fetch_assoc( $result ) ) {
                      // Get values
                      $first = $row["sectext"];

                      // Feedback for end user
                      echo "{$first}<br/>";
                    }?>
                  </div>



                  <h4>Change Password</h4>
                  <div><?php if(isset($message)) { echo $message; } ?></div>
                  <form method="post" action="">
                    Current Password:<br>
                    <input type="password" name="currentPassword"><span id="currentPassword" class="required"></span>
                    <br>
                    New Password:<br>
                    <input type="password" name="newPassword"><span id="newPassword" class="required"></span>
                    <br>
                    Confirm Password:<br>
                    <input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
                    <br><br>
                    <input type="submit">

                    <?php

$username = $_COOKIE['username'];/* userid of the user */
if(count($_POST)>0) {
$result = mysqli_query($con,"SELECT * from users WHERE username='" . $username . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"] && $_POST["newPassword"] == $row["confirmPassword"] ) {
mysqli_query($con,"UPDATE users set password='" . $_POST["newPassword"] . "' WHERE username='" . $id . "'");
$message = "Password Changed Sucessfully";
} else{
 $message = "Password is not correct";
}
}
?>


                  </form>
                  <form name="reg" action="execute.php" onsubmit="return validateForm()" method="post" id="reg">
                  <table border="0" cellpadding="2" cellspacing="0">

                  <tr>
                  <td class="t-1"><div align="left" id="tb-name">current Password:</div></td>
                  <td><input type="password" name="currentPassword"><span id="currentPassword" class="required"></td>
                  </tr>
                  <tr>
                  <td class="t-1"><div align="left" id="tb-name">New Password:</div></td>
                  <td><input type="password" name="newPassword"><span id="newPassword" class="required"></td>
                  </tr>
                  <tr>
                  <td class="t-1"><div align="left" id="tb-name">Confirm Password:</div></td>
                  <td><input type="password" name="confirmPassword"><span id="confirmPassword" class="required"></td>
                  </tr>

                  </table><br>
                  <input style="background:green;font-weight:bold; color: white" type=button onClick="location.href='profile.php'" value='Change Password'>
                  <!-- <div id="st"><input style="background:#0056A7; font-weight:bold; color: white" name="submit" type="submit" value="Register" id="st-btn"/></div> -->
                  </form>
                  <br>
                  <br>
                </div>
              </div>

              <div class="hr hr-8 dotted"></div>

          </div><!-- /.row -->

          <div class="space-20"></div>

          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="widget-box transparent">
                <div class="widget-header widget-header-small">

                </div>


              </div>
            </div>
          </div>
        </div><!-- /#home -->




      </div>
    </div>
  </div>
  </div>
