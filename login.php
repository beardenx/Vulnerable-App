<?php
ob_start();
session_start();
include("db_config.php");
ini_set('display_errors', 1);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Login</title>

    <link href="css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">

		<div class="jumbotron">
			<h2 class="lead" style="color:white">
				Cloud Academy (CA)
			</h2>
        </div>

		<div class="response">

		<form method="POST" autocomplete="off">
      <table border="0" cellpadding="2" cellspacing="0">
        <tr>
        <td class="t-1">
        <div align="left" id="tb-name">Username :</div>
        </td>
        <td width="171">
        <input type="text" name="uid" id="uid"/>
        </td>
        </tr>
        <tr>
        <td class="t-1">
        <div align="left" id="tb-name">Password :</div>
        </td>
        <td width="171">
        <input type="text" name="password" id="password"/>
        </td>
        </tr>
      </table>
			<!-- <p style="color:black">
				Username:  <input type="text" id="uid" name="uid"><br /></br />
				Password: <input type="password" id="password" name="password">
			</p> -->
			<p>

			<input style="background:#0056A7; font-weight:bold; color: white" type="submit" value="Login"/>
      <input style="background:green;font-weight:bold; color: white" type=button onClick="location.href='register.php'" value='Register'>
			</p>
		</form>


<!-- ======== PLEASE REGISTER HERE ======== <br><br> -->

 <!-- Register -->

    <!-- <form name="reg" action="execute.php" onsubmit="return validateForm()" method="post" id="reg">

<table border="0" cellpadding="2" cellspacing="0">
<tr>
<td class="t-1">
<div align="left" id="tb-name">First&nbsp;Name:</div>
</td>
<td width="171">
<input type="text" name="fname" id="tb-box"/>
</td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">Username:</div></td>
<td><input type="text" id="tb-box" name="username" /></td>
</tr>
<td class="t-1"><div align="left" id="tb-name">Email:</div></td>
<td><input id="tb-box" type="email" name="email" /></td>
</tr>
<tr>
<td class="t-1"><div align="left" id="tb-name">Password:</div></td>
<td><input id="tb-box" type="password" name="password" /></td>
</tr>
<td class="t-1"><div align="left" id="tb-name">Security Text:</div></td>
<td><input type="text" id="tb-box" name="sectext" /></td>
</tr>


</table><br>
<div id="st"><input style="background:#0056A7; font-weight:bold; color: white" name="submit" type="submit" value="Register" id="st-btn"/></div>
</form> -->


        </div>


		<br />

      <div class="row marketing">
        <div class="col-lg-6">

<?php

if (!empty($_GET['msg'])) {
    echo "<font style=\"color:#FF0000\">Please login to continue.<br\></font\>";
}
//echo md5("pa55w0rd");

if (!empty($_REQUEST['uid'])) {


setcookie ("username",$_POST["uid"],time()+ 3600);

$username = ($_REQUEST['uid']);
$pass = $_REQUEST['password'];

$q = "SELECT * FROM users where username='".$username."' AND password = '".$pass."'" ;
//echo $q;
	if (!mysqli_query($con,$q))
	{
		die('Error: ' . mysqli_error($con));
	}

	$result = mysqli_query($con,$q);
	$row_cnt = mysqli_num_rows($result);

	if ($row_cnt > 0) {


	$row = mysqli_fetch_array($result);


	if ($row){
	//$_SESSION["id"] = $row[0];

	$_SESSION["username"] = $row[1];
	$_SESSION["name"] = $row[3];
	//ob_clean();

	header('Location:home.php');
	}

}
	else{
		echo "<font style=\"color:#FF0000\"><br \>Invalid password!</font\>";

	}
}

//}
?>
	</div>
	</div>


	</div> <!-- /container -->

</body>
</html>
