<?php 
include("../databases/dbconn.php");
session_start();
if(!isset($_SESSION['adid'])){
    header("Location:admin.php");
}

$query = "SELECT * FROM student_detail";
$fire = mysqli_query($conn,$query);
$num = mysqli_num_rows($fire);




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
 
    <title>Linkdme</title>
     <!--bootstrap css--> 
     <link rel="stylesheet" href="../css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <!--my css-->
   
   
</head>
<body style="background:black">

<div class="container">
  <div class="row  bg-dark ">
      <div class="col-8" >
          <h1 class="text-center text-uppercase p-4" style="color:white; font-size:4rem; font-family:cursive;">Linkdme</h1>
      </div>
      <div class="col-2">
         <form action="logout.php">
          <button type="submit" class="btn btn-danger my-4 ml-4">Logout</button>
          </form>
      </div>
  </div>
  </div>
  <div class="container">
      <div class="row">
          <div class="col-10">
              <h4 class="text-capitalize" style="color:green;">Total user : <span class="text-danger"><?php echo $num; ?></span> </h4>
          </div>
      </div>
  </div>



     <script src="../javaScript/jquery-3.3.1.js"></script>
     <script src="../javaScript/bootstrap.js"></script>
    <script src="../fontawesome/js/all.js"></script>
 </body>
</html>