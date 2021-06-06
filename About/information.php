<!DOCTYPE html>
<?php
   include('../databases/dbconn.php');
     session_start();
     $uid =$_GET['id'] ;
     $sesid = $_SESSION['uid'];
    
   if(!isset($_SESSION['uid'])){
       header('Location:../Login/');
   }
    
?>

<?php 
 error_reporting(0);

 
   $query = "SELECT * FROM work WHERE wid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $data = mysqli_fetch_array($fire);


   $query = "SELECT * FROM edu WHERE id=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $edudata = mysqli_fetch_array($fire);


   $query = "SELECT * FROM address WHERE clid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $cldata = mysqli_fetch_array($fire);


   $query = "SELECT * FROM haddress WHERE hid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $hdata = mysqli_fetch_array($fire);
   

   $query = "SELECT * FROM `relation` WHERE rid = $uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $rdata = mysqli_fetch_array($fire);

   $query = "SELECT * FROM profile_pic WHERE pid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $picdata = mysqli_fetch_array($fire);

    $newpic = $picdata['image'];
    $array = explode('&',$newpic);
    $new = $array[1];
    $newid = $picdata['pid'];
//DANGER ===========================================//DANGER///////======================================//
     $update = "UPDATE `student_detail` SET `profile`='../About/profile_pic/$new' WHERE id=$newid ";
     $ufire = mysqli_query($conn,$update);
     $query = "select * from student_detail where id =$uid";
     $fire = mysqli_query($conn,$query);
     $udata = mysqli_fetch_array($fire);


   $eduquery = "SELECT * FROM basicedu WHERE beid=$uid ORDER BY id DESC";
   $edufire = mysqli_query($conn,$eduquery);
   $bedata = mysqli_fetch_array($edufire);
 
   $query = "SELECT * FROM contact WHERE conid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $condata = mysqli_fetch_array($fire);
    
   $query = "SELECT * FROM skill WHERE skid=$uid";
   $skillfire = mysqli_query($conn,$query);
   

   

   $query = "SELECT * FROM achivement WHERE achivid=$uid";
   $achivfire = mysqli_query($conn,$query);
  

    $query = "SELECT * FROM project WHERE proid=$uid";
    $profire = mysqli_query($conn,$query);
  
   $query = "SELECT * FROM project WHERE proid=$uid";
   $langfire = mysqli_query($conn,$query);
   $langdata = mysqli_fetch_array($langfire);

    

?>


<html lang="en">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <meta name="description" content="A large community of student from all over the world.Linkdme is helping one student to connect with other student.">
   <meta name="keywords" content="Linkdme,facebook,instagram,twitter,linkeden,social media,engineering,student">
 
    <title><?php echo $udata['name']; ?></title>
    <!--bootstrap css-->
    <link rel="stylesheet" href="../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="../css/about/information.css">
    <link rel="stylesheet" href="../css/home/home.css">
    <script>
      var userid = "<?php echo $_SESSION['uid'];  ?>";
    
    </script>
    
</head>

<body>
<div class="container " style="background:#ff9933;">
    <div class="row">
        <div class="col-2">
            <a href="../about.php?id=<?php echo $uid; ?>" style="color:white; text-decoration:none;"><i class="fas fa-arrow-left"></i></a>
        </div>
         <div class="col-8">
           <h5 class="text-center text-capitalize">Linkdme</h5>
        </div>
        
    </div>
</div>
<div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header nh">
                     <h6 ><i class="fas fa-user"></i>&nbsp;&nbsp; Name &nbsp;<i class="fas fa-angle-down"> </i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body n d-none">
                    <p class="text-capitalize"><?php echo $udata['name']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php if($_SESSION['uid'] == $uid){ ?>
 <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header mh">
                     <h6><i class="fas fa-mobile"></i>&nbsp;&nbsp; Mobile &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="only me"><i class="fas fa-lock"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body m d-none">
                    <p><?php echo $udata['roll_no']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <?php } ?>
  <?php if($_SESSION['uid'] == $uid){ ?>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header eh">
                     <h6><i class="fas fa-envelope"></i>&nbsp;&nbsp; Email &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="only me"><i class="fas fa-lock"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body e d-none">
                    <p><?php echo $udata['email']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <?php } ?>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header gh">
                     <h6><i class="fas fa-mars"></i>&nbsp;&nbsp; Gender &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body g d-none">
                    <p><?php echo $udata['gender']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header bh">
                     <h6><i class="fas fa-birthday-cake"></i>&nbsp;&nbsp; Birthday &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body b d-none">
                    <p><?php echo $udata['dob']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header rh">
                     <h6><i class="fas fa-heart"></i>&nbsp;&nbsp; Relationship &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-4" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body r d-none">
                    <p><?php echo $rdata['relation']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header lh">
                     <h6><i class="fas fa-language"></i>&nbsp;&nbsp; Language &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-4" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body l d-none">
                    <p><?php echo $langdata['other']; ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header  sh">
                     <h6><i class="fas fa-gem"></i>&nbsp;&nbsp; Skill  &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body s d-none">
                    <table class="table table-bordered">
                      <?php while($sdata = mysqli_fetch_array($skillfire)){ ?>
                       <tr>
                           <td><?php echo $sdata['top']; ?></td>
                       </tr>
                       
                        <?php } ?>
                        
                    </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
   <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header ah">
                     <h6><i class="fas fa-trophy"></i>&nbsp;&nbsp; Achivement  &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-4" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia"></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body a d-none">
                    <table class="table table-bordered">
                       <?php while($adata = mysqli_fetch_array($achivfire)){ ?>
                       <tr>
                           <td style="overfow:scroll"><?php echo $adata['achivement']; ?></td>
                       </tr>
                       <?php } ?>
                        
                        
                    </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
   <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header ph">
                     <h6><i class="fas fa-project-diagram"></i>&nbsp;&nbsp; Projects  &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia" ></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body p d-none">
                    <table class="table table-bordered">
                       <?php while($pdata = mysqli_fetch_array($profire)){ ?>
                       <tr>
                           <td><?php echo $pdata['project']; ?></td>
                       </tr>
                       
                         <?php } ?>
                        
                    </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
  <div class="container mb-2">
     <div class="row">
         <div class="col-12 col-md-6 mx-md-auto">
             <div class="card">
                 <div class="card-header jh">
                     <h6><i class="fas fa-clock"></i>&nbsp;&nbsp; Join date &nbsp;<i class="fas fa-angle-down"></i> <?php if($_SESSION['uid'] == $uid){ ?> &nbsp;<small class="ml-5 pl-5" data-toggle="tooltip" data-placement="top" title="public"><i class="fas fa-globe-asia" ></i></small> <?php } ?> </h6>
                 </div>
                 <div class="card-body j d-none">
                    <p><?php $date =  $udata['joindate']; 
                        $array = explode(" ",$date);
                        
                        echo $array['0'];
                        ?></p>
                 </div>
             </div>
         </div>
     </div>
 </div>
   <!--======================POST SECTION START --==========================--->
  <div class="container mt-3 col-md-4 mx-md-auto" style="background:#ff9933;">
      <div class="row">
          <div class="col-10">
              <h4>post</h4>
          </div>
      </div>
  </div>
   
   <?php 
    
      $postquery = "SELECT * FROM post inner JOIN student_detail ON post.id = student_detail.id WHERE student_detail.id = $uid ORDER BY post_id DESC";
      $postfire = mysqli_query($conn,$postquery);
       while($row = mysqli_fetch_array($postfire)){ 
          
             $pic = $row['profile'];
             $array = explode('/',$pic);
             $picname = $array['3'];
   
  ?> 


<div class="hello<?php echo $row['post_id']; ?> d-none my-4">
    <div class="container">
    <div class="row mx-auto">
     <div class="jumbotron mx-auto sms" style="background:white;">
       <h6 class="test-center text-capitalize">are you sure want to delete this post</h6>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button class="btn btn-danger yes" data-id="<?php echo $row['post_id']; ?>">
            Delete
        </button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button class="btn btn-outline-info notde" data-id="<?php echo $row['post_id']; ?>">
            Cancel
        </button>
       
     </div>
        </div>
     </div>
 </div>
 
      <section class="mb-2 first-post-container  col-md-4 mx-md-auto "  style="overflow:hidden;">
       <div class="container-fluid" style="width:100%;">
           <div class="row">
               <div class="col-12 main_post_row" data-id="<?php echo $row['post_id']; ?>">
                  <div class="pt-2">
                   <div class="post-heading profile-pic" >
                      <a href="../about.php?id=<?php echo $row['id']; ?>"><img src="profile_pic/<?php echo $picname ; ?>" style="margin-left:-20px;"></a>
                      <a href="../about.php?id=<?php echo $row['id']; ?>" class="text-capitalize" style="margin-left:-5px;"><?php echo $row['name']; ?></a> 
                       
                
               
              
               
                          <p><?php echo $row['time']; ?></p>
                         <div align="right" class="bg-primary">
                          <span class="post-more"  data-id="<?php echo $row['post_id']; ?>">...</span>
                          <span class="caret<?php echo $row['post_id']  ?> caret d-none"></span>
                           <ul class="postedit<?php echo $row['post_id']  ?> editpost d-none p-2 text-left" align="" style="z-index:1;">
                               <?php 
                                $carray = array();
                                 $cquery = "SELECT * FROM post WHERE id = $sesid";
                                  $cfire = mysqli_query($conn,$cquery);
                                  while($cdata = mysqli_fetch_array($cfire)){
                                      $pst_id = $cdata['post_id'];
                                      array_push($carray,$pst_id);
                                  }
                                  $cnum = count($carray);
                                  for($i=0;$i<$cnum;$i++){
                                         $pstids = $carray[$i];
                                      
                                      if($row['post_id'] == $pstids){
                                  
                               
                               ?>
                               
                               
                               <li><a href="../post/edit/editpost.php?postid=<?php echo $row['post_id']  ?>">edit post</a></li>
                               <li><a href="#"  data-id="<?php echo $row['post_id']; ?>" class="delete">delete post</a></li>
                               <?php }} ?>
                               <li class="d-none"><a href="#">report post</a></li>
                             
                            </ul>
                            </div>
                          
                   </div>
                   <div class="main_post" data-id="<?php echo $row['post_id']; ?>">
                     <p class="text-left" style="font-size:18px; margin-left:-9px;"><?php echo $row['post']; ?></p>
                     
                     <img src="../post/<?php echo $row['post_img']; ?>" alt="" class="img-responsive 
                     
                     <?php if($row['post_img'] == "img/"): ?>
                     
                     d-none
                     <?php endif; ?>
                     
                     " style="width:121%; margin-left:-30px; border-radius:0px;">
                     <!--
                     <video controls id="video" style="width:117%; margin-left:-30px;" class="d-none">
                        <source src="../home/post/<?php echo $row['video']; ?>" type="video/mp4">
                         Your browser does not support the video tag.
                    </video>
                     -->
                     
                     
                   </div>
                    <div class="row likenumber pt-4">
                        <div class="col-6">
                            
                            <p><a href="../post/liker.php?postid=<?php echo $row['post_id']; ?>" style="text-decoration:none; color:black;"><span class="some<?php echo $row['post_id']  ?>"><?php  echo getlikes($row['post_id']) ;  ?></span> <i class="far fa-thumbs-up"></i></a></p>
                            
                        </div>
                        <div class="col-6 pl-5" id="post<?php echo $row['post_id']; ?>">
                           <?php if(getcomment($row['post_id'])> 0){ ?>
                            <p class="pl-5 "><span class="cmnt<?php echo $row['post_id']  ?>"><?php  echo getcomment($row['post_id']) ;  ?></span>  <i class="far fa-comment"></i></p>
                            <?php }?>
                        </div>
                    </div>
                   <div class="post-action py-2">
                       <div class="row text-capitalize">
                           <div class="col-4" style="cursor:pointer">
                             <div   <?php  if(userLiked($row['post_id'])):  ?> 
                              
                              
                               class="liked like-btn"
                              
                              
                              <?php else: ?>
                              
                               class="unliked like-btn"
                              
                              <?php endif ?>
                              
                              
                              data-id="<?php echo $row['post_id']; ?>"
                              
                              
                              
                              
                              >  
                               <span ><i 
                                   
                                    id="likeicon<?php echo $row['post_id'] ?>"   
                                           
                                               
                                           
                              <?php  if(userLiked($row['post_id'])):  ?> 
                              
                              
                               class="fas fa-thumbs-up"
                              
                              
                              <?php else: ?>
                              
                                class="far fa-thumbs-up"
                              
                              <?php endif ?>
                                data-id="<?php echo $row['post_id']; ?>"    
                                   
                         ></i></span>
                              <span >Like</span>
                             </div>
                           </div>
                           <div class="col-2 ">
                               
                           </div>
                           <div class="col-6 pl-5 ">
                              
                               <span class="comm"><a href="../post/comment/comment.php?id=<?php echo $row['post_id'] ?>"><i class="far fa-comment"></i> comment </a></span>
                           </div>
                           <div class="col-4 pl-4 d-none" style="cursor:pointer">
                               <span><i class="far fa-share-square"></i></span>
                              <span> share</span>
                           </div>
                       </div>
                      
                      
                   </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
  <?php  } ?>
  
  <!--======================POST SECTION END --==========================--->



    <script src="../source/js/jquery-3.3.1.js"></script>
    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    
    <script src="../js/about/info.min.js"></script>
    <script src="js/infop.min.js"></script>
   
    
   
</body>

</html>


<?php
  /////////////////////////CHECK USER LIKED O NOT /////////////////////////////////////// 
function userLiked($postid){
    global $conn;
    global $num;
  
    $uid=$_SESSION['uid'];
    $query = "select * from postreaction where post_id = $postid and user_id = $uid and post_like = 1";
    $fire = mysqli_query($conn,$query);
    $num = mysqli_num_rows($fire);
     

    if($num > 0 ){
        return true;
    }else{
        return false;
    }
    
 
}


 
    ?>
 
       
            
        
 <?php
               function getlikes($id){ 
                 global $conn;
                   $uid=$_SESSION['uid'];
                   $query = "select  count(*) from postreaction where post_id = $id and post_like = 1";
                   $fire = mysqli_query($conn,$query);
                  $num = mysqli_fetch_array($fire);

             return $num[0];
     
      }


               function getcomment($id){ 
                 global $conn;
                   $uid=$_SESSION['uid'];
                   $query = "select  count(*) from postcomment where post_id = $id";
                   $fire = mysqli_query($conn,$query);
                  $num = mysqli_fetch_array($fire);

             return $num[0];
     
      }
 ?>
           
        

    <!---////////////////////////////////SEND DATA TO DATABASE IN REACTION TABLE ////////////////////////////-->







