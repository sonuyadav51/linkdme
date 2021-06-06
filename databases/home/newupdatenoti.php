<?php 
  
include("../dbconn.php");
session_start();
error_reporting(0);
$id = $_POST['seid'];
$Sid = $_SESSION['uid'];

$array = array();


$query = "SELECT * FROM post  WHERE id = $id";
$fire =mysqli_query($conn,$query);
while($data = mysqli_fetch_array($fire)){
    $postid = $data['post_id'];
    array_push($array,$postid);
}
$number = count($array);

for($i=0;$i<=$number;$i++){
    $ids = $array[$i];
    
    $sub_query = "UPDATE notification SET mstatus = 1 WHERE post_id = $ids AND mstatus = 0";
    $sub_fire = mysqli_query($conn,$sub_query);
     
       
   
}


?>