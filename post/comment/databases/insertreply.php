<?php 

include("../../../databases/dbconn.php");
error_reporting(0);
 $cid = $_POST['cid'];
 $reply = mysqli_real_escape_string($conn,trim($_POST['reply']));
 $sesid = $_POST['sesid'];
 $postid = $_POST['postid'];

$uselect = "SELECT * FROM student_detail WHERE id = $sesid";
$ufire = mysqli_query($conn,$uselect);
$data = mysqli_fetch_array($ufire);
$name = $data['name'];
$image = $data['profile'];


 $query = "INSERT INTO `commentreply`(`postid`,`commentid`, `id`, `reply`) VALUES ($postid,$cid,$sesid,'$reply')";
 $fire = mysqli_query($conn,$query);

if($fire){
    echo $reply;
    
    $Ninsert = "INSERT INTO `notification`(`name`,`id`, `post_id`, `action`,`profile`) VALUES ('$name',$sesid,$postid,3,'$image')";
    $Nfire = mysqli_query($conn,$Ninsert);
    
}


?>
