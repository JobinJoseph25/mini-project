<?php
include 'navuser.php';
?>
<?php

 include("connect.php");
 $uuid= $_SESSION['uid'];
  
  $query="select * from registration where userid='$uuid'";
  $result = $con->query($query);
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      $fullname=$row["fullname"];
      $username=$row["username"];
    $email=$row["email"];
    $phone=$row["phonno"];
    $place=$row["place"];
    $state=$row["state"];
    $pin=$row["pin"];
    $DOB=$row["dob"];
    $usertype=$row["usertype"];
    $adhar=$row["adhar"];
    $password=$row["password"];
    $gender=$row["gender"];

        
    }
    
} else {
    echo "0 results";
}  
?>
<html>
<head>
  <script type = "text/javascript">
   
      function validate() {
        var password1=document.myForm.pass.value;  
        var password2=document.myForm.conpass.value; 
        
        
       if (document.myForm.fullname.value=="")
    {
      document.getElementById('fn').innerHTML="**Enter fullname";
      return false;
    }

    if (document.myForm.uname.value=="")
    {
      document.getElementById('un').innerHTML="**Enter Username";
      return false;
    }
     var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     if (document.myForm.email.value=="" || !filter.test(document.myForm.email.value))
    {
   
    document.getElementById('em').innerHTML="**Enter a valid Email";
    return false;
    }
 if (document.myForm.phone.value=="")
    {
      document.getElementById('pn').innerHTML="**Enter Phone";
      return false;
    }
    var val = document.myForm.phone.value;
if (/^\d{10}$/.test(val)==false) {
    // value is ok, use it
document.getElementById('pn').innerHTML="**No must be 10 digit";
   
    return false;
}
 if (document.myForm.place.value=="")
    {
      document.getElementById('pl').innerHTML="**Enter Place";
      return false;
    }

 if (document.myForm.state.value=="")
    {
      document.getElementById('st').innerHTML="**Enter State";
      return false;
    }

 if (document.myForm.pin.value=="")
    {
      document.getElementById('pi').innerHTML="**Enter Pin";
      return false;
    }
var valpin = document.myForm.pin.value;
if (/^\d{6}$/.test(valpin)==false) {
    // value is ok, use it
document.getElementById('pi').innerHTML="**Pin must be 6 digit";
   
    return false;
}


 if (document.myForm.dob.value=="")
    {
      document.getElementById('do').innerHTML="**Enter Dob";
      return false;
    }
 if (document.myForm.adhar.value=="")
    {
      document.getElementById('ad').innerHTML="**Enter Adhar";
      return false;
    }
var valadhar = document.myForm.adhar.value;
if (/^\d{18}$/.test(valadhar)==false) {
    // value is ok, use it
 document.getElementById('ad').innerHTML="**Adhar no must be 18 digit";
   
    return false;
}


      }
   
</script>
</head>
<style type="text/css">
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
  input[type=text]  {
  border: 3px inset #FFA5A5;
  outline:0;
  height:25px;
  width: 275px;
}
 input[type=Date]  {
  border: 3px inset #FFA5A5;
  outline:0;
  height:25px;
  width: 275px;
}
</style>
<body background="http://clevertechie.com/img/bnet-bg.jpg">
 <center> <h1 style="color: white;">User Profile</h1>
   
      <form name = "myForm" action="profile.php" method="POST" onsubmit = "return(validate());" enctype="multipart/form-data">
       <table cellspacing="25">
        <tr>
          <th>
            <span class="details" style="color: white;">Full Name <span id="fn" style="color:red;"></span></span>
          </th><th>
            <input type="text" placeholder="Enter your name" name="fullname" value="<?php echo $fullname;?>">
          </th>
         </tr>
         <tr>
            <th><span class="details" style="color: white;">Username <span id="un" style="color:red;"></span></span> </th>
           <th> <input type="text" name="uname" placeholder="Enter your username" value="<?php echo $username;?>"></th>
          <tr>
          <th>  <span class="details" style="color: white;">Email <span id="em" style="color:red;"></span></span></th>
            <th><input type="text" placeholder="Enter your email" name="email" value="<?php echo $email;?>"></th></tr>
        
         <tr>  <th> <span class="details" style="color: white;">Phone Number <span id="pn" style="color:red;"></span></span></th>
           <th> <input type="text" placeholder="Enter your number" name="phone" value="<?php echo $phone;?>"></th></tr>
         
          <tr><th>  <span class="details" style="color: white;">Place <span id="pl" style="color:red;"></span></span></th>
            <th><input type="text" placeholder="Enter your number" name="place" value="<?php echo $place;?>"></th></tr>
         
           <tr><th> <span class="details" style="color: white;">State <span id="st" style="color:red;"></span></span></th>
            <th><input type="text" placeholder="Enter your number" name="state" value="<?php echo $state;?>"></th></tr>
         
            <tr><th><span class="details" style="color: white;">pin <span id="pi" style="color:red;"></span></span></th>
            <th><input type="text" placeholder="Enter your pin number" name="pin" value="<?php echo $pin;?>"></th></tr>
          
            <tr><th><span class="details" style="color: white;">DOB <span id="do" style="color:red;"></span></span></th>
           <th> <input type="date" placeholder="Enter your DOB" name="dob" max="<?= date('Y-m-d'); ?>" value="<?php echo $DOB;?>"></th></tr>

          
           <tr><th> <span class="details" style="color: white;">Adhar Number <span id="ad" style="color:red;"></span></span></th>
            <th><input type="text" placeholder="Enter your adhar number" name="adhar" value="<?php echo $adhar;?>"></th></tr>
          
           <tr><th></th>
         
         <th>
         
          <input type="submit" value="Update" class="button" name="Click3">
        </th></tr>
       </table>
      </form>
</center> </body>
</html>

<?php
 include("connect.php");

  if(isset($_POST["Click3"])){
 $uuid= $_SESSION['uid'];
  
      
      $fullname=$_POST["fullname"];
      $username=$_POST["uname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $place=$_POST["place"];
    $state=$_POST["state"];
    $pin=$_POST["pin"];
    $DOB=$_POST["dob"];
   
    $adhar=$_POST["adhar"];
  

     
    $sql="update registration set fullname='$fullname',username='$username',email='$email',phonno='$phone',place='$place',state='$state',pin='$pin',dob='$DOB',adhar='$adhar' where userid='$uuid'";

  if(mysqli_query($con,$sql))
  {
    ?>
    <script>
        alert("Profile updated Succesfully");
        </script>
        <?php
  }
else
{
  echo "error";
}

      mysqli_close($con);

      
  
  }
?>

