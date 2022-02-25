<?php

 include("connect.php");

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


   body {
      font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
       background: linear-gradient(45deg, #49a09d, #5f2c82);

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

html,
body {
  height: 100%;
}

body {
  margin: 0;
  background: linear-gradient(45deg, #49a09d, #5f2c82);
  font-family: sans-serif;
  font-weight: 100;
}

.container {
  position: absolute;
  top: 35%;
  left: 50%;
  transform: translate(-50%, -50%);
}

table {
  width: 800px;
  border-collapse: collapse;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0,0,0,0.1);
}

th,
td {
  padding: 15px;
  background-color: rgba(255,255,255,0.2);
  color: #fff;
}

th {
  text-align: left;
}

thead {
  th {
    background-color: #55608f;
  }
}

tbody {
  tr {
    &:hover {
      background-color: rgba(255,255,255,0.3);
    }
  }
  td {
    position: relative;
    &:hover {
      &:before {
        content: "";
        position: absolute;
        left: 0;
        right: 0;
        top: -9999px;
        bottom: -9999px;
        background-color: rgba(255,255,255,0.2);
        z-index: -1;
      }
    }
  }
}

.button {
  background-color: #f44336; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;


}
</style>
</head>
<body style="background: linear-gradient(45deg, #49a09d, #5f2c82);">

<div class="sidenav" >
  <a href="index.php">Dashboard</a>
  <a href="users.php">Users</a>
  <a href="#">About</a>
  <a href="#">Logout</a>
</div>

<div class="main" >
 
<h1 style="color: yellow;">Registered users</h1>

<?php

// Attempt select query execution
$sql = "SELECT * FROM registration";
if($result = mysqli_query($con, $sql)){
    if(mysqli_num_rows($result) > 0){
      ?><div>

        <?php
        echo "<table>";
         ?>

          <?php
            echo "<thead><tr>";
                echo "<th>userid</th>";
                echo "<th>fullname</th>";
                echo "<th>username</th>";
                echo "<th>email</th>";
                echo "<th>phonno</th>";
                echo "<th>place</th>";
                echo "<th>state</th>";
                echo "<th>pin</th>";


                echo "<th>dob</th>";
                echo "<th>usertype</th>";
                echo "<th>adhar</th>";
                echo "<th>gender</th>";
                 echo "<th>Status</th>";
                 echo "<th></th>";
            echo "</tr></thead>";
             
        while($row = mysqli_fetch_array($result)){

            echo "<tbody><tr>";
           
                echo "<td>" . $row['userid'] . "</td>";
                echo "<td>" . $row['fullname'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phonno'] . "</td>";
                echo "<td>" . $row['place'] . "</td>";
                echo "<td>" . $row['state'] . "</td>";
                echo "<td>" . $row['pin'] . "</td>";

                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['usertype'] . "</td>";
                echo "<td>" . $row['adhar'] . "</td>";
                echo "<td>" . $row['gender'] . "</td>";
                 echo "<td>" . $row['status'] . "</td>";
                ?>
                
                <?php

 include("connect.php");
$g=$row["userid"];
  
  $q6="select status from registration where userid='$g'";
  $r6 = $con->query($q6);
  if ($r6->num_rows > 0) {
      while($ro6 = $r6->fetch_assoc()) {
      $status=$ro6["status"];
     if($status==0)
     {
      $a="Block";
     }
      else if($status==1)
     {
      $a="Unblock";
     }
    }
    
} else {
    echo "0 results";
}  
?>   <form name = "myForm" action="users.php" method="POST" enctype="multipart/form-data">             
<input type="hidden" name="ui" value="<?php echo $row["userid"]; ?>">
                <td><input class="button" type="submit" name="<?php echo $a; ?>" value="<?php echo $a; ?>"></td>
              </form>
                <?php
            echo "</tr>

            </tbody>";
        }
        echo "</table></div>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>
</div>
   
</body>
</html> 

<?php
 include("connect.php");

  if(isset($_POST["Block"])){

      $st=$_POST["ui"];
     
    $sl="update registration set status=1 where userid='$st'";

  if(mysqli_query($con,$sl))
  {
   echo("<meta http-equiv='refresh' content='1'>"); 
  }
else
{
  echo "error";
}

      mysqli_close($con);

      
  
  }
?>
<?php
 include("connect.php");

  if(isset($_POST["Unblock"])){

      $sv=$_POST["ui"];
     
    $sm="update registration set status=0 where userid='$sv'";

  if(mysqli_query($con,$sm))
  {
 echo("<meta http-equiv='refresh' content='1'>"); 
  }
else
{
  echo "error";
}

      mysqli_close($con);

      
  
  }
?>

