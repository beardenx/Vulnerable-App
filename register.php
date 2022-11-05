<?php
ob_start();
session_start();
include("db_config.php");
ini_set('display_errors', 1);
?>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Register</title>

    <link href="css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">

		<div class="jumbotron">
			<h2 class="lead" style="color:white">
				Cloud Academy (CA)
			</h2>
        </div>

        <form name="reg" action="execute.php" onsubmit="return validateForm()" method="post" id="reg">

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
    <input style="background:green;font-weight:bold; color: white" type=button onClick="location.href='login.php'" value='Back to Login'>
    <input style="background:#0056A7;font-weight:bold; color: white" name="submit" type="submit" value="Register" type=button onClick="location.href='register.php'" value='Register'>
    <!-- <div id="st"><input style="background:#0056A7; font-weight:bold; color: white" name="submit" type="submit" value="Register" id="st-btn"/></div> -->
    </form>
