<?php  

include("../../databases/dbconn.php");
session_start();

$postid = $_POST['postid'];
$like = 1;

  $check = "SELECT * FROM `postreaction` WHERE post_id = $postid and post_like = $like";
  $cfire = mysqli_query($conn,$check);
   $num = mysqli_num_rows($cfire);
  
   if($num == 0){
       
   }else{
       echo $num;
   }  
    
?>