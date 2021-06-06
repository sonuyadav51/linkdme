<?php 
session_start();

if(isset($_SESSION['uid'])){
  header("Location:../home.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <meta name="description" content="A large community of student from all over the world.Linkdme is helping one student to connect with other student.">
   <meta name="keywords" content="Linkdme,facebook,instagram,twitter,linkeden,social media,engineering,student">
 
    <title>Linkdme | Login</title>
     <!--bootstrap css--> 
     <link rel="stylesheet" href="../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="../css/login/login.css">
</head>
<body>
 <div class="container-fluid">
       <div class="row nav-bar text-uppercase">
          <h1 class=" mx-auto text-center">
               <b> Linkdme </b>
             </h1>
       </div>
   </div>
   

<!--login start-->
   <div class="container-fluid">
    
         <div class="row  d-flex justify-content-center">
         <div class="box">
   <div class="container-fluid ">
   <div class="login-box">
   <h2 class="text-uppercase text-center">Welcome</h2>
       
   <h5 class="text-uppercase my-2">Login Here</h5>
   <div class="row  d-flex justify-content-center">
       <div class="col-12">
          
   <form action="../databases/login/logindb.php" method="post">
                     
                        <?php if(isset($_GET['invalid'])){ ?>
                            <div class="text-center  alert-danger">
                             <?php echo $_GET['invalid']; ?>
                             </div> 
                       <?php } ?>
                     
                       <div class="input-container">
                            <input type="text" name="uname" class="form-control l" required="" id="uname">
                            <label for="uname">mobile number or email</label>
                        </div>
                        <div class="input-container">
                            <input type="password" name="pwd" class="form-control l" required="" id="pwd">
                            <label for="pwd">Password</label>
                        </div>
                        <div class="input-container">
                            <label for="rembember"><b class="text-danger">remember me</b></label>
                            <input type="checkbox" name="rembember" class="form-control " 
                            
                            <?php if(isset($_COOKIE['pwd']) && isset($_COOKIE['email'])){  ?>
                               
                             checked
                             <?php } ?>>
                           
                        </div>
                       <a href="../forgotpwd/forgotpwd.php" class="nav-link">forgot password ?</a>
                        <input type="submit" class="form-control btn btn-primary text-uppercase  loginbtn" value="LOG IN" name="submit">
</form>
   <a href="../index.php" class="nav-link text-center login-link">Not a member? Create account</a>
</div>
</div>
</div>
</div>

         
   <!--login end-->

  </div>
     </div>
    </div>
                
               
 <div class="footer " style="background:black; height:400px; z-index:-1; margin-top:-50px;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-5 my-5">
                <a href="about.html" class="mx-2 text-capitalize" style="color:white; font-size:1.2rem; text-decoration:none">about</a>
                 <a href="term.html" class="mx-2 text-capitalize" style="color:white; font-size:1.2rem; text-decoration:none">term and support</a>
                 <a href="cookie.html" class="mx-2 text-capitalize" style="color:white; font-size:1.2rem; text-decoration:none">cookie policy</a>
            </div>
        </div>
    </div>
     
 </div>
  
  




  


    <script src="../source/js/jquery-3.3.1.js"></script>
    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="../js/login/login.min.js"></script>
    <script src="../js/login/jquery.min.js"></script>
</body>
</html>

<?php 


if(isset($_COOKIE['pwd']) && isset($_COOKIE['email'])){
    $name = $_COOKIE['email'];
    $pwd = $_COOKIE['pwd'];
   
}
  
?>  
<script>
      var name = "<?php echo $name; ?>";
      var pwd = "<?php echo $pwd; ?>";
       document.querySelector("#uname").value  = name;
       document.querySelector("#pwd").value  = pwd;

</script>





















