<?php   
include("../dbconn.php");
session_start();
error_reporting(0);
$id = $_POST['seid'];
$Sid = $_SESSION['uid'];

$array = array();
$Carray = array();

$query = "SELECT * FROM post  WHERE id = $id";
$fire =mysqli_query($conn,$query);
while($data = mysqli_fetch_array($fire)){
    $postid = $data['post_id'];
    array_push($array,$postid);
}
$number = count($array);

for($i=0;$i<=$number;$i++){
    $ids = $array[$i];
    
    $sub_query = "UPDATE postreaction SET status = 0 WHERE post_id = $ids AND status = 1";
    $sub_fire = mysqli_query($conn,$sub_query);
     
       
   
}
//UPDATING COMMENT
$Cquery = "SELECT * FROM post  WHERE id = $id";
$Cfire =mysqli_query($conn,$Cquery);
while($Cdata = mysqli_fetch_array($Cfire)){
    $Cpostid = $Cdata['post_id'];
    array_push($Carray,$Cpostid);
}
$Cnumber = count($Carray);

for($i=0;$i<=$Cnumber;$i++){
    $Cids = $Carray[$i];
    
    $Csub_query = "UPDATE postcomment SET status = 0 WHERE post_id = $Cids AND status = 1";
    $Csub_fire = mysqli_query($conn,$Csub_query);
     
       
   
}


?>