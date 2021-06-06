<?php
include('databases/dbconn.php');
 error_reporting(0);      
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:Login/index.php');
}

$name = $_GET['serch'];
$namearray = explode(' ',$name);
$fname =  $namearray['0'];
$lname =  $namearray['1'];
$id = $_GET['id'];
$sid = $_SESSION['uid'];


?>
   <?php  //include('databases/dbconn.php');
       
       
//session_start();


 //$id=$_SESSION['uid'];
  $query = "select * from student_detail where id = $id";
  $fire = mysqli_query($conn,$query);
   $data = mysqli_fetch_array($fire);
   
?>
<?php  
  // error_reporting(0);
    
   $friend = "select * from friend where status = 0";
   $fire = mysqli_query($conn,$friend);
   $reqid = array();
   while($row = mysqli_fetch_array($fire)){
       if($_SESSION['uid'] == $row['acid']){
         $user = $row['reid']." "; 
         array_push($reqid,$user); 
      }
   }
  
  $number = count($reqid);
  
  for($i=0;$i<$number;$i++){
                $num = $reqid[$i];
                $req = "select * from student_detail where id=$num";
                $fire = mysqli_query($conn,$req);
                while($du = mysqli_fetch_array($fire)){
                  
                }
             }
?>
<?php

  $picquery = "select * from student_detail where id =$sid";
  $picfire = mysqli_query($conn,$picquery);
  $picdata = mysqli_fetch_array($picfire);
  $pic = $picdata['profile'];
  $array = explode('/',$pic);
  $picname = $array['3'];

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
    <link rel="stylesheet" href="source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="source//css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/home/search.css">
    <link rel="stylesheet" href="css/home/noti.css">
  
    <link rel="stylesheet" href="css/home/home.css">
    <script>
    var mainid = "<?php echo $_SESSION['uid'];  ?>";
    </script>
    <style>
      .search:focus{
            outline: none;
        }
        .search:focus ~ label{
            color:white;
            
        }
    
    </style>
     
</head>

<body>
<?php include("navbar/navbar.php") ?>

<div class="mt-md-4">
<h6 class="text-center  mt-5 pt-md-4">search result for <strong class="text-capitalize"><?php echo $name; ?></strong></h6>
 <?php 
    
    $query = "SELECT * FROM student_detail WHERE (name = '$name' OR name = '$fname' OR name = '$lname') AND id != $sid";
    $fire = mysqli_query($conn,$query);
    while($row = mysqli_fetch_array($fire)){
        $pic = $row['profile'];
        $array = explode('/',$pic);
        $picname = $array['3'];
    
    ?>
<div class="data my-1 p-1 col-md-6 mx-auto" style="background:white; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
<div class="container " >

  
  <div class="row ">
  <div class="col-3">
        <a href="about.php?id=<?php echo $id; ?>"><div class="pic"><img src="About/profile_pic/<?php echo $picname ?>" alt=""></div></a>
         </div>
     <div class="col-6 py-4 pl-5 pl-md-1">
        <a href="about.php?id=<?php echo $id; ?>" class="text-capitalize" style="text-decoration:none; color:black;"><h6 class="name"><?php echo $row['name'];  ?></h6></a>
        <a href="about.php?id=<?php echo $id; ?>"><button class="btn btn-info btn-sm">see profile</button></a>
   </div>
       <div class="col-3 py-3">
        
        </div>
        </div>
   

    </div>

</div>
 <?php }  ?>
</div>


    <script src="source/js/jquery-3.3.1.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    <script src="source/js/all.min.js"></script>
    <script src="js/home/searchdata.min.js"></script>
   
</body>

</html>

