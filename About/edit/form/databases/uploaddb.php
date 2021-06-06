<?php 

include("../../../../databases/dbconn.php");
session_start();

if(isset($_POST['image'])){
    $sid = $_SESSION['uid'];
    $id = $_POST['id'];
    $data = $_POST['image'];
    $img_1 = explode(';',$data);
    $img_2 = explode(',',$img_1[1]);
    $data = base64_decode($img_2[1]);
    $imageName =time() . '.png';
    $pcstore = '../../../profile_pic/'.$imageName;
    $database = '../../../profile_pic/&'.$imageName;
    file_put_contents($pcstore,$data);
    
         $query = "INSERT INTO `profile_pic`(`pid`, `image`) VALUES ($id,'$database')";
      
        $fire = mysqli_query($conn,$query);
      
  
      if($fire){
      header("Location:../upload.php?id=$id");
          
      /*
          echo '<img src="'.$pcstore.'" alt="">';
          $dpcstore = '../../../../home/post/img/'.$imageName;
          $ddatabase = 'img/'.$imageName;
          file_put_contents($dpcstore,$data);
          date_default_timezone_set("Asia/Kolkata");
          $time = date('h:i:s A',time());
         $pquery = "INSERT INTO `post`(`id`,`post_img`,`time`) VALUES ($id,'$ddatabase','$time')";
      
        $pfire = mysqli_query($conn,$pquery);
        */
     }
      else{
          echo "";
      }
  
}






?>
