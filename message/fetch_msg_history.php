<?php   

include("databases/dbconn.php");
session_start();
$id = $_POST['userid'];
$fromid = $_SESSION['uid'];

echo fetch_user_chat($_SESSION['uid'],$id,$conn);
  
  




?>