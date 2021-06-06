<?php 

include("../../../databases/dbconn.php");
error_reporting(0);
 $cid = $_POST['cid'];
 $output ='';
 
 $query = "SELECT * FROM commentreply inner JOIN student_detail ON commentreply.id = student_detail.id where commentid = $cid ORDER BY replyid ASC";

$fire = mysqli_query($conn,$query);
$num = mysqli_num_rows($fire);
while($row = mysqli_fetch_array($fire)){
            $pic = $row['profile'];
             $array = explode('/',$pic);
             $picname = $array['3'];
    
   // echo $row['name']."<br>".$row['reply'];
    
    
    $output .='
    
    <div class="container mainreply'.$row['replyid'].'  pl-3">
   
       <div class="pic" style="width:40px; height:40px;">
         <a href="../../about.php?id='.$row['id'].'"><img src="../../About/profile_pic/'.$picname.'" style="width:40px; height:40px;" alt=""></a>
       </div>
      
        
        <div class="row ">
      
         <div class="col-8 comment-text mx-5">
            <a href="../../about.php?id='.$row['id'].'" style=""><h6 class="pl-1 pt-1 text-capitalize">'.$row['name'].'</h6></a>
           
          
            
             <p class="">'.$row['reply'].'  </p>
           
         </div>
           
          <div class="col-4">
                  <span class="replymore ml-5" data-id="'.$row['replyid'].'" style="cursor:pointer"> more </span>
                  <ul class="nav p-2 cmntreplymore'.$row['replyid'].' d-none" style="z-index:1; border:2px solid white; width:8rem; list-style:none; color:white; position:absolute;">
                  
                  <li style="border-right:2px solid white; cursor:pointer" class="px-2 replyedit"  data-id="'.$row['replyid'].'"> edit </li>&nbsp;&nbsp;
                 
                  <li style="cursor:pointer" class="replydlt"  data-id="'.$row['replyid'].'"> delete </li>
                  
                  </ul>
                  
               </div>
           </div>
         </div>
        
        <div class="replyeditbox'.$row['replyid'].' mx-5 d-none">
       <textarea name="editreply"    class="ml-5 replytext'.$row['replyid'].'"></textarea>           
       <button class="btn btn-sm btn-success replysavebtn" data-id="'.$row['replyid'].'" data-cid="'.$cid.'">save</button>
      </div>
    
    ';


}



echo $output;







?>



