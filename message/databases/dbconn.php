<?php 
 error_reporting(0); 
$conn = mysqli_connect('localhost','root','','linkdmeknit');  

if($conn == true){
  
}
else{
    echo("connection failed !!");
}
  

function fetch_user_last_activity($user_id,$conn){
    $query = "select * from login_status where id = $user_id ORDER BY last_login DESC LIMIT 1";
    $fire = mysqli_query($conn,$query);
    
    while($data = mysqli_fetch_array($fire)){
        return $data['last_login'];
    }
}

function fetch_user_chat($fromid, $toid ,$conn){
    $output = '';
    $query = "SELECT * FROM message WHERE (rid = $toid AND id = $fromid ) OR (rid = $fromid AND id = $toid)";
    
    $fire = mysqli_query($conn, $query);
    
    while($data = mysqli_fetch_array($fire)){
        $time = $data['msg_time'];
        $array = explode('.',$time);
        $tm = $array['0'];
        if($data['id'] == $fromid){
            
             $output .= '
    <div class="container-fluid my-2">
    <div class="row text-right align-item-right">
       <div class="pl-md-5 col-6 col-md-6 sender" style="margin-left:52%;">
           
           <p  class="p-2 px-md-4 px-2 pb-2 text-left" style="float:right; background:#ff9933; border-radius:200px;">'.$data['msg'].' </p>
                 
            
        
           
        </div>
    </div>
</div>

        
        
        
        ';
        }else{
           
            $output .= '
         <div class="container-fluid my-2">
    <div class="row">
       <div class="pr-5 col-md-6">
           
         
            
          
           
              <a href="#" style="width:30px; height:30px; border-radius:200px;"><img src="../About/profile_pic/'.fetch_name($toid,$conn).'" alt="" style="width:30px; height:30px; border-radius:200px;"></a><br>
               
               <p  class="p-2 px-4 pb-2 ml-4 text-left" style="float:left; background:lightyellow; border-radius:200px; ">'.$data['msg'].'</p>
               
            
          
           
        </div>
    </div>
</div>
        
        
        
        ';
            
        }
     
    }
    //$query = "UPDATE message SET status = 0 where id = $fromid AND rid = $toid AND status = 1";
    //$fire = mysqli_query($conn,$query);
    
   return $output; 
    
}


function fetch_name($toid,$conn){
    
    $query = "SELECT * FROM student_detail WHERE id = $toid";
    $fire = mysqli_query($conn,$query);
    while($data = mysqli_fetch_array($fire)){
        $profile = $data['profile'];
        $array = explode("/",$profile);
        $picname = $array['3'];
    }
    return $picname;
}

function count_unseen_msg($fromid,$toid,$conn){
    $output ='';
    
    $query = "SELECT * FROM message WHERE rid = $toid AND id = $fromid AND status = 1";
    $fire = mysqli_query($conn,$query);
    
    $count = mysqli_num_rows($fire);
    
    if($count > 0){
        $output .='<span class="text-primary">'.$count.'</span>';
        
    }
    return $output;
        
}










?>




