<?php
include 'connect.php';
//onsubmit = "return(validate());"
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">


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
 if (document.myForm.pass.value=="")
    {
      document.getElementById('pa').innerHTML="**Enter Password";
      return false;
    }
 if (document.myForm.conpass.value=="")
    {
      document.getElementById('cpa').innerHTML="**Enter Confirm password";
      return false;
    }
 if (password1 != password2) {
              alert ("\nPassword did not match: Please try again....");
             return false;
          }


      }
   
</script>




   </head>

  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form name = "myForm" action="reg.php"  method="POST" onsubmit = "return(validate());" enctype="multipart/form-data">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name <span id="fn" style="color:red;"></span></span>
            <input type="text" placeholder="Enter your name" name="fullname">
          </div>
          <div class="input-box">
            <span class="details">Username <span id="un" style="color:red;"></span></span> 
            <input type="text" name="uname" placeholder="Enter your username" >
          </div>
          <div class="input-box">
            <span class="details">Email <span id="em" style="color:red;"></span>
            <input type="text" placeholder="Enter your email" name="email">
          </div>
          <div class="input-box">
            <span class="details">Phone Number <span id="pn" style="color:red;"></span>
            <input type="text" placeholder="Enter your number" name="phone">
          </div>
           <div class="input-box">
            <span class="details">Place <span id="pl" style="color:red;"></span>
            <input type="text" placeholder="Enter your number" name="place" >
          </div>
           <div class="input-box">
            <span class="details">State <span id="st" style="color:red;"></span>
            <input type="text" placeholder="Enter your number" name="state">
          </div>
           <div class="input-box">
            <span class="details">pin <span id="pi" style="color:red;"></span>
            <input type="text" placeholder="Enter your pin number" name="pin">
          </div>
          <div class="input-box">
            <span class="details">DOB <span id="do" style="color:red;"></span>
            <input type="date" placeholder="Enter your DOB" name="dob" max="<?= date('Y-m-d'); ?>">

          </div>
          <div class="input-box">
            <span class="details">User Type</span>
           
  <select class="input-box" name="usertype">
            <option value="1" >Owner</option>
            <option value="2" >User</option></select>

          </div>
          <div class="input-box">
            <span class="details">Adhar Number <span id="ad" style="color:red;"></span>
            <input type="text" placeholder="Enter your adhar number" name="adhar">
          </div>
          <div class="input-box">
            <span class="details">Password <span id="pa" style="color:red;"></span>
            <input type="password" placeholder="Enter your password" name="pass">
          </div>
          <div class="input-box">
            <span class="details">Confirm Password <span id="cpa" style="color:red;"></span>
            <input type="password" placeholder="Confirm your password" name="conpass">
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1" value="male">
          <input type="radio" name="gender" id="dot-2" value="female">
          <input type="radio" name="gender" id="dot-3" value="other">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Other</span>
            </label>
          </div>
        </div>
         <div><label>profile pic </label>
        <input type="file" name="imgpath" accept="image/*" value="" required /></div>
        <div class="button">
          <input type="submit" value="Register" name="Click1">
        </div>
        <div>
         <center> <h2 class="linker" ><a href="log.php"  style="text-decoration: none;">Already Login...?</a></h2></center>
        </div>
        
      </form>
    </div>
  </div>

</body>
</html>


<?php
include("connect.php");

  if(isset($_POST["Click1"]))
  {
      $fullname=$_POST["fullname"];
      $username=$_POST["uname"];
    $email=$_POST["email"];
    $phone=$_POST["phone"];
    $place=$_POST["place"];
    $state=$_POST["state"];
    $pin=$_POST["pin"];
    $DOB=$_POST["dob"];
    $usertype=$_POST["usertype"];
    $adhar=$_POST["adhar"];
    $password=$_POST["pass"];
    $gender=$_POST["gender"];
 
 $msg="";
 $imgpath=$_FILES["imgpath"]["name"];

// check if the user has clicked the button "UPLOAD" 

    $filename = $_FILES["imgpath"]["name"];

    $tempname = $_FILES["imgpath"]["tmp_name"];  

        $folder = "propic/".$filename;   
      if (move_uploaded_file($tempname, $folder)) {

            $msg = "Image uploaded successfully";

        }else{

$imgpath="user.png";
    }
    $sql="insert into registration(fullname,username,email,phonno,place,state,pin,dob,usertype,adhar,password,gender,propath) 
    values('$fullname','$username','$email',' $phone','$place','$state','$pin','$DOB','$usertype','$adhar','$password','$gender','$imgpath')";
  if(mysqli_query($con,$sql))
  {
    ?>
    <script>
        alert("inserted");
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
