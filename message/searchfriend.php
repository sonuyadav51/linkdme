
<?php 
include("databases/dbconn.php");

session_start();
$id = $_SESSION['uid'];
 $search = $_POST['fvalue'];
 $output='';
 
   
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
                $req = "select * from student_detail where id=$num && id !=$id && name LIKE '%".$search."%'";
                $fire = mysqli_query($conn,$req);
                while($du = mysqli_fetch_array($fire)){
                    $pic = $du['profile'];
                    $array = explode('/',$pic);
                    $picname = $array['3'];
                   
                    
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