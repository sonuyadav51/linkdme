<?php

include("../../../../databases/dbconn.php");
session_start();
$id = $_SESSION['uid'];
$pic = $_FILES['uploadimg']; 
$filename = $pic['name'];
$tempname = $pic['tmp_name'];
$dpcstore = '../../../../post/img/'.$filename;
$ddatabase = 'img/'.$filename;
move_uploaded_file($tempname,  $dpcstore);
date_default_timezone_set("Asia/Kolkata");
          $time = date('h:i:s A',time());
          $pquery = "INSERT INTO `post`(`id`,`post_img`,`time`) VALUES ($id,'$ddatabase','$time')";
      
         $pfire = mysqli_query($conn,$pquery);
          if($pfire){
             // $_SESSION['fullImage'] = $filename;
              $fquery = "INSERT INTO `fullimage`(`id`,`image`) VALUES ($id,'$filename')";
      
              $ffire = mysqli_query($conn,$fquery);
              header("Location:../../../../about.php?id=$id");
          }else{
            echo "problem";
          }


?>
