<?php  
include("../databases/dbconn.php");
error_reporting(0);
session_start();
$userid = $_POST['userid'];
$postid = $_POST['postid'];
$like = 1;

  $check = "SELECT * FROM `postreaction` WHERE post_id = $postid and user_id = $userid and post_like = $like";
  $cfire = mysqli_query($conn,$check);

 $num = mysqli_num_rows($cfire);
if($num == 0){
          $insert = "INSERT INTO `postreaction`(`post_id`, `user_id`, `post_like`) VALUES ($postid,$userid,$like)";
          $fire = mysqli_query($conn,$insert);
}else{
   $delete = "delete from postreaction where post_id = $postid and user_id = $userid and post_like = 1";
    $deletefire = mysqli_query($conn,$delete);
}









?>