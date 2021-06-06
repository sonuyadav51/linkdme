<?php


include("databases/dbconn.php");
session_start();
$id = $_POST['userid'];
$senderid = $_SESSION['uid'];
$msg = mysqli_real_escape_string($conn,trim($_POST['msg']));
$status = 1;
$output ='';
$query = "INSERT INTO message (id,rid,msg,status,hstatus) VALUES ($senderid,$id,'$msg',$status,1)";
$fire = mysqli_query($conn,$query);

if($fire){
    // $sub_query = "SELECT * FROM message inner JOIN student_detail ON message.id = student_detail.id WHERE id = $senderid  // AND rid = $id ORDER BY msg_time DESC";
     // $sfire = mysqli_query($conn,$sub_query);
  //  while($data = mysqli_fetch_array($sfire)){
        
  /*  
 $output .= '
 
        <div class="container ">
        <!--======RECIEVE CONTAINER=====------>
            <div class="sender px-2">
                <div class="row">
                     <img src="../img/img.png" alt="" style="width:40px; height:40px;" class="mx-2">
                    <div class="col-10 mt-4 jumbo">
                        <h5>'.$data['name'].'</h5>
                        <p class="msgg">'.$data['msg'].'</p>
                    </div>
                </div>
            </div>
        </div>
        <!--======RECIEVE CONTAINER END=====------>
   
 
 
 
 ';
 */
    
     echo fetch_user_chat($_SESSION['uid'],$id,$conn) ;
    }
   
else{
    
}


?>