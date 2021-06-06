
<?php  include('databases/dbconn.php');
       
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:Login/index.php');
}
 $id=$_SESSION['uid'];
  $query = "select * from student_detail where id = $id";
  $fire = mysqli_query($conn,$query);
   $data = mysqli_fetch_array($fire);
   
?>
<?php  
   error_reporting(0);
    
   $friend = "select * from friend where status = 0";
   $fire = mysqli_query($conn,$friend);
   $reqid = array();
   while($row = mysqli_fetch_array($fire)){
       if($_SESSION['uid'] == $row['acid']){
         $user = $row['reid']." "; 
         array_push($reqid,$user); 
      }
   }
  
  $number = count($reqid);
  
  for($i=0;$i<$number;$i++){
                $num = $reqid[$i];
                $req = "select * from student_detail where id=$num";
                $fire = mysqli_query($conn,$req);
                while($du = mysqli_fetch_array($fire)){
                  
                }
             }
?>
<?php

  $picquery = "select * from student_detail where id =$id";
  $picfire = mysqli_query($conn,$picquery);
  $picdata = mysqli_fetch_array($picfire);
  $pic = $picdata['profile'];
  $array = explode('/',$pic);
  $picname = $array['3'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <meta name="description" content="A large community of student from all over the world.Linkdme is helping one student to connect with other student.">
   <meta name="keywords" content="Linkdme,facebook,instagram,twitter,linkeden,social media,engineering,student">
 
    <title>Linkdme</title>
    <!--bootstrap css-->
    <link rel="stylesheet" href="source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/home/noti.css">
    <link rel="stylesheet" href="css/home/home.css">
    <script>
    var mainid = "<?php echo $_SESSION['uid'];  ?>";
    </script>
    <style>
        .search:focus{
            outline: none;
        }
        .search:focus ~ label{
            color:white;
            
        }
        
    
    </style>
     
</head>

<body>
<?php include("navbar/navbar.php")?>

 <div class="my-5 " style="border-top:2px solid #ccc;">
 <div class="mt-3 ">
 <div class="container ">
 <div class="row mx-md-5">
 <div class="col-4  px-md-5">
 <h5 class="text-capitalize mx-3 mx-md-5">notification</h5>
     </div>
     <div class="col-8 pl-5 px-md-5">
 <a href="#" class="ml-5 pl-2 allread" style="text-decoration:none;">mark all as read</a>
     </div>
     </div>
     </div>
     </div>  
 <?php 
    
    
    $pids = array();
   
     $pquery = "SELECT * FROM post WHERE id = $id";
     $pfire = mysqli_query($conn,$pquery);
    
     while($pdata = mysqli_fetch_array($pfire)){
         $postid = $pdata['post_id'];
         array_push($pids,$postid);
     }
    $pnum = count($pids);
    for($i=0;$i<$pnum;$i++){
        $pid = $pids[$i];
        $sub_query = "SELECT * FROM `notification` WHERE post_id = $pid AND id != $id  ORDER BY notif_id DESC";
        $sub_fire = mysqli_query($conn,$sub_query);
        while($udata = mysqli_fetch_array($sub_fire)){
            $uid = $udata['id'];
            $pic = $udata['profile'];
            $array = explode('/',$pic);
            $picname = $array['3'];

           
    

    ?>
    
 <div class="one col-md-6 mx-auto  p-1 
    
    <?php if($udata['status'] == 0){ ?>
     activ
    <?php } ?>
   ">
     <div class="container-fluid ">
        <div class="row">
          <div class="col-2 profile">
              <a href="About/about.php?id=<?php echo $uid; ?>">
                  <img src="About/profile_pic/<?php echo $picname; ?>" class="img-responsive" style="width:50px; height:50px; border-radius:200px;" alt="">
              </a>
          </div>
          <?php if($udata['action'] == 1){ ?>
              <div class="col-10" >
              <a href="post/comment/comment.php?id=<?php echo $udata['post_id']; ?>" class="liked" data-id="<?php echo $udata['notif_id']; ?>">
               <p><b><?php echo $udata['name']; ?> </b>like your post</p>
              </a>
            </div> 
            <?php } elseif($udata['action'] == 2){ ?>
          
             <div class="col-10">
              <a href="post/comment/comment.php?id=<?php echo $udata['post_id']; ?>&comment_id=<?php echo $udata['cid']; ?>" class="liked" data-id="<?php echo $udata['notif_id']; ?>">
               <p><b><?php echo $udata['name']; ?> </b>comment on your post</p>
              </a>
            </div> 
            
            <?php } else { ?>
               <div class="col-10">
              <a href="post/comment/comment.php?id=<?php echo $udata['post_id']; ?>&comment_id=<?php echo $udata['cid']; ?>" class="liked" data-id="<?php echo $udata['notif_id']; ?>">
               <p><b><?php echo $udata['name']; ?> </b>reply a comment on your post</p>
              </a>
            </div> 
            <?php } ?>
        </div>
         
     </div>
 </div>
 
<?php } }  ?>
  
</div>
           


    <script src="source/js/jquery-3.3.1.js"></script>
    <script src="source/js/bootstrap.min.js"></script>
    <script src="source/js/all.min.js"></script>
    <script src="js/home/notification.min.js"></script>
</body>

</html>
    
    