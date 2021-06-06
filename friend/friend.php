<?php 

session_start();
include("../databases/dbconn.php");
if(!isset($_SESSION['uid'])){
    header('Location:../Login/');
}
  $rid = $_POST['rid'];
  $aid = $_POST['aid'];
  $status = 0;

   $query = "INSERT INTO `friend`(`acid`, `reid`, `status`) VALUES ($aid,$rid,$status)";
   $fire = mysqli_query($conn,$query);

if ($fire){
         
                
  echo "<p class='text-success'>requestSent</p>";
             
   
}
else{
  echo "Connect";
}
?>


