<?php  
include("../../../databases/dbconn.php");
  error_reporting(0);
  $postid = $_POST['postid'];
  $output = '';

    


  $query = "SELECT * FROM postcomment inner JOIN student_detail ON postcomment.id = student_detail.id where post_id = $postid ORDER BY  commentid DESC" ;
 $fire = mysqli_query($conn,$query);
 $num = mysqli_num_rows($fire);
 while($row = mysqli_fetch_array($fire)){
            $pic = $row['profile'];
             $array = explode('/',$pic);
             $picname = $array['3'];
   
      
     
     $output .= '
     <div class="container maincmnt'.$row['commentid'].'">
       <div class="pic">
           <a href="../../about.php?id='.$row['id'].'"><img src="../../About/profile_pic/'.$picname.'" alt=""><a/>
       </div>
        <div class="row ">
         <div class="col-8 comment-text mx-5">
            <a href="../../about.php?id='.$row['id'].'" style="color:black;"><h5 class="pl-1 pt-1 text-capitalize">'.$row['name'].'</h5></a>
             <p class="">'.$row['comment'].'</p>
             
         </div>
          <div class="row comment-action mx-5">
              <div class="col-2">
                 
              </div>
               <div class="col-3 d-none">
                   like
               </div>
                  <div class="col-4 reply" style="cursor:pointer" data-id="'.$row['commentid'].'">
                   reply
               </div>
               
            <div class="col-4">
                  <span class="more" data-id="'.$row['commentid'].'" style="cursor:pointer"> more </span>
                  <ul class="nav p-2 cmntreply'.$row['commentid'].' d-none" style="z-index:1; border:2px solid white; width:8rem; list-style:none; color:white; position:absolute;">
                  
                  <li style="border-right:2px solid white; cursor:pointer" class="px-2 cmntedit"  data-id="'.$row['commentid'].'"> edit </li>&nbsp;&nbsp;
                 
                  <li style="cursor:pointer" class="cmntdlt"  data-id="'.$row['commentid'].'"> delete </li>
                  
                  </ul>
                  
               </div>
           </div>
         </div>
         </div>
    <div class="editbox'.$row['commentid'].' mx-5 d-none">
    <textarea name="editcmnt"    class="ml-5 cmnttext'.$row['commentid'].'"></textarea>           
    <button class="btn btn-sm btn-success savebtn" data-id="'.$row['commentid'].'">save</button>
    </div>
         ';
     
     $output .= '
      <div class="creply'.$row['commentid'].' d-none ">
       <div class="fetchreply'.$row['commentid'].' ml-5">
       
       </div>
     
     ';
     
     $output .='
    
     
 
      
    <div class="container ml-2 my-3">
         <div class="row  ml-5">
             <div class="col-6 ml-2">
                 <textarea name="reply" class="replybox replydata'.$row['commentid'].'" id="" cols="18" rows="1" placeholder="add a reply..."></textarea>
             </div>
             <div class="col-4 ml-4 mt-1">
                 <button class="btn btn-success btn-sm replybtn" data-id="'.$row['commentid'].'">reply</button>
             </div>
         </div>
     </div>
</div>

 
     
     
     
     
     ';
 
 
 }
  

 
  $rep = "SELECT * FROM commentreply WHERE postid = $postid";
   $rfire = mysqli_query($conn,$rep);
    $rnum = mysqli_num_rows($rfire);

 
$tnum = $num + $rnum;
     
       

    $result = [
        'number' => $tnum,
        'comment' => $output
    ];

echo json_encode($result);
    
    
    



?>

