<?php  
include("../dbconn.php");
//error_reporting(0);
$id = $_POST['mainid'];

$query = "select * from message where rid = $id AND hstatus = 1";
$fire = mysqli_query($conn,$query);
$num = mysqli_num_rows($fire);

  echo $num;



?>