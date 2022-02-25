<?php
include 'navuser.php';

?>

<!DOCTYPE html>
<html>
<head>
	<style>
.btn1 {
  background-color: #4CAF50;
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
th {
  text-align: left;
}
h1{
	color: white;
}
</style></head>
<body style="background: url(bookin.jpg);
  background-repeat: no-repeat;
  background-size: 1600px;">
	<title >Booking</title>
	
<?php
include("connect.php");
 if(isset($_POST['book11']))
  {
    $gg=$_POST["trvl88"];
   
  $query="select * from tbladdvehicle,tbltraveldetails where tbladdvehicle.vid=tbltraveldetails.vid && tbltraveldetails.trvlid=$gg";
  $result = $con->query($query);
  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

?>

<center><h1 style="color: green;">Travel Details</h1>
	 <form class="form" action="userbook.php"  method="POST" enctype="multipart/form-data" autocomplete="off">
<img src="image/<?php echo $row["imgpath"]; ?>" height="125px" width="125px">
<input type="hidden" name="img1" value="<?php echo $row["imgpath"]; ?>">
<input type="hidden" name="usersidw" value="<?php echo $row["uid"]; ?>">
	<table border="0px">
		<tr>
		<?php	$h=$row["uid"];
			$s="select fullname from registration where userid=$h"; 
			$r= $con->query($s);
		 ?>
			<th><h1>Name:</h1></th><th><h1><?php while ($ro = $r->fetch_assoc()) {

    echo $ro['fullname'];
    $usersname=$ro['fullname']; } ?>
    	<input type="hidden" name="usersname" value="<?php echo $_SESSION['nnm']; ?>">
    </h1></th>
		</tr><tr>
			<th><h1>From:</h1></th><th><h1><?php echo $row["from1"]; ?></h1></th><input type="hidden" name="frm" value="<?php echo $row["from1"]; ?>">
			</tr><tr>
			<th><h1>To:</h1></th><th><h1><?php echo $row["To1"]; ?></h1></th><input type="hidden" name="to" value="<?php echo $row["To1"]; ?>">
			</tr><tr>
			<th><h1>Date:</h1></th><th><h1><?php echo $row["Date1"]; ?></h1></th><input type="hidden" name="dt" value="<?php echo $row["Date1"]; ?>">
			</tr><tr>
			<th><h1>Time:</h1></th><th><h1><?php echo $row["Time1"]; ?></h1></th><input type="hidden" name="tim" value="<?php echo $row["Time1"]; ?>">
			</tr><tr>
			<th><h1>Vechilename:</h1></th><th><h1><?php echo $row["Carname"]; ?></h1></th><input type="hidden" name="cnm" value="<?php echo $row["Carname"]; ?>">
			</tr><tr>
			<th><h1>Type:</h1></th><th><h1><?php echo $row["Type"]; ?></h1></th><input type="hidden" name="typ" value="<?php echo $row["Type"]; ?>">
			</tr><tr>
			<th><h1>Model No:</h1></th><th><h1><?php echo $row["model_name"]; ?></h1></th><input type="hidden" name="mdnm" value="<?php echo $row["model_name"]; ?>">
			</tr><tr>
			<th><h1>Build Year:</h1></th><th><h1><?php echo $row["Build_year"]; ?></h1></th><input type="hidden" name="bdy" value="<?php echo $row["Build_year"]; ?>">
		</tr>
		<tr>
			<th><h1>No_of_seats:</h1></th><th><h1><?php echo $row["no_of_seats"]; ?></h1></th><input type="hidden" name="nos" value="<?php echo $row["no_of_seats"]; ?>">
		</tr>
		<tr>
			<th><h1>Amount:</h1></th><th><h1><?php echo $row["Amount"]; ?></h1></th><input type="hidden" name="amt" value="<?php echo $row["Amount"]; ?>">
		</tr>

	</table>
	
	<input class="btn1" type="submit" name="Book78" value="Book now"></center></form>
</body>

</html>

<?php 



}}
  }


  if(isset($_POST['Book78']))
  {
       $usersid=$_SESSION['uid'];


    $ownerid=$_POST["usersidw"];
   $imgpath=$_POST["img1"];
   $usersname=$_POST["usersname"];
   $from=$_POST["frm"];
   $to=$_POST["to"];
   $date=$_POST["dt"];
   $time=$_POST["tim"];
    $vname=$_POST["cnm"];
   $type=$_POST["typ"];
   $model_name=$_POST["mdnm"];
   $build_year=$_POST["bdy"];
   $no_of_seats=$_POST["nos"];
   $Amount=$_POST["amt"];
   $a=0;
   $sq="INSERT INTO booking(userid2, ownerid2,imgpath2, username2, from2, to2, date2, time2, vechilename2, type2, modelname2, buildyear2, no_of_seats2, Amount, status) 
                      VALUES ('$usersid','$ownerid','$imgpath','$usersname','$from','$to','$date','$time','$vname','$type','$model_name','$build_year','$no_of_seats','$Amount','$a')";
   if(mysqli_query($con,$sq))
  {
  	
    ?>
    <script>
        alert("Succesfully inserted");
        </script>
        <?php
       header("location:home.php");
  }
else
{
  echo "error";
}
     
 
  }
  ?>