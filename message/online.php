<?php  

include("databases/dbconn.php");
session_start();
$id = $_SESSION['ls_id'];
$query = "UPDATE login_status SET last_login = now()
WHERE login_status_id = $id";
$fire = mysqli_query($conn,$query);



?>