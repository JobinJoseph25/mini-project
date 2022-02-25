<?php

 include("connect.php");


$query = "select * FROM registration where usertype=1";
 $result = $con->query($query);
 $rowcount = mysqli_num_rows( $result );
    $total = $rowcount;

$q2 = "select * FROM registration where usertype=2";
 $r2 = $con->query($q2);
 $ro2 = mysqli_num_rows( $r2 );
    $total2 = $ro2;

    $q3 = "select * FROM tbladdvehicle";
 $r3 = $con->query($q3);
 $ro3 = mysqli_num_rows( $r3 );
    $total3 = $ro3;


    $q4 = "select * FROM registration where status=1";
 $r4 = $con->query($q4);
 $ro4 = mysqli_num_rows( $r4);
    $total4 = $ro4;
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


   body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
   }
   * {
      box-sizing: border-box;
   }
   .card {
      color: white;
      float: left;
      width: calc(25% - 20px);
      padding: 10px;
      border-radius: 10px;
      margin: 10px;
      height: 200px;
   }
   .card p {
      font-size: 18px;
   }
   .cardContainer:after {
      content: "";
      display: table;
      clear: both;
   }
   @media screen and (max-width: 600px) {
      .card {
         width: 100%;
      }
   }
.sidenav {
  height: 100%;
  width: 200px;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  padding-top: 20px;
}

.sidenav a {
  padding: 6px 6px 6px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;

}

.sidenav a:hover {
  color: #f1f1f1;
}

.main {
  margin-left: 200px; /* Same as the width of the sidenav */

}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body style="background-color:#645670">

<div class="sidenav" >
  <a href="#">Dashboard</a>
  <a href="users.php">Users</a>
  <a href="#">About</a>
  <a href="#">Logout</a>
</div>

<div class="main" >
 
<h1 style="color: yellow;">Vehicle Sharing Service</h1>
<h2 style="color: yellow;">Welcome Back Keep share on your daily Rides</h2>
<div class="cardContainer">
<div class="card" style="background-color:rgb(153, 29, 224);">
<h2><center>Vechile Owners</center></h2>
<p><center><?php echo $total; ?></center></p>
</div>
<div class="card" style="background-color:rgb(12, 126, 120);">
<h2><center>Passengers</center></h2>
<p><center><?php echo $total2; ?></center></p>
</div>
<div class="card" style="background-color:rgb(207, 41, 91);">
<h2><center>Total Vehicles</center></h2>
<p><center><?php echo $total3; ?></center></p>
</div>
<div class="card" style="background-color:rgb(204, 91, 39);">
<h2>Blocked Users</h2>
<p><center><?php echo $total4; ?></center></p>
</div>
</div>
</div>
   
</body>
</html> 
