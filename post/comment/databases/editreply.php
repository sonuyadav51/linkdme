<?php 
include("../../../databases/dbconn.php");
error_reporting(0);
$replyid = $_POST['replyid'];

$query = "SELECT * FROM `commentreply` WHERE replyid = $replyid";
$fire = mysqli_query($conn,$query);
$data = mysqli_fetch_array($fire);
echo $data['reply'];



?>