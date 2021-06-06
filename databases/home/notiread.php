<?php 
include("../dbconn.php");
$nid = $_POST['nid'];

$update = "UPDATE notification SET status = 1 WHERE notif_id = $nid";
$fire = mysqli_query($conn,$update);











?>