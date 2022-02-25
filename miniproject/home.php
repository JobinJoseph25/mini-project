<?php
include 'navuser.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <meta name="viewport" content="width=device-width, initial-scale=1.0">


	<style type="text/css">
		.searchButton {
  width: 40px;
  height: 36px;
  border: 1px solid #00B4CC;
  background: #C70039 ;
  text-align: center;
  color: #fff;
  border-radius: 0 5px 5px 0;
  cursor: pointer;
  font-size: 20px;
}
.label
{
	color: #C70039 
}

</style>
</head>
<body background="banner.jpg">
	
	<center>
		<form class="form" action="viewcar.php"  method="POST" enctype="multipart/form-data" autocomplete="off">
<br><br><br><br><br><br><br><br>
		<table border="0">
		<tr>
			<th><label class="label">From</label>
				<input type="text" name="From"></th>
				<th><label class="label">To</label>
				<input type="text" name="To"></th>
				<th><label class="label">Date</label>
				<input type="Date" name="date"></th>
				<th><label class="label">Type</label>
				<select class="input" name="usertype">
            <option value="1" >Two Wheeler</option>
            <option value="2">Four Wheeler</option></select></th>
            <th><button type="submit" class="searchButton" name="click77">
        <i class="fa fa-search"></i>
        
     </button></th>
		</tr>
	</table>
</form></center>

</body>
</html>