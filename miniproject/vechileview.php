<?php
include 'nav.php';
$userid=$_SESSION['uid'];
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Style the buttons */
.btn {
  border: none;
  outline: none;
  padding: 12px 16px;
  background-color: #f1f1f1;
  cursor: pointer;
}

.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: white;
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
h3{
  color: white;
}


</style>
</head>
<body style=" background:url('http://clevertechie.com/img/bnet-bg.jpg') #0f2439 no-repeat center top;">

<h2>Search Result</h2>


<div id="btnContainer">
  <button class="btn" onclick="listView()"><i class="fa fa-bars"></i> List</button> 
  <button class="btn active" onclick="gridView()"><i class="fa fa-th-large"></i> Grid</button>
</div>
<br>



<?php

 include("connect.php");

  $query="select * from tbladdvehicle,tbltraveldetails where tbladdvehicle.usrid=$userid && tbltraveldetails.vid=tbladdvehicle.vid";
  $result = $con->query($query);
  if ($result->num_rows > 0) {
 

 
    while($row = $result->fetch_assoc()) {
?>


<div class="row" 

  <div class="column" style=" background:url('http://clevertechie.com/img/bnet-bg.jpg') #0f2439 no-repeat center top;">
    
   
 <table cellspacing="20px">
   <form name="myform" method="POST" action="vechileview.php" enctype="multipart/form-data"> 
      <input type="hidden" name="vin" value="<?php echo $row['trvlid'];?>">

   <tr >
    <th><img src="image/<?php echo $row["imgpath"]; ?>" height="125px" width="125px"></th>
    <th> <h3>Name: <?php echo $_SESSION['nnm']; ?></h3> </th>
    <th> <h3>From: <?php echo $row["from1"]; ?></h3></th>
     <th> <h3>To: <?php echo $row["To1"]; ?></h3> </th> 
      <th> <h3>No_of_seats: <?php echo $row["no_of_seats"]; ?></h3> </th>  
   </tr>
   <tr>
    <th> <h3>Vechile name: <?php echo $row["Carname"]; ?></h3></th>
    <th> <h3>Time: <?php echo $row["Time1"]; ?></h3></th>
     <th> <h3>Date: <?php echo $row["Date1"]; ?></h3></th>
    <th> <h3>Type: <?php echo $row["Type"]; ?></h3></th>
     <th> <h3>Amount: <?php echo $row["Amount"]; ?></h3> </th> 
 <th> <h3><input class="button" type="submit" name="delete" value="View"></h3></th>

   </tr>
    </form>
 </table>


  </div>

  <?php
    }
}

 if(isset($_POST['delete']))
  {
    $gg=$_POST['vin'];
   
    ?>
    <script>
        alert(<?php echo $gg; ?>);
        </script>
        <?php
 
  }
  
?>


<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

</body>
</html>
