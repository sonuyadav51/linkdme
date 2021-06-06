<?php   
include("../dbconn.php");
session_start();
error_reporting(0);
$id = $_POST['mainid'];
$pstid = $_POST['postid'];
$Sid = $_SESSION['uid'];
$output ='';
$array = array();
$userarray = array();
$uuserarray = array();
$Carray = array();
$Cuserarray = array();
$Cuuserarray = array();
//============================== ALL STUFF FOR LIKE NOTIFICATION ====================================//
$query = "SELECT * FROM post  WHERE id = $id";
$fire =mysqli_query($conn,$query);
while($data = mysqli_fetch_array($fire)){
    $postid = $data['post_id'];
    array_push($array,$postid);
}
$number = count($array);

for($i=0;$i<=$number;$i++){
    $ids = $array[$i];
    
    $sub_query = "SELECT * FROM `postreaction` WHERE post_id = $ids AND status = 1 AND  user_id !=$Sid ORDER BY id DESC";
    $sub_fire = mysqli_query($conn,$sub_query);
    while($not = mysqli_fetch_array($sub_fire)){
       $user =  $not['user_id'];
       array_push($userarray,$user);
   }
    $usernumber = count($userarray); //NUMBER OF NOTIFICATION LIKE
    $usub_query = "SELECT * FROM `postreaction` WHERE post_id = $ids AND user_id !=$Sid ORDER BY id DESC";
    $usub_fire = mysqli_query($conn,$usub_query);
    while($unot = mysqli_fetch_array($usub_fire)){
       $uuser =  $unot['user_id'];
       array_push($uuserarray,$uuser);
   }
   
}
$uusernumber = count($uuserarray); // USER ID WHO LIKED
//echo $usernumber;
for($i=0;$i<=$uusernumber;$i++){
    $uuserids = $uuserarray[$i];
    
    $usub_query = "SELECT * FROM `student_detail` WHERE id = $uuserids AND id != $Sid ORDER BY id DESC";
    $usub_fire = mysqli_query($conn,$usub_query);
   while($usernot = mysqli_fetch_array($usub_fire)){
       $pic = $usernot['profile'];
       $picarray = explode('/',$pic);
       $picname = $picarray['3'];
       //echo $usernot['name'];
        $output .= '
        <table class="table-border">
        <tr>
         
         
         <td><a href="home.php#single'.$pstid.'" class="noti1"><img src="About/profile_pic/'.$picname.'" alt=""></a>&nbsp;&nbsp;</td>&nbsp;
         <td><a href="home.php#single'.$pstid.'" class="noti1"><span class="text-capitalize text-danger"> '.$usernot['name'].'</span> likes your post</a></td>
       </tr>
        </table>
        
        
        ';
      
   }
   
}
$output .= '<hr>
           <h4>comment notification</h4>
             <hr>';
// ========================================== ALL STUFF FOR COMMENT NOTIFICATION ==============================//
$Cquery = "SELECT * FROM post  WHERE id = $id";
$Cfire =mysqli_query($conn,$Cquery);
while($Cdata = mysqli_fetch_array($Cfire)){
    $Cpostid = $Cdata['post_id'];
    array_push($Carray,$Cpostid);
}
$Cnumber = count($Carray);

for($i=0;$i<=$Cnumber;$i++){
    $Cids = $Carray[$i];
    
    $Csub_query = "SELECT * FROM `postcomment` WHERE post_id = $Cids AND status = 1 AND  id !=$Sid ORDER BY commentid DESC";
    $Csub_fire = mysqli_query($conn,$Csub_query);
    while($Cnot = mysqli_fetch_array($Csub_fire)){
       $Cuser =  $Cnot['user_id'];
       array_push($Cuserarray,$Cuser);
   }
    $Cusernumber = count($Cuserarray); //NUMBER OF NOTIFICATION LIKE
    $Cusub_query = "SELECT * FROM `postcomment` WHERE post_id = $Cids AND id !=$Sid ORDER BY commentid DESC";
    $Cusub_fire = mysqli_query($conn,$Cusub_query);
    while($Cunot = mysqli_fetch_array($Cusub_fire)){
       $Cuuser =  $Cunot['id'];
       array_push($Cuuserarray,$Cuuser);
   }
   
}
$Cuusernumber = count($Cuuserarray); // USER ID WHO LIKED

//echo $usernumber;
for($i=0;$i<=$Cuusernumber;$i++){
    $Cuuserids = $Cuuserarray[$i];
    
    $Cusub_query = "SELECT * FROM `student_detail` WHERE id = $Cuuserids AND id != $Sid ORDER BY id DESC";
    $Cusub_fire = mysqli_query($conn,$Cusub_query);
   while($Cusernot = mysqli_fetch_array($Cusub_fire)){
       $Cpic = $Cusernot['profile'];
       $Cpicarray = explode('/',$Cpic);
       $Cpicname = $Cpicarray['3'];
       //echo $usernot['name'];
        $output .= '
        <table class="table-border">
        <tr>
         
         
         <td><a href="#single'.$pstid.'" class="noti1"><img src="About/profile_pic/'.$Cpicname.'" alt=""></a>&nbsp;&nbsp;</td>&nbsp;
         <td><a href="#single'.$Cpostid.'" class="noti1"><span class="text-capitalize text-danger"> '.$Cusernot['name'].'</span> comment on  your post</a></td>
       </tr>
        </table>
        
        
        ';
      
   }
   
}
$finalusernumber = $Cusernumber + $usernumber;

$json= [
     'output' => $output,
    
    'number' => $finalusernumber
];

echo json_encode($json);






?>
