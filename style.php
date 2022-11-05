<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: #0056A7;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}
</style>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Home Page</title>

    <link href="css/htmlstyles.css" rel="stylesheet">
	</head>

  <body>
  <div class="container-narrow">

		<div class="jumbotron">
			<p class="lead" style="color:white">
				<!-- Welcome <?php //echo $_COOKIE["username"]; ?>, You are now logged in!</a> -->

        <?php
         if( isset($_COOKIE["username"]))

             if ($_COOKIE["username"] == "admin")
             {
               echo "Hello " . $_COOKIE["username"] .  " ! You are the administrator of this website <br/>" ;
             }
             else
             echo "Welcome " . $_COOKIE["username"] .  " ! You can Hack this Website <br/>" ;
         else
            echo "Sorry... Not recognized" . "<br />";
      ?>

			</p>
        </div>

        <div class="navbar">
          <a href="home.php">Home</a>
          <a href="ahli2.php">Members</a>
          <a href="nasihat.php">Comment</a>
          <a href="upload2.php">Upload</a>
          <a href="profile.php?id=<?php
          $username = $_COOKIE['username'];
          $query  =  "SELECT id  FROM users WHERE username = '$username';";
          if (!mysqli_query($con,$query))
          {
            die('Error: ' . mysqli_error($con));
          }
          $result = mysqli_query($con,$query );

          // Get results
          while( $row = mysqli_fetch_assoc( $result ) ) {
            // Get values
            $first = $row["id"];

            // Feedback for end user
            echo $first;
          }?>">My Profile</a>
          <?php
           if ($_COOKIE["username"] == "admin")
           {
             ?>
             <a href="dashboardadmin.php">Admin Dashboard</a>
            <!-- <button style="background:white"<p> <a style="float:right; text-decoration: none; font-size:18px; color:blue" href="dashboardadmin.php">Admin Dashboard</a></p></button> -->

           <?php }

           else
             echo "";

           ?>
           <a style="float:right"href="logout.php">Log Out</a>

        </div>

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
