
<?php

   include('databases/dbconn.php');
     session_start();
     $uid =$_GET['id'] ;
    $sesid = $_SESSION['uid'];
    $query = "select * from student_detail where id =$uid";
    $fire = mysqli_query($conn,$query);
    $ndata = mysqli_fetch_array($fire);
    $firstpic = $ndata['profile'];
   $array = explode("/",$firstpic);
   $firstpicname = $array['3']; 
   $bquery = "select * from bio where id =$uid";
    $bfire = mysqli_query($conn,$bquery);
    $bdata = mysqli_fetch_array($bfire);
     
   if(!isset($_SESSION['uid'])){
       header('Location:Login/index.php');
   }
    
?>

<?php 
 

 
   $query = "SELECT * FROM work WHERE wid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $data = mysqli_fetch_array($fire);
  
   

   $query = "SELECT * FROM fullimage WHERE id=$uid ORDER BY fid DESC";
   $fire = mysqli_query($conn,$query);
   $fulldata = mysqli_fetch_array($fire);
   $fullimage = $fulldata['image'];


   $query = "SELECT * FROM edu WHERE id=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $edudata = mysqli_fetch_array($fire);


   $query = "SELECT * FROM address WHERE clid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $cldata = mysqli_fetch_array($fire);


   $query = "SELECT * FROM haddress WHERE hid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $hdata = mysqli_fetch_array($fire);
   

   $query = "SELECT * FROM relation WHERE rid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $rdata = mysqli_fetch_array($fire);

   $query = "SELECT * FROM profile_pic WHERE pid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $picdata = mysqli_fetch_array($fire);

    $newpic = $picdata['image'];
    $array = explode('&',$newpic);
    $new = $array[1];
   $newid = $picdata['pid'];
//DANGER =========================================================================================DANGER/////////
    $update = "UPDATE `student_detail` SET `profile`='../About/profile_pic/$new' WHERE id=$newid ";
     $ufire = mysqli_query($conn,$update);
     $query = "select * from student_detail where id =$uid";
    $fire = mysqli_query($conn,$query);
    $udata = mysqli_fetch_array($fire);
     $pic = $udata['profile'];
     $picarray = explode('/',$pic);
     $picname = $picarray['3'];


   $eduquery = "SELECT * FROM basicedu WHERE beid=$uid ORDER BY id DESC";
   $edufire = mysqli_query($conn,$eduquery);
   $bedata = mysqli_fetch_array($edufire);
 
   $query = "SELECT * FROM contact WHERE conid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $condata = mysqli_fetch_array($fire);
    
   $query = "SELECT * FROM skill WHERE skid=$uid LIMIT 3";
   $skillfire = mysqli_query($conn,$query);
   $tquery = "SELECT * FROM skill WHERE skid=$uid";
   $tskillfire = mysqli_query($conn,$tquery);
    $tsnum = mysqli_num_rows($tskillfire);
   $ttquery = "SELECT * FROM toolskil WHERE toolid=$uid";
   $ttskillfire = mysqli_query($conn,$ttquery);
   $ttsnum = mysqli_num_rows($ttskillfire);
   $tttquery = "SELECT * FROM interpskill WHERE ipid=$uid";
   $tttskillfire = mysqli_query($conn,$tttquery);
   $tttsnum = mysqli_num_rows($tttskillfire);
    
    $snum = $tsnum + $ttsnum + $tttsnum;
   

   $query = "SELECT * FROM achivement WHERE achivid=$uid LIMIT 3";
   $achivfire = mysqli_query($conn,$query);
   $tquery = "SELECT * FROM achivement WHERE achivid=$uid";
   $tachivfire = mysqli_query($conn,$tquery);
   $anum = mysqli_num_rows($tachivfire);

   $query = "SELECT * FROM project WHERE proid=$uid LIMIT 3";
    $profire = mysqli_query($conn,$query);
   $tquery = "SELECT * FROM project WHERE proid=$uid";
   $tprofire = mysqli_query($conn,$tquery);
   $pnum = mysqli_num_rows($tprofire);
 
   $query = "SELECT * FROM project WHERE proid=$uid LIMIT 3";
   $langfire = mysqli_query($conn,$query);
  $langdata = mysqli_fetch_array($langfire);

    

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
 
    <title> <?php echo $ndata['name']; ?></title>
    <!--bootstrap css-->
    <link rel="stylesheet" href="source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/about/about.css">
    <script src="source/js/jquery-3.3.1.js"></script>
</head>

<body style="background:lightyellow;">
   

    <nav class="navbar nav  ">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="home.php" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                    <?php echo $ndata['name']; ?>

                </h6>
            </div>

        </div>
    </nav>

    <!--=======================background image start=================-->
    <div class="col-md-6 mx-md-auto pb-2" style="background:white; border:1px solid #ff9933; border-bottom:1px solid white;">
<div class="r1">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-12">
                <div class="img-main-cont r1" style="width:108%; margin-left:-4%;">
                    <div class="img-container" >
                       
                    </div>
                    <?php if ($_SESSION['uid'] == $uid){ ?>
                    <!--
            <div class="edit-bg-btn">
                 
                   <a href="edit/form/upload.php/<?php echo $_SESSION['uid']; ?>/?upload=bimg" class="nav-link d-flex justify-content-center pt-1 ">
                   <span class="pl-1"><i class="fa fa-camera"></i></span>  
                   <span class="px-1"> Edit</span>
                   
                   </a>
                   </div>
                   -->
                    <?php } ?>


                </div>
            </div>
        </div>
    </div>
</div>
    <!--=======================background image end=================-->

    <!--=======================profile image start=================-->


 <div class="">
    <div class="profile-pic">
       <div class="container">
        <div class="row justify-content-center">
            <div class="prf-img" style="box-shadow:0px 5px 10px black; overflow:hidden;">
               <a href="
               
               <?php  if(isset($fulldata['image'])){ ?>
               
               post/img/<?php echo $fulldata['image']; ?>
               
               <?php }else { 
                  echo 'post/img/'.$fulldata['image'];
                } ?>
               "> <img src="About/profile_pic/<?php echo $new; ?>"></a>




                <?php if ($_SESSION['uid'] == $uid){?>
                <div class="edit-btn">

                    <a href="About/edit/form/upload.php?upload=bimg&id=<?php echo $_SESSION['uid']; ?>" class="nav-link d-flex justify-content-center pt-1 ">
                        <span class="pl-1"><i class="fa fa-camera"></i></span>
                        <span class="px-1"> </span>

                    </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!--========================profile image end=================-->
    <!--=======================profile and discription  start=================-->
    <div class="col-md-6 mx-md-auto pb-2" style="background:white; border:1px solid #ff9933; border-top:1px solid white;">
    <div class="name">
        <h4 class="text-center text-capitalize ">
            <?php echo $ndata['name']; ?>
        </h4>
    </div>

    <div class="discription">
       <div class="row ">
           <div class="col-10 col-md-6 mx-md-auto mx-md-1 mx-5 ">
               <a href="#" >
            <p class="text-center  "><?php echo $bdata['bio'];  ?></p>
        </a>
           </div>
       </div>
        
    </div>
    <div class="bio-content mx-4 d-none">
<div class="container">
    <div class="card-header">
       <div class="row">
           <div class="col-10">
                <h6 class="mx-3 "><strong>Describe yourself</strong>&nbsp; (max. 80 characters)</h6>
           </div>
           <div class="col-2">
               <button class="bio-close">&times;</button>
           </div>
       </div>
       
        
    </div>
    <div class="card-body">
       <form action="databases/about/aboutdb.php" method="post">
        <textarea name="biotext" id="biotext" cols="30" rows="5" required placeholder="write here"></textarea><br> 
        <button type="submit" class="btn btn-success btn-sm my-2 biobtn" name="biobtn">save</button>
        </form> 
    </div>
    
</div>
   </div>
    <!--=======================profile and discription end=================-->
    <?php if ($_SESSION['uid'] == $uid){?>
    <!--=======================shortcut icon start=================-->
    <div class="container">
        <div class="row justify-content-center">
            <div class="e col-xs-3 justify-content-center info-update">
                <a href="About/profile/edit/about/?edit=info">
                    <img src="icon/edit.png" alt="">
                    <div>
                        <p>UpdateInfo</p>
                    </div>
                </a>
            </div>
            <div class="e col-xs-3">
                <a href="friend/friendlist.php?id=<?php echo $uid ; ?>">
                    <img src="icon/friends.png" alt="">
                    <div>
                        <p class="mx-2">Connection</p>
                    </div>
                </a>
            </div>

            <div class="e col-xs-3">
                <a href="About/information.php?id=<?php echo $uid; ?>">
                    <img src="icon/businessman-information.png" alt="">
                    <div>
                        <p class="mx-2">About</p>
                    </div>
                </a>
            </div>

            <div class="e col-xs-3 user-more">
                <a href="#">

                    <img src="icon/more-circular-symbol.png" alt="">

                    <div>
                        <p class="mx-2">More</p>
                    </div>
                </a>
            </div>
        </div>
     </div>

    <!--=======================shortcut icon end=================-->
    <?php } else {  ?>
    <!--=======================add friend icon start=================-->
    <div class="container" style="">
        <div class="row justify-content-center">
            <div class="e add-friend col-xs-4 justify-content-center">
                <a href="" id="fri" name="fribtn">
                    <img src="icon/add.png" alt="">
                    <div>
                        <p id="addfriend" class="">Connect</p>
                    </div>
                </a>
            </div>
              <?php
            $check = "SELECT * FROM `friend` WHERE (reid = $uid  and acid = $sesid  || reid = $sesid and acid =$uid) and status = 1";
            $ckfire = mysqli_query($conn,$check);
             $cknumber = mysqli_num_rows($ckfire);
             if($cknumber != 0){
            ?>
               <div class="e col-xs-4">
                <a href="message/msg.php?id=<?php echo $uid; ?>">
                    <img src="icon/mesage.png" alt="">
                    <div>
                        <p class="mx-1">message</p>
                    </div>
                </a>
             </div>
         <?php  }?>
         <div class="e col-xs-4">
                <a href="About/information.php?id=<?php echo $uid; ?>">

                    <img src="icon/businessman-information.png" alt="">

                    <div>
                        <p class="mx-2">About</p>
                    </div>
                </a>
            </div>
            <div>
            <div class="e col-xs-4 user-more-other">
                <a href="#">

                    <img src="icon/more-circular-symbol.png" alt="">

                    <div>
                        <p class="mx-2">More</p>
                        
                    </div>
                </a>
                
            </div>
            
           
            
            </div>
        </div>
    </div>
   
    <div class="already">
        
    </div>

    <!--=======================add frinend icon end=================-->
    <?php  } 
      $name = "select name from student_detail where id=$uid";
      $firename = mysqli_query($conn,$name);
      $reqname = mysqli_fetch_array($firename);
    
    ?>



    <div class="re">
         <div class="container my-3 d-none">
        <div class="row text-center jumbotron">
            <div class="col-12">
                <p class="text-capitalize"><strong><?php echo $reqname['name']; ?></strong> sent you connection request</p>
                  <form action="about.php?id=<?php echo $uid ?>" method="post">
                <button  class="btn btn-success text-uppercase mx-3" id="accept" name="accept">Connect</button>
                <button  class="btn btn-danger text-uppercase mx-5" id="reject" name="reject">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
    
    <!--=======================information start=================-->
<div class="container col-md-6 mx-md-auto"> 
  <div class="info-data mt-2">
  <div class="heading-data">
  <div class="row">
  <div class="col-10">
   <h5 class="px-2 text-capitalize">personal info</h5>
   </div>
   <div class="col-2">
   <span class="text-right bbtn" > 
              <?php if ($_SESSION['uid'] == $uid){?>
               <a href="About/profile/edit/about/?edit=info"><i class="fas fa-pen"></i></a>
                <?php } ?> 
    </span>
   </div>
   </div>
   </div>
    <div class="container-fluid my-2 information">
        <div class="row">
            <div class="col-10">
                <ul class="navbar-nav text-capitalize">
                    <li class="nav-item">
                        <span class="info-icon">
                            <i class="fas fa-briefcase"></i>
                        </span>
                        <span class="info"> Works at </span>
                        <span><b>
                                <?php echo $data['work']; ?></b></span>
                    </li>
                    <li class="nav-item my-2">
                        <span class="info-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="info"> College name </span>
                        <span><b>
                                <?php echo $edudata['college']; ?> <br>  <span class="text-danger"><?php echo $edudata['start']; ?>-<?php echo $edudata['end']; ?></span></b></span>
                    </li>
                    <li class="nav-item">
                        <span class="info-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="info"> Branch </span>
                        <span><b>
                                <?php echo $edudata['branch']; ?></b></span>
                    </li>
                    <li class="nav-item my-2">
                        <span class="info-icon">
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="info"> Lives in </span>
                        <span><b>
                                <?php echo $cldata['clocation']; ?></b></span>
                    </li>
                    <li class="nav-item">
                        <span class="info-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="info"> From </span>
                        <span><b>
                                <?php echo $hdata['haddress']; ?></b></span>
                    </li>
                    <li class="nav-item my-2">
                        <span class="info-icon" style="color:red;">
                            <i class="fas fa-heart"></i>
                        </span>
                        <span class="info">
                           <strong><?php echo $rdata['relation']; ?> </strong> </span>
                        <span><b></b></span>
                    </li>
                    <li class="nav-item">
                        <span class="info-icon">
                            <i class="fas fa-clock"></i>
                        </span>
                        <span class="info my-1"> Joined on <span><?php $date =  $udata['joindate']; 
                        $array = explode(" ",$date);
                        
                        echo $array['0'];
                        ?></span> </span>
                        <span><b></b></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    
</div>
    <!--=======================information end=================-->

    <!--=======================post on timeline start=================-->


    <!--=======================post on timeline  end=================-->
   <!--=======================post on timeline  end=================-->
 <div class="more-content more-hide">
                <?php if ($_SESSION['uid'] == $uid){?>
                <ul>
                   <li class="editbio"><a href="about.php?id=<?php echo $_SESSION['uid']; ?>">Add discription</a> </li>
                    <li><a href="About/edit/form/upload.php?upload=bimg&id=<?php echo $_SESSION['uid']; ?>">Change profile pic</a></li>
                    
                    <li><a href="privacy/privacy.php?id=<?php echo $_SESSION['uid']; ?>">Privacy shortcuts</a> </li>
                </ul>
                 <?php } else {  ?>
                 <ul>
                    <li class="d-none"><a href="#">report profile</a></li>
                    <li><a href="#">block</a> </li>
                </ul>
                 
                 <?php } ?>
                <div class="caret">
                    
                </div>
</div>
   
 <div class="more-content-other more-hide">
                <?php if ($_SESSION['uid'] == $uid){?>
                <ul>
                    <li><a href="#">change profile pic</a></li>
                    <li><a href="#">privacy shortcuts</a> </li>
                </ul>
                 <?php } else {  ?>
                 <ul>
                    <li class="d-none"><a href="#">report profile</a></li>
                    <li><a href="friend/friendlist.php?id=<?php echo $uid; ?>">See Connection</a> </li>
                </ul>
                 
                 <?php } ?>
                <div class="caret">
                    
                </div>
</div>
 <!--=======================education  info start=================-->
 <div class="education info-data my-2">
 <div class="heading-data">
 
 <div class="row">
  <div class="col-10">
   <h5 class="mx-2 "><i class="fas fa-graduation-cap"></i>&nbsp;&nbspEducation</h5>
   </div>
   <div class="col-2">
   <span class="text-right bbtn" > 
              <?php if ($_SESSION['uid'] == $uid){?>
               <a href="About/profile/edit/about/?edit=edu"><i class="fas fa-pen"></i></a>
                <?php } ?> 
    </span>
   </div>
   </div>
 </div>

 <div class="container-fluid">
   
     <div class="row">
         <div class="col-12">
             <div class="high edu">
               <div class="heading">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;high school</strong></h6>  
               </div>
               <div class="body text-capitalize">
                  <p><?php echo $bedata['high'] ;?></p> 
               </div>
                
             </div>
             <div class="enter edu my-2">
                 <div class="heading">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;intermidiate</strong></h6>  
               </div>
               <div class="body">
                  <p><?php echo $bedata['inter'] ;?></p> 
               </div>
             </div>
             <div class="graduation edu my-2">
                 <div class="heading">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;graduation</strong></h6> 
               </div>
               <div class="body">
                  <p><?php echo $bedata['graduate'] ;?></p> 
               </div>
             </div>
             <div class="other my-1">
                 <div class="heading">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;other</strong></h6>   
               </div>
               <div class="body">
                  <p><?php echo $bedata['eduother'] ;?></p> 
               </div>
             </div>
         </div>
         
     </div>
 </div>
  
 </div>
 <!--=======================education info  end=================-->
 <!--=======================skill info  start=================-->
   <div class="education info-data my-2">
 <div class="heading-data">
 
 <div class="row">
  <div class="col-10">
   <h5 class="mx-2 text-capitalize"> <i class="fas fa-gem"></i>&nbsp;Skills and achivements</h5>
   </div>
   <div class="col-2">
   <span class="text-right bbtn" > 
              <?php if ($_SESSION['uid'] == $uid){?>
               <a href="About/profile/edit/about/?edit=skill"><i class="fas fa-pen"></i></a>
                <?php } ?> 
    </span>
   </div>
   </div>
 
 </div>
 <div class="container-fluid">
   
     <div class="row">
         <div class="col-12">
             <div class="high skill">
               <div class="heading ">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;skills</strong></h6>  
               </div>
               <div class="body text-capitalize">
                  <ul>
                     <?php while($topdata = mysqli_fetch_array($skillfire)) { ?>
                      <li><?php echo $topdata['top']; ?></li>
                     <?php } ?>
                      
                  </ul>
                   <?php if ($_SESSION['uid'] == $uid){?>
                  <div class="more-btn text-center mb-2   
                    
                    <?php if(($snum - 3) < 1){ ?>
                      d-none
                    <?php } ?>
                    ">
                     
                      <a href="About/profile/edit/about/?edit=skill" class="btn btn-info btn-block btn-sm"><?php echo $snum - 3 ; ?> more skills</a>
                  </div>
                  <?php } ?>
               </div>
                
             </div>
             <div class="enter  my-2">
                 <div class="heading ">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;achivements</strong></h6>  
               </div>
               <div class="body text-capitalize">
                  <ul>
                     <?php while($achivedata = mysqli_fetch_array($achivfire)) { ?>
                      <li><?php echo $achivedata['achivement']; ?></li>
                     <?php } ?>
                      
                  </ul>
               </div>
                <?php if ($_SESSION['uid'] == $uid){?>
                <div class="more-btn text-center mb-2
                     
                      <?php if(($anum - 3) < 1){ ?>
                      d-none
                    <?php } ?>
                     
                     
                     
                     ">
                      <a href="About/profile/edit/about/?edit=skill" class="btn btn-info btn-block btn-sm"><?php echo $anum - 3 ; ?> more Achivements</a>
                  </div>
                  <?php } ?>
             </div>
            
         </div>
         
     </div>
 </div>
 
 </div>
    <!--=======================skill info  end=================-->
    <!--=====================project start===============--->
<div class="education info-data my-2 ">
 <div class="heading-data">
 
 <div class="row">
  <div class="col-10">
   <h5 class="mx-2 text-capitalize"> <i class="fas fa-project-diagram"></i>&nbsp;&nbsp;project</h5>
   </div>
   <div class="col-2">
   <span class="text-right bbtn" > 
              <?php if ($_SESSION['uid'] == $uid){?>
               <a href="About/profile/edit/about/?edit=project"><i class="fas fa-pen"></i></a>
                <?php } ?> 
    </span>
   </div>
   </div>
 </div>
  <div class="body p-2">
   <div class="enter skill my-2">
                 <div class="heading ">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;project</strong></h6>  
               </div>
               <div class="body text-capitalize">
                  <ul>
                     <?php while($prodata = mysqli_fetch_array($profire)) { ?>
                      <li class=""><?php echo $prodata['project']; ?></li>
                     
                      <?php } ?> 
                  </ul>
               </div>
                <?php if ($_SESSION['uid'] == $uid){?>
                <div class="more-btn text-center mb-2
                     
                      <?php if(($pnum - 3) < 1){ ?>
                      d-none
                    <?php } ?>
                     
                     
                     
                     ">
                      <a href="About/profile/edit/about/?edit=project&id=<?php echo $pnum - 3 ?>" class="btn btn-info btn-block btn-sm"><?php echo $pnum - 3 ; ?> more Projects</a>
                  </div>
                  <?php } ?>
             </div>
             <div class="other my-1">
                 <div class="heading">
                   <h6 class="text-uppercase"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;other</strong></h6>   
               </div>
               <div class="body text-capitalize">
                  <h6>>>><strong>Language:</strong> <?php echo $langdata['other']; ?></h6>
               </div>
                   </div>
   </div>
    </div>
    <!--======================project end====================----->
<!--=====================contact start===============--->
<div class="education info-data my-2 ">
 <div class="heading-data">
 
 <div class="row">
  <div class="col-10">
   <h5 class="mx-2 text-capitalize"> <i class="fas fa-address-book"> </i>&nbsp;&nbsp;contact</h5>
   </div>
   <div class="col-2">
   <span class="text-right bbtn" > 
              <?php if ($_SESSION['uid'] == $uid){?>
               <a href="About/profile/edit/about/?edit=contact"><i class="fas fa-pen"></i></a>
                <?php } ?> 
    </span>
   </div>
   </div>
 </div><div class="body p-2">
   <h6 class="text-capitalize"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;your profile link:</strong></h6>
    <p>wwww.kdhalsfkha.coom</p>
   <h6 class="text-capitalize"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;website:</strong></h6>
    <a href="http://<?php echo $condata['website']; ?>" class="nav-link"><?php echo $condata['website'] ;?></a>
    <h5 class="text-capitalize"><strong><i class="fas fa-star"></i> &nbsp;&nbsp;gmail:</strong></h5>
    <p><?php echo $condata['gmail'] ;?></p>
   </div>
    </div>
</div>
    <!--========================contact end====================----->
<div class="check">
    
</div>
    <div class="check2">
        
    </div>
    

    <script src="source/js/bootstrap.min.js"></script>
    <script src="source/js/all.min.js"></script>
    <script src="js/about/about.min.js"></script>
     <script src="js/about/friend.js"></script>
   
</body>

</html>








<!------=====================================sent request process start-----====================-->

<?php $rid = $_SESSION['uid']; ?>

<?php
                       
                           
             
?>
<script>
    $(document).ready(function(){
    $('#fri').on('click',function(e){
        e.preventDefault();
         $('#addfriend').html("<p class='text-success ml-2'>Cancel</p>");
         $('#fri img').css('background','green');
    
    var aid = "<?php echo $uid ?>";
    var rid = "<?php echo $rid ?>";
      
    $.ajax({
        url:"databases/about/frienddb.php",
        type:"post",
        data:{aid:aid,
             rid:rid
             
             },
        success:function(data){
          res = JSON.parse(data);
           
              
              
           
                $('#addfriend').html(res.msg);
                $('#fri img').css('background','green'); 
                $('.already').html(res.ff);
          
            
           
        }
        
    });
   }); 
   }); 

</script>


<script>
    
    function sentRequest() {

</script>
<?php
             $q = "select * from friend";
             $fire = mysqli_query($conn,$q);
             while($row = mysqli_fetch_array($fire)){
                 if($row['status'] == 0 && $_SESSION['uid'] == $row['reid'] && $uid == $row['acid']){
        ?>
<script>
    $('#addfriend').html("<p class='text-success ml-2'>Cancel</p>");
    $('#fri img').css('background','green');
    

</script>
<?php        
                 }
                 
    if($row['status'] == 1 && $_SESSION['uid'] == $row['reid'] && $uid == $row['acid']){
        ?>
     <script>
      $('#addfriend').html("<p class='text-danger text-uppercase'>connected</p>");
     $('#fri img').attr('src','icon/friends.png');
         $('#fri img').css('background','#ff9933');
     
     
         $('#fri ').attr('disabled',true);
    </script>
<?php        
                 }
                 
                 
                 
             } 
?>
<script>
    }

   

</script>
<!------=====================================sent request process end-----====================-->
<!------=====================================accept request process start-----====================-->

<script>
    function acceptRequest() {
    
</script>
<?php
             $q = "select * from friend";
             $fire = mysqli_query($conn,$q);
             while($row = mysqli_fetch_array($fire)){
            if($row['status'] == 0 && $_SESSION['uid'] == $row['acid'] && $uid ==$row['reid']){
?>
<script>
    $('#addfriend').html("<p class='text-success'>response</p>");
    $('#fri').attr('disabled', true);
    $('.re div').removeClass("d-none");
    

</script>
<?php
    }
                 
                 
                 
                 
 }
?>

<script>
    }

</script>
<!------=====================================accept request process end-----====================-->
<!------=====================================reject request process start-----====================-->
<script>
     
       $('#reject').on('click',function(e){
          //  e.preventDefault();
        $('.re').addClass('d-none');
        $('.re div').hide();
          
        location.reload(true);
        });
    $('#accept').click(function(e){
        //e.preventDefault();
          $('.re').addClass('d-none');
          $('.re div').hide();  
         $('#fri img').attr('src','icon/friends.png');
         $('#addfriend').html("<p class='text-danger text-uppercase'>Connected</p>");
         location.reload(true); 
      
      });
      
</script>
<script>
   
  $('#reject').on('click',function(){

     </script> 
      <?php 
           if(isset($_POST['reject'])){
           $host = $_SESSION['uid'];
           $delete = "DELETE FROM `friend` WHERE acid=$host AND reid= $uid";
           $fire = mysqli_query($conn,$delete);
               if($fire){
                   
               }else{
                   echo "not working";
               }
          }

              ?>
    
      
  <script> 
      
  });
   
</script>
<!------=====================================reject request process end-----====================-->

<!------=====================================accept request process start-----====================-->
<!------===================================== icon and para change start-----====================-->
  <script>
       $('#accept').click(function(){
          $('.re').addClass('d-none');
           $('.re div').hide();           

         $('#fri img').attr('src','icon/friends.png');
         $('#addfriend').html("<p class='text-danger text-uppercase'>Connected</p>");
         location.reload(true);
             
         </script>
  
       
      
     <?php 
    if(isset($_POST['accept'])){
        $host = $_SESSION['uid'];
        $update = "UPDATE `friend` SET `status` = 1 WHERE acid=$host AND reid= $uid";
       $fire = mysqli_query($conn,$update);
    }
      $q = "select * from friend";
    $fire = mysqli_query($conn,$q);
    while($row = mysqli_fetch_array($fire)){
    if($row['status'] == 1 && $_SESSION['uid'] == $row['acid'] && $uid ==$row['reid']){
    ?>
<script>
     $('#addfriend').html("<p class=' text-danger text-uppercase'>Connected</p>");
     $('#fri img').attr('src','icon/friends.png');

     
      $('#fri img').css('background','#ff9933');
  
 
    
</script>
<?php
    }
    }
?>
<script> });</script>











<!------===================================== icon and para change end-----====================-->
<!------=====================================accept request process end-----====================-->
 <script>
    $(document).ready(function(){
       // setInterval(function(){
             sentRequest();
            acceptRequest();
       // },300);
        
       
       
    });
     
      
</script>
<script>
//   setTimeout(function(){
       
       
//       emailReq();
       
//   },15000);

//   function emailReq(){
//     $('#fri').on('click',function(){
//       $.ajax({
//           url:"databases/email_notif.php",
//           success:function(){
               
//           }
//       }); 
//     });
//   }
    
    
    
</script>
