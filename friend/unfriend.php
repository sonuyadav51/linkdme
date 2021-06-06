<?php
include('../databases/dbconn.php');
   session_start();

  
      $unid = $_POST['unid'];
      $sesid = $_SESSION['uid'];
      $status =1;
     


if(isset($_POST['unid'])){
    
    $query = "delete from friend where (reid = $unid  and acid = $sesid  || reid = $sesid and acid =$unid) and status =  $status";
    $fire = mysqli_query($conn,$query);
    if($fire){
       echo "are you sure?";
    }
    
    
}







?>