<?php 
include("dbconn.php");
$id = $_POST['id'];
$query = "DELETE FROM toolskil WHERE id = $id";
$fire = mysqli_query($conn,$query);






?>
