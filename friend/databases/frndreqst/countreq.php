<?php  

  include('../../../databases/dbconn.php');
  error_reporting(0);     
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../');
}
   
    
   $friend = "select * from friend where mstatus = 0";
   $fire = mysqli_query($conn,$friend);
   $reqid = array();
   while($row = mysqli_fetch_array($fire)){
       if($_SESSION['uid'] == $row['acid']){
         $user = $row['reid']." "; 
         array_push($reqid,$user); 
      }
   }
  
  $number = count($reqid);
 
echo $number;


?>