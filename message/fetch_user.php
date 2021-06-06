
<?php 
include("databases/dbconn.php");

session_start();
$id = $_SESSION['uid'];
 $output ='';
 
   
   $friend = "select * from friend ORDER BY id DESC";
   $fire = mysqli_query($conn,$friend);
   $frindid = array();
   while($row = mysqli_fetch_array($fire)){
      
       if(($row['reid'] == $id || $row['acid'] == $id) && $row['status'] == 1){
          $reid = $row['reid']." "; 
          $acid = $row['acid']." "; 
           
         array_push($frindid,$reid); 
         array_push($frindid,$acid);
       
           }else{
           if( ($row['reid'] == $id || $row['acid'] == $id) && $row['status'] == 1){
          $reid = $row['reid']." "; 
          $acid = $row['acid']." "; 
           
         array_push($frindid,$reid); 
         array_push($frindid,$acid);
           
           
       }
       }
       
   }
  
  $number = count($frindid);
  
  for($i=0;$i<$number;$i++){
                $num = $frindid[$i];
                $req = "select * from student_detail where id=$num && id !=$id";
                $fire = mysqli_query($conn,$req);
                while($du = mysqli_fetch_array($fire)){
                    $pic = $du['profile'];
                    $array = explode('/',$pic);
                    $picname = $array['3'];
                   
                     
                

$status ='';
$current_time = strtotime(date('Y-m-d H:i:s').'-10 second');
$current_time = date('Y-m-d H:i:s', $current_time);
$user_last_activity = fetch_user_last_activity($du['id'],$conn);
if($user_last_activity > $current_time){
    $status .= '<span class="label label-success text-success"><i class="fas fa-globe-asia"></i></span>';
}else{
    $status .= '<span class="label label-danger text-danger"></span>';
}                    


//$output .= '
//
//   <div class="container my-2 " style="background:white; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
//
//    <div class="row  p-1">
//<div class="col-2">
//            <a href="../../About/about.php?id='.$du['id'].'"><img src="../../About/profile_pic/'.$picname.'" alt="" style="width:70px; height:70px; border-radius:200px; text-decoration:none;" class="mx-2"></a>
//   </div>
//               <div class="col-8 pl-4">
//            <a href="../../About/about.php?id='.$du['id'].'" class="text-capitalize " style="color:black; text-decoration:none;"><h6><strong>'.$du['name'].' '.count_unseen_msg($du['id'],$_SESSION['uid'],$conn).'</strong></h6> </a>
//           <p>'.$status.'</p>
//        
//           
//            <a href="msgbox.php?id='.$du['id'].'" class="  btn btn-info btn-sm start_chat" data-touserid="'.$du['id'].'" data-tousername="'.$du['name'].'">start chat</a>
//            </div>
//    </div>
//        
//
//
//
//
//    </div>
//</div>
//
//  
//  ';
        $output .= '
            <li class="py-1" style=" display:block;">
                      <a href="msg.php?id='.$du['id'].'" class="p-2 start_chat" style="display:block; text-decoration:none;" data-touserid="'.$du['id'].'">
                       <img src="../About/profile_pic/'.$picname.'" alt="" style="width:40px; height:40px; border-radius:200%; background:#ff9933;"> 
                       <span class="px-3 text-capitalize" style="font-size:1.2rem; color:black;">'.$du['name'].' <span class="badge badge-dark ml-5 ">'.count_unseen_msg($du['id'],$_SESSION['uid'],$conn).'</span></span>
                    </a>
                   </li>
        
        
        ';            
                }
  }
echo $output;

?>

