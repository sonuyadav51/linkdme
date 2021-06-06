 <?php  include('databases/dbconn.php');
      error_reporting(0); 
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../Login/');
}
  $id=$_SESSION['uid'];
  $query = "select * from student_detail where id = $id";
  $fire = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($fire);
  $picquery = "select * from student_detail where id =$id";
  $picfire = mysqli_query($conn,$picquery);
  $picdata = mysqli_fetch_array($picfire);
  $pic = $picdata['profile'];
  $array = explode('/',$pic);
  $picname = $array['3'];

//friend detials
  $user_id = $_GET['id'];
  $toquery = "SELECT * FROM student_detail WHERE id = $user_id";
  $tofire = mysqli_query($conn,$toquery);
  $todata = mysqli_fetch_array($tofire);
  $topic = $todata['profile'];
  $toarray = explode('/',$topic);
  $topicname = $toarray['3'];
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
 
    <title>Message Box</title>
    <!--bootstrap css-->
    <link rel="stylesheet" href="../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/msg.css">
    <link rel="stylesheet" href="../css/home/home.css">
    <script>
        var userid = "<?php echo $user_id; ?>";
        var mainid = "<?php echo $_SESSION['uid'];  ?>";
    </script>

        <style>
        .search:focus{
            outline: none;
        }
        .search:focus ~ label{
            color:white;
            
        }
            .fsearch:focus{
                box-shadow: 0px 10px 10px rgba(0,0,0,.5);
            }
            .fsearch:focus ~ label {
                color:white;
            }
    
    </style>
    
     
</head>

<body>
<nav class="nav navbar   fixed-bottom btm-nav">
<div class=" " style="width:100%;">
    <div class="nav-a d-flex justify-content-between mx-auto" style="">
      <a class="navbar-brand d-none d-md-block" href="#">
                <img src="../About/img/img.png" width="30" height="30" alt="">
            </a>
            <form class="form-inline d-none d-md-block" action="#">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" name="search" class="form-control search" style="width:500px; active-outline:none;" placeholder="Search here" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form>

            <a href="../about.php?id=<?php echo $id; ?>" class="text-capitalize pt-md-2 d-none d-md-block ml-md-2" style="font-size:17px; color:white; text-decoration:none;"><img src="../About/profile_pic/<?php echo $picname ; ?>" alt="" width="30px" height="30px" style="background:#ff9933; border-radius:200px;">
                <?php echo $picdata['name']; ?></a>
            <a href="../home.php" class="d-none d-md-block pl-md-2" style=" text-decoration:none;">

                <i class="fas fa-home"></i>

            </a>
            <a href="../notification.php" class="d-none d-md-block ml-md-3">
                <div class="col-2 pr-4 noti">
                    <div class="ncount">
                        <p class="no"> </p>
                    </div>
                </div>

                <i class="fas fa-bell"></i>


            </a>

            <a href="../home.php" class="d-md-none" style="">

                <i class="fas fa-home"></i>

            </a>

               
               
               
               
               <a   href="../friend/request.php?id=<?php echo $_SESSION['uid']; ?>&action=0" class="reqnoti " >
                    <div class="count d-none">
                    <p class="rn"></p>
                </div>
        <div class="col-2">
              
               <i class="fas fa-users"></i>
    
        </div>
        </a>
        <a href="../post/post.php?id=<?php echo $id; ?>" class="d-md-none">
         <div class="col-2  ">
            <i class="fas fa-plus-circle"></i>
        </div>
        </a>
        
        <a href="" class="active msgnoti ">
             <div class="msgnoti">
          <div class="mcount d-none ml-5">
                <p class="mn"></p>
          </div>
        </div>
        <div class="col-2">
            <i class="fas fa-paper-plane"></i>
        </div>
        </a>
       <a href="../home.php?do=bookmarks" class="">
        <div class="col-2  ">
             <i class="fas fa-bars"></i>
        </div>
        </a>
    </div>
  
    
</div>
</nav>
<div class=" d-xs-none ser container-fluid d-none " style=" background:white; position:absolute; z-index:1; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
    <div class="row longscr">
        <div class="col-12 col-md-6 mx-md-auto my-3" style="z-index:1;">
            <div class="search-result" style="z-index:1;">

            </div>
        </div>
    </div>
</div>
   <!---=======================TOP NAVBAR SECTION START=======================--->
   <section class="post-section p-1 d-md-none fixed-top">
       <div class="container-fluid">
           <div class="row">
               <div class="col-2">
                   <div class="profile-pic">
                       <a href="../about.php?id=<?php echo $id; ?>"><img src="../About/profile_pic/<?php echo $picname ; ?>" alt=""></a>
                   </div>
               </div>
            
               <div class="col-8 pt-1  text-center">
                   
                 <form action="#">
                     <input type="text" class="search pl-5" name="search" placeholder="Search" style="border:0; border-bottom:1px solid white; border-radius:0; background:#ff9933;">
                     <label for="search"><i class="fas fa-search"></i></label>
                 </form>
            </div>
               <div class="col-2 pr-4 noti">
                <div class="ncount ">
                    <p class="no">  </p>
                </div>
                   <a href="../notification.php"><i class="fas fa-bell"></i></a>
               </div>
              
           </div>
           <div class=" ser container-fluid d-none" style="background:white; left:-1px; position:absolute; z-index:1; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
               <div class="row">
                   <div class="col-12">
                       <div class="search-result">
                         
                       </div>
                   </div>
               </div>
           </div>
           
       </div>
 </section>
<div >
<div class="my-5">
<div class="container my-5 py-5 d-none">
    <div class="table-responsive">
        <h4 class="text-center">chat with your friend</h4>
       
        
    </div>
</div>
</div>
</div>
<!--=============NEW CHAT SYSTEM START================-->
<div class="pt-md-2">
 <div class="">
   <div class="container-fluid">
       <div class="row">
          <!--=============NEW CHAT SYSTEM  LEFT PART================-->
           <div class="col-12 col-md-3  d-md-block left c" style="border-right:2px solid #ff9933; height:690px; background:white; overflow-y:scroll;">
           <div class="chat-head " style=" position:fixed; height:82px; background:white; z-index:1;  width:100%; margin-left:-1%;">
             <div class="row p-3">
                 <div class="col-4 d-flex">
                    <a href="#"><img src="../About/profile_pic/<?php echo $picname ; ?>" alt="" style="width:50px; height:50px; border-radius:200px;"></a> 
                    <a href="" class="text-capitalize px-5 mx-3" style="text-decoration:none; color:black; font-size:2rem;">message</a>
                    <a href="#" class="mx-md-3 ml-1" style="text-decoration:none; color:black; font-size:2rem;"><i class="fas fa-cog"></i></a>
                 </div>
            </div>
           </div>
           
           <div class="chat-body mt-5 mb-3">
             <div class="pt-5">
                
                 <input type="text" placeholder="Search friend" class="p-2 pl-5 fsearch" name="chatSearch"  style="width:90%; border-radius:20px; border:1px solid #ff9933; background:#ff9933;">
                 <label for="chatSearch" style="position:absolute; z-index:1; left:30px;;  margin-top:10px;"><i class="fas fa-search"></i></label>
             </div>
           </div>
           
           <div>
               <ul style="margin:0px; padding:0px;" id="user_details">
<!--
                   <li class="py-2" style=" display:block;  border-bottom:1px solid #ccc;">
                      <a href="msg.php?id='.$du['id'].'" class="p-2 start_chat" style="display:block; text-decoration:none;" data-touserid="'.$du['id'].'">
                       <img src="../../About/profile_pic/'.$picname.'" alt="" style="width:40px; height:40px; border-radius:200%; background:#ff9933;"> 
                       <span class="px-3 text-capitalize" style="font-size:1.3rem; color:black;">'.$du['name'].'</span>
                    </a>
                   </li>
-->
                    
                   
               </ul>
           </div>
           </div>
            <!--=============NEW CHAT SYSTEM START LEFT PART END================-->
            <!--=============NEW CHAT SYSTEM START MIDDLE PART ================-->
           <div class="col-md-6 col-12 d-md-block middle c" style="border-right:2px solid #ff9933; height:690px; background:white; overflow-y:scroll;" id="messageBody">
            <div class="chat-head" style="border-bottom:1px solid #ff9933; position:fixed; background:white; height:82px; z-index:1;  border-left:1px solid #ff9933; width:100%; margin-left:-17px;">
              <div class="row p-3">
                 <div class="col-md-4 col-12 d-flex">
                    <a href="#"><img src="../About/profile_pic/<?php echo $topicname ; ?>" alt="" style="width:50px; height:50px; border-radius:200px;"></a> 
                    <a href="" class="text-capitalize px-5 mx-3" style="text-decoration:none; color:black; font-size:1.3rem;"><?php echo $todata['name']; ?></a>
                </div>
            </div>
             </div>
             <div class="chat-body my-5">
                 <div class="chat pt-5">
                   <div class="msgbox  p-2" >
   
                    <div class="rmsg<?php echo $todata['id'] ?>" >
       
      
                        </div>
    
      
                          </div>
                 </div>
                 <div class="fixed-bottom chatinput" style="padding-bottom:10px; width:50%;  background:white; margin-left:25%;">
                 <input type="text"  placeholder="Write message here" class="sendChat p-2 pl-4" name="chat_msg_<?php echo $todata['id']; ?>" id="chat_msg_<?php echo $todata['id']; ?>" style="width:80%; margin-left:7%; border-radius:20px; border:1px solid #ff9933; background:#ff9933;">
                 <span class="send_chat" name="send_chat" id="<?php echo $todata['id'];  ?>" style="font-size:2.2rem; margin-top:6px; color:#ff9933; cursor:pointer;"><i class="fas fa-paper-plane"></i></span>
                 </div>
             </div>
         </div>
            <!--=============NEW CHAT SYSTEM  MIDDLE PART END ================-->
            <!--=============NEW CHAT SYSTEM  RIGHT PART================-->
           <div class="col-3 d-none d-md-block right c" style="border-right:2px solid black; height:690px; background:white; overflow-y:scroll;">
              <div class="chat-head" style="border-bottom:1px solid #ff9933; border-left:1px solid #ff9933; background:white; height:82px; position:fixed; width:100%; margin-left:-1%;">
              <h1>hello</h1>
             </div>
            </div>
            <!--=============NEW CHAT SYSTEM RIGHT PART END================-->
       </div>
   </div>
 </div>
</div>

<!--=============NEW CHAT SYSTEM END================-->

    <script src="../source/js/jquery-3.3.1.js"></script>
   
    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="js/newmsg.min.js"></script>
</body>
</html>
 <script>

 $(window).on('resize', function() {
       if ($(window).width() > 768) {
            $('.btm-nav').removeClass('d-none');
         $('.btm-nav').removeClass('fixed-bottom');
         $('.nav-a').removeClass("justify-content-between");
         $('.nav-a').addClass("justify-content-center");
         $('nav').css({"border-top":"0","border-bottom":"1px solid #ccc","opacity":"1","background":"#ff9933"});
       
            
       }else{
           <?php if(isset($_GET['id'])){ ?>
          $('.btm-nav').addClass('d-none');
           $('.left').addClass('d-none');
         <?php }else{ ?>
         $('.chatinput').addClass('d-none');
         <?php  }?>
           $('.c').css({"height":"650px"});
           $('.sender').css({"margin-left":"40%"});
           $('.chatinput').css({"padding-bottom":"40px","width":"100%","margin-left":"0"});
          $('.btm-nav').addClass('fixed-bottom');
           $('.nav-a').addClass("justify-content-between");
           $('.nav-a').removeClass("justify-content-center");
       }
});
 if ($(window).width() > 768) {
      $('.btm-nav').removeClass('d-none');
         $('.btm-nav').removeClass('fixed-bottom');
         $('.btm-nav').addClass('fixed-top');
         $('.nav-a').removeClass("justify-content-between");
         $('.nav-a').addClass("justify-content-center");
         $('nav').css({"border-top":"0","border-bottom":"1px solid #ccc","opacity":"1","background":"#ff9933"});
       
   
}else{
    <?php if(isset($_GET['id'])){ ?>
    $('.btm-nav').addClass('d-none');
    $('.left').addClass('d-none');
    
    <?php }else{ ?>
    $('.chatinput').addClass('d-none');
    <?php  }?>
    $('.c').css({"height":"650px"});
    $('.sender').css({"margin-left":"40%"});
    $('.chatinput').css({"padding-bottom":"40px","width":"100%","margin-left":"0"});
    $('.btm-nav').addClass('fixed-bottom');
    $('.btm-nav').removeClass('fixed-top');
    $('.nav-a').addClass("justify-content-between");
    $('.nav-a').removeClass("justify-content-center");
    $('.longscr').addClass("d-none");
}  
       



 

    


</script>

 