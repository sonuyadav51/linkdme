 <?php  include('databases/dbconn.php');
       
       
session_start();
error_reporting(0);
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
    <link rel="stylesheet" href="css/home/home.css">
     <script>
       var userid = "<?php echo $_SESSION['uid'];  ?>";
       var mainid = "<?php echo $_SESSION['uid'];  ?>";
    
    </script>
    <script src="source/js/jquery-3.3.1.js"></script>
    <script src="js/home/newhome.min.js"></script>
    <style>
       .search:focus{
            outline: none;
        }
        .search:focus ~ label{
            color:white;
            
        }
        a:hover{
            text-decoration: none;
        }
    
    </style>
    
     
</head>

<body>

  <?php if(!isset($_GET['do'])){?>
  
 <?php include("navbar/navbar.php")?>
 <script src="js/home/largscr.js"></script>
<!---=======================TOP NAVBAR SECTION END=======================--->
 <!---=======================POST  SECTION START=======================--->
     <div class="mt-5 mt-md-5">
     <div class="pt-1 pt-md-3">
     <section class="d-none ">
      <div class="container" style="position:absolute; left:10%; top:20%; height:500px; width:350px; background:white;;">
         <div style="position:relative; width:130px; height:130px; background:white; border:1px solid whie; border-radius:200px; top:-50px; left:30%;">
            <img src="About/profile_pic/<?php echo $picname ; ?>" alt="" style="width:130px; height:130px; border-radius:200px; border:2px solid whit; box-shadw:0px 5px 5px rgba(0,0,0,.2);">
            
             
         </div>
         <h4 class="text-capitalize mt-2 mx-3" style="border-bottom:1px solid grey;"><a href="about.php?id=<?php echo $row['id']; ?>" class="text-capitalize " style=" color:black; position:relative; left:30%; top:-35px;"><?php echo $picdata['name']; ?></a><p class="" style="font-size:1rem; margin-left:80px; margin-top:-25px; color:#ff9933"><?php echo $picdata['branch'] ?></p> </h4>
         
         
          <div class="row">
              
          </div>
      </div>
     </section>
     <div class="col-md-4 d-none d-md-block mx-md-auto my-md-2" style="background:white; border:1px solid #ff9933; border-radius:3px;">
        <span class="text-capitalize pl-3" style="background:#ff9933; display:block; width:106%; margin-left:-3%; border-bottom:1px solid #ccc;">Create post</span>
         <div class="row p-3">
             <div class="col-2 pt-3">
                 <a href="about.php?id=<?php echo $id; ?>"><img src="About/profile_pic/<?php echo $picname ; ?>" class="" alt="" style="background:#ff9933; width:50px; height:50p; border-radius:200px;"></a>
             </div>
             <div class="col-10 ">
                 <a href="post/post.php?id=<?php echo $id; ?>" class="p-4" style="text-decoration:none; color:grey;  display:block; border:1px solid #ff9933; border-radius:200px;">
                     share your thoughts..
                 </a>
             </div>
         </div>
     </div>
     <!---=======================COMMUNITY  SECTION START=======================--->
     <div class="community d-md-block col-md-4 mx-md-auto" style="border:1px solid #ff9933; border-radius:3px;">
   <h6>connect people with your branch...</h6>
<div class="mainscroll">
    <div class="scroll a">
        <a href="community/cs/cs.php" class=""><span class="py-5">computer science</span></a>
   </div>
    <div class="scroll a1 a">
        <a href="community/civil/civil.php" class=""><span class="my-5"> civil engineering</span></a> 
   </div>
    <div class="scroll a2 a">
         <a href="community/it/it.php" ><span class="my-5">information technology</span></a>
    
      </div>  
       <div class="scroll a3 a"> 
    
         <a href="community/electrical/electrical.php " ><span class="my-5">electrical engineering</span></a> 
   </div>
     <div class="scroll a4 a">
         <a href="community/electronics/electronics.php " ><span class="my-5">electronics engineering</span></a> 
     </div>
    <div class="scroll a5 a">
        <a href="community/mechanical/mechanical.php" ><span class="my-5">mechanical engineering</span></a> 
     </div>
     <div class="scroll a6 a">
        <a href="community/mca/mca.php" ><span class="my-5">mca</span></a> 
     </div>
</div>

   </div>
   <div class="mb-5">
    <div class="pb-5">
    <!---=======================COMMUNITY  SECTION END=======================--->
    <?php 
    
      $postquery = "SELECT * FROM post inner JOIN student_detail ON post.id = student_detail.id ORDER BY post_id DESC";
      $postfire = mysqli_query($conn,$postquery);
       while($row = mysqli_fetch_array($postfire)){ 
          
             $pic = $row['profile'];
             $array = explode('/',$pic);
             $picname = $array['3'];
   
  ?> 
 <div class="hello<?php echo $row['post_id']; ?> d-none my-4" >
    <div class="container">
    <div class="row mx-auto">
     <div class="jumbotron mx-auto sms" style="background:white; box-shadow:0px 10px 25px black;">
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
      

      <section class="my-2  first-post-container  col-md-4 mx-md-auto "  style="overflow:hidden; border:1px solid #ff9933; border-radius:3px;">
       <div class="container-fluid" style="width:100%;">
           <div class="row">
               <div class="col-12 main_post_row" data-id="<?php echo $row['post_id']; ?>">
                  <div class="pt-2">
                  <!--=====POST HEADING======-->
                   <div class="post-heading profile-pic" >
                      <a href="about.php?id=<?php echo $row['id']; ?>"><img src="About/profile_pic/<?php echo $picname ; ?>" style="margin-left:-20px;"></a>
                      <a href="about.php?id=<?php echo $row['id']; ?>" class="text-capitalize" style="margin-left:-5px;"><?php echo $row['name']; ?></a> 
                       <p><?php echo $row['time']; ?></p>
                         <div align="right" class="bg-primary">
                          <span class="post-more"  data-id="<?php echo $row['post_id']; ?>">...</span>
                          <span class="caret<?php echo $row['post_id']  ?> caret d-none"></span>
                           <ul class="postedit<?php echo $row['post_id']  ?> editpost d-none p-2 text-left" align="" style="z-index:1; position:absolute; width:800px; left:-17px; top:40px; background:white; box-shadow:0px 8px 20px black;">
                               <?php 
                                $carray = array();
                                 $cquery = "SELECT * FROM post WHERE id = $id";
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
                               <li style="display:block; margin-left:-5px; background:lightyellow;"><a href="post/edit/editpost.php?postid=<?php echo $row['post_id']  ?>" style="display:block;" class="pl-5 py-1">Edit post</a></li>
                               <li style="display:block; margin-left:-5px; background:lightyellow;" class="mt-1"><a href="#"  data-id="<?php echo $row['post_id']; ?>" class="delete pl-5 py-1" style="display:block;">Delete post</a></li>
                               <?php }} ?>
                               <li class="d-none"><a href="#">report post</a></li>
                            </ul>
                            </div>
                          </div>
                          <!--=====POST HEADING END======-->
                          <!--=====MAIN POST CONTENT======-->
                     <div  data-id="<?php echo $row['post_id']; ?>" class="main_post">
                      <!--=====TITLE======-->
                     <p class="text-left" style="font-size:18px; margin-left:-9px;"><?php echo $row['post']; ?></p>
                      <!--===== IMAGE======-->
                     <?php if($row['post_img'] != "img/"): ?>
                     <img src="post/<?php echo $row['post_img']; ?>" alt="" class="img-responsive" style="width:121%; margin-left:-30px; border-radius:0px; border:1px solid #ff9933; border-left:0; border-right:0;">
                    <?php endif; ?>
                           <!--=====VIDEO======-->
                           <!--
                          <video controls id="video" muted autobuffer preload  controlsList="nodownload" style="width:117%; margin-left:-26px;" class="d-none" style="z-index:1;">
                              <source src="post/#t=2" type="video/mp4">
                              Your browser does not support the video tag.
                              </video>
                            -->
                    </div>
                    <!--===== MAIN POST LIKES AND COMMENT NUMBER======-->
                    <div class="row likenumber pt-4">
                        <div class="col-6">
                         <p><a href="post/liker.php?postid=<?php echo $row['post_id']; ?>" style="text-decoration:none; color:black;"><span class="some<?php echo $row['post_id']  ?>"><?php  echo getlikes($row['post_id']) ;  ?></span> <i class="far fa-thumbs-up"></i></a></p>
                        </div>
                        <div class="col-6 pl-5" id="post<?php echo $row['post_id']; ?>">
                           <?php if(getcomment($row['post_id'])> 0){ ?>
                            <p class="pl-5 "><span class="cmnt<?php echo $row['post_id']  ?>"><?php  echo getcomment($row['post_id']) ;  ?></span>  <i class="far fa-comment"></i></p>
                            <?php }?>
                        </div>
                    </div>
                    <!--===== MAIN POST CONTENT END======-->
                    <!--===== MAIN POST ACTION======-->
                   <div class="post-action py-2">
                       <div class="row text-capitalize">
                          <!--===== LIKES======-->
                           <div class="col-4" style="cursor:pointer">
                             <div   <?php  if(userLiked($row['post_id'])):  ?> 
                              class="liked like-btn"
                             <?php else: ?>
                              class="unliked like-btn"
                             <?php endif ?>
                              data-id="<?php echo $row['post_id']; ?>"
                            ><span ><i 
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
                           <!--===== LIKES END======-->
                           <div class="col-2 ">
                           </div>
                           <!--===== COMMENT====-->
                           <div class="col-6 pl-5 ">
                              
                               <span class="comm"><a href="post/comment/comment.php?id=<?php echo $row['post_id'] ?>"><i class="far fa-comment"></i> comment </a></span>
                           </div>
                           <!--===== COMMENT END====-->
                           <div class="col-4 pl-4 d-none" style="cursor:pointer">
                               <span><i class="far fa-share-square"></i></span>
                              <span> share</span>
                           </div>
                       </div>
                      
                      
                   </div>
                   <!--===== MAIN POST ACTION END======-->
                   </div>
               </div>
           </div>
       </div>
   </section>

  
 <?php   }  ?> 
 <?php } ?>
   </div> 
   </div>
         </div> 
            </div>
  <!--==============================bars button start=======================--->
  <?php if(isset($_GET['do'])){?>
  <div class="container bars-head ">
   <div class="row">
   <div class="col-2">
    <span><a href="home.php" class="px-2"><i class="fas fa-arrow-left"></i></a></span>
    </div>
    <div class="col-8 mx-4">
     <a href="About/about.php<?php echo $id; ?>" class="text-center text-uppercase"> <?php echo $data['name']; ?></a>
     </div>
      </div>
  </div>
  <div class="container text-capitalize ">
      <div class="row  bar-btn ">
     <a href="about.php?id=<?php echo $id; ?>"><i class="fas fa-user-tie"></i> your profile</a>
      <a href="friend/friendlist.php?id=<?php echo $id; ?>"><i class="fas fa-users"></i> your connections</a>
      <a href="privacy/password/resetpwd.php?id=<?php echo $id; ?>"><i class="fas fa-tools"></i> setting</a>
      <a href="privacy/privacy.php?id=<?php echo $id ?>"><i class="fas fa-user-shield"></i> privacy</a>
       <a href="about.html"><i class="fas fa-location-arrow"></i> About Linkdme</a>
        <a href="cookie.html"><i class="fas fa-cookie"></i> cookie policy</a>
         <a href="term.html"><i class="fas fa-book-open"></i> term & condition</a>
      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> logout</a>
      
      
      
      </div>
      
  </div>
  <?php } ?>
  
  
  
  <!--==============================bars button end=======================----->
    
                    
   


    
     
   
  
    
    <script src="source/js/bootstrap.min.js"></script>
    <script src="source/js/all.min.js"></script>
    
    
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



 




