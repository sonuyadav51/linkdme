 <?php  
include("databases/dbconn.php");
session_start();
$rid = $_POST['rid'];
$query = "UPDATE message SET status = 0 WHERE id = $rid";
$fire = mysqli_query($conn,$query);



?>