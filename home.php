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

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Home Page</title>

    <link href="css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">

    <p>Cloud Academy (CA) was developed in October 2022. The purpose of developing this application is for "hacking" activities only. Any illegal activity will not be held responsible. </p>

    <div class="footer">
    <p><h5><a>Developed by @d4rkpack3t & @learzA</a><h5> </p>
      </div>

<!--
    <script>
    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
    </script>


	   -->


	</div> <!-- /container -->

</body>
</html>
