<?php 
include("../dbconn.php");
$id = $_POST['mainid'];

$query = "UPDATE message SET hstatus = 0 WHERE rid = $id";
$fire = mysqli_query($conn,$query);





?>