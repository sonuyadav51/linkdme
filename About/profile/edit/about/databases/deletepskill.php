<?php 
include("dbconn.php");
$id = $_POST['id'];
$query = "DELETE FROM interpskill WHERE id = $id";
$fire = mysqli_query($conn,$query);






?>
