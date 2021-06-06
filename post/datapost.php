
<?php 
include('../databases/dbconn.php');
error_reporting(0);
session_start();
date_default_timezone_set("Asia/Kolkata");

$post = mysqli_real_escape_string($conn,trim($_POST['post-content']));
$pic = $_FILES['postimg'];
//$video = $_FILES['postvideo'];
$time = date('h:i:s A',time());
$id = $_SESSION['uid'];
//print_r($video);
//echo $time;
    $filename = $pic['name'];
    $tempname = $pic['tmp_name'];
    
   
    $pcstore = 'img/'.$filename;
    move_uploaded_file($tempname,  $pcstore);

    // $videoname = $video['name'];
    // $vtempname = $video['tmp_name'];
    //  $size = $video['size'];
    // $vpcstore = 'video/'.$videoname;
   
    //  move_uploaded_file($vtempname,  $vpcstore);

if(isset($_POST['submit'])){
    
  $query = "INSERT INTO `post`(`id`, `post`, `post_img`,`time`) VALUES ($id,'$post','$pcstore','$time')";
  $fire = mysqli_query($conn,$query);
  if($fire){
      header("Location:../home.php");
  }else{
      echo "problem";
  }
    }
        

?>

