
<?php 

include("../databases/dbconn.php");
session_start();
error_reporting(0);
 
$postid = $_POST['postid'];
$userid = $_POST['userid'];


$like = 1;

$uselect = "SELECT * FROM student_detail WHERE id = $userid";
$ufire = mysqli_query($conn,$uselect);
$data = mysqli_fetch_array($ufire);
$name = $data['name'];
$image = $data['profile'];



 
       $query = "select * from postreaction where post_id = $postid and user_id = $userid and post_like = 1";
       $fire = mysqli_query($conn,$query);
       $number = mysqli_num_rows($fire);

      if($number > 0){
          $delete = "delete from postreaction where post_id = $postid and user_id = $userid and post_like = 1";
          $deletefire = mysqli_query($conn,$delete);
           $ndelete = "delete from notification where post_id = $postid and id = $userid and action = 1";
           $ndeletefire = mysqli_query($conn,$ndelete);
          if($deletefire){
            echo numberLikes($postid);
             
          }
      }else{
          
          $insert = "INSERT INTO `postreaction`(`post_id`, `user_id`, `post_like`,`status`) VALUES ($postid,$userid,$like,$like)";
          $tfire = mysqli_query($conn,$insert);
          if($tfire){
              echo numberLikes($postid);
              $Ninsert = "INSERT INTO `notification`(`name`,`id`, `post_id`, `action`,`profile`) VALUES ('$name',$userid,$postid,1,'$image')";
              $Nfire = mysqli_query($conn,$Ninsert);
             
          }
          
      }
  
  exit(0);
?>

   <?php 



 function numberLikes($id){
     global $conn;
     global $action;
   // $sid = $_SESSION['uid'];
   //  global $sid;
     $rating = array();
     $query = "select  * from postreaction where post_id = $id and post_like = 1";
         $fire = mysqli_query($conn,$query);
         $num = mysqli_num_rows($fire);
     
     
    // $noti = "SELECT * FROM postreaction inner JOIN post ON postreaction.post_id = post.post_id WHERE user_id = 62";
    // $nfire = mysqli_query($conn,$noti);
    // $notinum = mysqli_num_rows($nfire);
         $rating = [ 'number' => $num,
                     'id'  => $id,
                    
                  ]; 
    return json_encode($rating);
     
     
 }







?>

 




















 




