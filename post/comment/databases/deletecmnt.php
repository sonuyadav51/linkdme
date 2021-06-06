<?php  
include("../../../databases/dbconn.php");
error_reporting(0);
$cmntid = $_POST['cmntid'];

$query = "DELETE FROM postcomment WHERE commentid = $cmntid";
$fire = mysqli_query($conn,$query);
$nquery = "DELETE FROM notification WHERE cid = $cmntid";
$nfire = mysqli_query($conn,$nquery);


?>