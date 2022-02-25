<?php
include 'navuser.php';
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

  $gg=$_SESSION['uid'];
   
   $query="select * from booking where userid2=$gg";
  $result = $con->query($query);
  if ($result->num_rows > 0) {
 

 
    while($row = $result->fetch_assoc()) {
?>
<?php	$h=$row["ownerid2"];
			$s="select fullname from registration where userid=$h"; 
			$r= $con->query($s);
		 ?>

<div class="row" 

  <div class="column" style=" background:url('http://clevertechie.com/img/bnet-bg.jpg') #0f2439 no-repeat center top;">
    
   
 <table cellspacing="20px">
   <form name="myform" method="POST" action="usertrack.php" enctype="multipart/form-data"> 
   <tr >
    <th><img src="image/<?php echo $row["imgpath2"]; ?>" height="125px" width="125px"></th>
    <th> <h3>Your Name: <?php echo $row["username2"]; ?></h3> </th>
     <th> <h3>Owner Name: 
<?php while ($ro = $r->fetch_assoc()) {

    echo $ro['fullname'];} ?>
    </h3> </th>
    <th> <h3>From: <?php echo $row["from2"]; ?></h3></th>
     <th> <h3>To: <?php echo $row["to2"]; ?></h3> </th> 
      <th> <h3>No_of_seats: <?php echo $row["no_of_seats2"]; ?></h3> </th>  
   </tr>
   <tr>
    <th> <h3>Vechile name: <?php echo $row["vechilename2"]; ?></h3></th>
    <th> <h3>Time: <?php echo $row["time2"]; ?></h3></th>
     <th> <h3>Date: <?php echo $row["date2"]; ?></h3></th>
    <th> <h3>Type: <?php echo $row["type2"]; ?></h3></th>
     <th> <h3>Amount: <?php echo $row["Amount"]; ?></h3> </th> 

     <?php 
     $i=$row["status"];
if($i==0)
{
	?>
<th> <img src="pending.png" style="height:100px"></th>approved
	<?php
}
if($i==1)
{
	?>
<th> <img src="approved.png" style="height:100px"></th>
	<?php	
}
if($i==2)
{
		?>
<th> <img src="rejected.png" style="height:100px"></th>
	<?php
}


     ?>
 

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
