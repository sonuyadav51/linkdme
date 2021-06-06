<?php   

include("databases/dbconn.php");

$id = $_POST['userid'];
 $output = '';
$query = "select * from student_detail where id = $id";
$fire = mysqli_query($conn,$query);

$data = mysqli_fetch_array($fire);


$output .= '
  
    <div class="fixed-bottom p-2" style="background:lightblue; border-top:2px solid white;">
    <div class="container mr-md-5">
    <div class="row">
 
     <div class="col-8 col-md-4 ml-md-5">
        <textarea name="chat_msg_'.$data['id'].'" id="chat_msg_'.$data['id'].'" class="form-control ml-md-5" placeholder="write here..." style="border:2px solid #ccc;" required></textarea>
       </div>
          <div class="col-4 col-md-4 mx-md-auto">
        <button type="button" class="btn btn-info send_chat mt-2 ml-md-4" name="send_chat" id="'.$data['id'].'">send</button></div>
    
    </div>
    </div>
    </div>

';

    


echo $output;





?>
 


       