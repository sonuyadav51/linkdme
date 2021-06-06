<?php  
  include("../dbconn.php");
error_reporting(0);
 $postid = $_POST['postid'];
  
$output ='';

$query = "DELETE FROM `post` WHERE post_id = $postid";
$fire = mysqli_query($conn,$query);
if($fire){
$output .= '
   
   <div class="alert-success p-4">
    <h5 class="text-center text-capitalize">post deleted successfully</h5>
    <a href="home.php" class="btn btn-info btn-sm">Go back</a>
   </div>
   
   
   ';
}else{
    $output .= "not deleted";
}

echo $output;



?>
