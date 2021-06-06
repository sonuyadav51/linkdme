<?php 
include("dbconn.php");
$id = $_POST['id'];
$query = "DELETE FROM achivement WHERE id = $id";
$fire = mysqli_query($conn,$query);






?>
