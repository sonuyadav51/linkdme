<?php 
  include("../../../databases/dbconn.php");
error_reporting(0);
 $replyid = $_POST['replyid'];
 $reply = mysqli_real_escape_string($conn,trim($_POST['reply']));
echo $comment;
$query = "UPDATE commentreply SET reply = '$reply' WHERE replyid = $replyid";
$fire = mysqli_query($conn,$query);


?>