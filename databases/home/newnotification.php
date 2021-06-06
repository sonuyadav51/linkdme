<?php   
include("../dbconn.php");
session_start();
error_reporting(0);
$id = $_POST['mainid'];
$pstid = $_POST['postid'];
$Sid = $_SESSION['uid'];

$array = array();
$userarray = array();


//============================== ALL STUFF FOR LIKE NOTIFICATION ====================================//
$query = "SELECT * FROM post  WHERE id = $id";
$fire =mysqli_query($conn,$query);
while($data = mysqli_fetch_array($fire)){
    $postid = $data['post_id'];
    array_push($array,$postid);
}
$number = count($array);

for($i=0;$i<=$number;$i++){
    $ids = $array[$i];
    
    $sub_query = "SELECT * FROM `notification` WHERE post_id = $ids AND mstatus = 0 AND  id !=$Sid";
    $sub_fire = mysqli_query($conn,$sub_query);
    while($not = mysqli_fetch_array($sub_fire)){
       $user =  $not['id'];
       array_push($userarray,$user);
   }
}
    $usernumber = count($userarray); //NUMBER OF NOTIFICATION LIKE
   
    echo $usernumber;
    
?>