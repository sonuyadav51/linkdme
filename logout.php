<?php   
include("databases/dbconn.php");
session_start();
session_destroy();
header("Location:Login/index.php");




?>


