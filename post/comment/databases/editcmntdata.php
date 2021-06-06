<?php  
include("../../../databases/dbconn.php");
error_reporting(0);
$cmntid = $_POST['cmntid'];

$query = "SELECT * FROM postcomment WHERE commentid = $cmntid";
$fire = mysqli_query($conn,$query);

$data = mysqli_fetch_array($fire);

echo mysqli_real_escape_string($conn,trim($_POST['comment']));




?>