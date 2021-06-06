<?php  
include("../../../databases/dbconn.php");

$postid = $_POST['postid'];
$post = mysqli_real_escape_string($conn,trim($_POST['post']));

$query = "UPDATE post SET post = '$post' WHERE post_id = $postid";
$fire = mysqli_query($conn,$query);


 

?>