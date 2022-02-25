<?php
session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <!----<title>Login Form Design | CodeLab</title>---->
    <link rel="stylesheet" href="stylelog.css">
   
  </head>
  <body>
  


    <div class="wrapper">
      <div class="title">Login Here</div>
      <form name = "myForm" action="log.php"  method="POST" enctype="multipart/form-data">
        <div class="field">
          <input type="text" name="username" required >
          <label>User Name</label>
        </div>
        <div class="field">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <div class="content">
          <div class="checkbox">
            <input type="checkbox" id="remember-me">
            <label for="remember-me">Remember me</label>
          </div>
          <div class="pass-link"><a href="#">Forgot password?</a></div>
        </div>
        <div class="field">
          <input type="submit" value="Login" name="Click1">
        </div>
        <div class="signup-link">Not a member? <a href="reg.php">Signup now</a></div>
      </form>
    </div>
  </body>
</html>

<?php
include("connect.php");

  if(isset($_POST["Click1"])){

  
      $uname=$_POST["username"];
      $pass=$_POST["password"];


     
      $sql="select * from registration where username='$uname' && password='$pass'";

      $result=mysqli_query($con,$sql);
       
       if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
       $_SESSION['uid']= $row["userid"];
        $_SESSION['nnm']= $row["fullname"];
        $_SESSION['prof']= $row["propath"];
         $typ=$row["usertype"];
         $st=$row["status"];

            }}


      $count=mysqli_num_rows($result);
      
      if($count>0)
      { 
        if($typ==1)
        {
          if($st==1){
          ?>
        <script>
        alert("You are blocked by admin");
        </script>
        <?php
          }
          else{
             header("location:ho.php");
          }
        }
        else if($typ==2)
        {
          if($st==1)
          {
          ?>
        <script>
        alert("You are blocked by admin");
        </script>
        <?php
        }
        else{
          header("location:home.php");
        }
        }
      
      }
      else
      {
        ?>
        <script>
        alert("invalid username or password");
        </script>
        <?php
        
      }
      
      mysqli_close($con);

      
  
  }
?>

