<?php 
include("../dbconn.php");


$update = "UPDATE notification SET status = 1";
$fire = mysqli_query($conn,$update);











?>