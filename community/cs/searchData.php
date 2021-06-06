 <?php
include('../../databases/dbconn.php');
 error_reporting(0);      
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../../Login/');
}

$name = $_GET['serch'];
$namearray = explode(' ',$name);
$fname =  $namearray['0'];
$lname =  $namearray['1'];
$id = $_GET['id'];
$sid = $_SESSION['uid'];


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
    <link rel="stylesheet" href="../../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="../../css/home/search.css">
    <link rel="stylesheet" href="css/search.css">
    
     
</head>

<body>
<nav class="navbar nav  ">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="cs.php" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                    <?php echo $ndata['name']; ?>

                </h6>
            </div>

        </div>
    </nav>


<h4 class="text-center d-md-none mt-1">search result for <strong class="text-capitalize"><?php echo $name; ?></strong></h4>
 <?php 
    
    $query = "SELECT * FROM student_detail WHERE (name = '$name' OR name = '$fname' OR name = '$lname') AND id != $sid";
    $fire = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($fire)){
        $pic = $row['profile'];
        $array = explode('/',$pic);
        $picname = $array['3'];
    
    ?>
<div class="data my-1 p-1" style="background:white; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
<div class="container my-3 d-md-none" >

  
  <div class="row">
  <div class="col-3">
        <a href="../../about.php?id=<?php echo $id; ?>"><div class="pic"><img src="../../About/profile_pic/<?php echo $picname ?>" alt=""></div></a>
         </div>
     <div class="col-6 py-4 pl-5">
        <a href="../../about.php?id=<?php echo $id; ?>" class="text-capitalize" style="text-decoration:none; color:black;"><h5 class="name"><?php echo $row['name'];  ?></h5></a>
   </div>
       <div class="col-3 py-3">
        <a href="../../about.php?id=<?php echo $id; ?>"><button class="btn btn-info btn-sm">see profile</button></a>
        </div>
        </div>
   

    </div>

</div>
 <?php }  ?>



 <script src="../../source/js/jquery-3.3.1.js"></script>
    <script src="../../source/js/bootstrap.min.js"></script>
    <script src="../../source/js/all.min.js"></script>
   
</body>

</html>