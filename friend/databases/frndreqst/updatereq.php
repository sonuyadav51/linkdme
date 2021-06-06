<?php  

  include('../../../databases/dbconn.php');
  error_reporting(0);     
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../');
}
   $id = $_SESSION['uid'];
  $update = "UPDATE friend SET mstatus = 1 WHERE acid = $id";
  $fire = mysqli_query($conn,$update);
 

?>