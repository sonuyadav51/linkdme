<?php 
  include("../../../databases/dbconn.php");
error_reporting(0);
 $cmntid = $_POST['cmntid'];
 $comment = mysqli_real_escape_string($conn,trim($_POST['comment']));
echo $comment;
$query = "UPDATE postcomment SET comment = '$comment' WHERE commentid = $cmntid";
$fire = mysqli_query($conn,$query);


?>