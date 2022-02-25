<?php
session_start();
?>
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!--------- <title>Responsive Navigation Menu</title>------>
    <link rel="stylesheet" href="stylenav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>
  <body>
    <nav>
      <div class="logo">Vehicle Sharing Service</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href="home.php">Home</a></li>
        <li><a href="usertrack.php">Track</a></li>
        <li><a href="userprofile.php">Profile</a></li>
        <li><a href="#">About</a></li>
        <li><a href="logout.php">Logout</a></li>
         <li><img src="propic/<?php echo  $_SESSION['prof']; ?>" style="height:50px"></li>
         <li><h3><b style="color: #F8FF13;"><?php echo $_SESSION['nnm']; ?></b></h3></li>
      </ul>
    </nav>

  </body>
</html>
