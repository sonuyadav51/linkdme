<?php  
include("../../../databases/dbconn.php");
error_reporting(0);
$replyid = $_POST['replyid'];

$query = "DELETE FROM commentreply WHERE replyid = $replyid";
$fire = mysqli_query($conn,$query);
//$nquery = "DELETE FROM notification WHERE cid = $cmntid";
//$nfire = mysqli_query($conn,$nquery);


?>