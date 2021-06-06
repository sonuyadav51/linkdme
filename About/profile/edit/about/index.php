
<!DOCTYPE html>
<?php
session_start();
  $uid = $_SESSION['uid'];
  if(!isset($_SESSION['uid'])){
    header('Location:../../../../Login/');

}


?>
<?php 
error_reporting(0);
include('databases/dbconn.php');
 
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
   

   $query = "SELECT * FROM relation WHERE rid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $rdata = mysqli_fetch_array($fire);
   

   $eduquery = "SELECT * FROM basicedu WHERE beid=$uid ORDER BY id DESC";
   $edufire = mysqli_query($conn,$eduquery);
   $bedata = mysqli_fetch_array($edufire);
 
   $query = "SELECT * FROM contact WHERE conid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $condata = mysqli_fetch_array($fire);

   $query = "SELECT * FROM skill WHERE skid=$uid";
   $skillfire = mysqli_query($conn,$query);
   

   $query = "SELECT * FROM toolskil WHERE toolid=$uid";
   $toolfire = mysqli_query($conn,$query);

   $query = "SELECT * FROM interpskill WHERE ipid=$uid";
   $interpfire = mysqli_query($conn,$query);

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
 
    <title>Linkdme</title>
    <!--bootstrap css-->
    <link rel="stylesheet" href="../../../../source/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../../../../about.php?id=<?php echo $uid; ?>" class=" ">Cancel</a></span>
            </div>
            <div>
                <h6>Edit <?php echo $_GET['edit']; ?></h6>
            </div>
            <div class="right">
                <span class="text-right"><a href="../../../../about.php?id=<?php echo $uid; ?>"  class="text-right">Save</a></span>
            </div>
        </div>
    </div>

    <!--====================work edit start===================-->
    
  <?php if($_GET['edit'] == "info") { ?>
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-briefcase"></i>
                        </span>
                        <span class="mx-3"> <strong>work </strong></span>
                    </div>


                    <div class="card-body">
                        <table class="table">
                           
                            <tr> 
                               <div class="row">
                               <div class="col-10">
                                <td><strong>Work at : </strong> <?php echo $data['work']; ?>  </td>
                                </div>
                                <div class="col-2">
                                <td class=""><a href="form/?work=edt_wrk&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></td>
                                </div>
                             </div>
                            </tr>

                        </table>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--====================work edit end===================-->
    <!--====================education edit start===================-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="mx-3"><strong>Education</strong> </span>
                    </div>


                    <div class="card-body">
                        <table class="table">
                            <tr class="">
                               <div class="row">
                               <div class="col-10">
                                <td><strong>College : </strong> <?php echo $edudata['college']; ?></td>
                                   </div>
                                    <div class="col-2">
                                <td><a href="form/?edu=edt_cname&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></td>
                                    </div>
                                </div>
                            </tr>
                            
                            <tr>
                               <div class="row">
                                <div class="col-10">
                                <td><strong>Branch :</strong> <?php echo $edudata['branch']; ?></td>
                                </div>
                                </div>
                            </tr>
                             <tr>
                               <div class="row">
                                <div class="col-10">
                                <td><strong>Stariting Year :</strong> <?php echo $edudata['start']; ?></td>
                                </div>
                                </div>
                            </tr>
                             <tr>
                               <div class="row">
                                <div class="col-10">
                                <td><strong>Passing Year :</strong> <?php echo $edudata['end']; ?></td>
                                </div>
                                </div>
                            </tr>

                        </table>
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================education edit end===================-->


 <!--====================current city edit start===================-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-home"></i>
                        </span>
                        <span class="mx-3"><strong>Currnet city  </strong> </span>
                    </div>


                    <div class="card-body">
                       <div class="row">
                       <div class="col-10">
                        <span class="city">Lived in: <?php echo $cldata['clocation']; ?></span>
                        </div>
                        <div class="col-2">
                        <span class="edit-pencil"><a href="form/?loac=edt_loc&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====================current city edit end===================-->
    
    <!--====================home town edit start===================-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="mx-3"><strong>Home town  </strong> </span>
                    </div>


                    <div class="card-body">
                       <div class="row">
                       <div class="col-10">
                        <span class="city">From : 
                          <?php echo $hdata['haddress']; ?></span>
                        </div>
                        <div class="col-2">
                        <span class="edit-pencil"><a href="form/?hloc=edt_hloc&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--====================home town edit end===================-->
    
     <!--====================relationship edit start===================-->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                       
                        <span>
                            <i class="fas fa-heart"></i>
                        </span>
                        <span class="mx-3"> <strong>Relationship </strong></span>
                    </div>


                    <div class="card-body">
                       <div class="row">
                       <div class="col-10">
                        <span class="city">status: 
                          <?php echo $rdata['relation']; ?></span>
                           </div>
                           <div class="col-2">
                        <span class="edit-pencil"><a href="form/?rel=edt_rel&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==================== edit Relationship end===================-->
    
     <!--====================knit adda joined start===================-->
    <div class="container-fluid my-3 mb-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-map-marker-alt"></i>
                        </span>
                        <span class="mx-3"> Joined knit adda</span>
                    </div>


                    <div class="card-body">
                        <span class="city"> 
                        October 2019</span>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php }  ?>
    <?php if($_GET['edit'] == "edu"){ ?>
        <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-graduation-cap"></i>
                        </span>
                        <span class="mx-3"> <strong>Education </strong></span>
                    </div>


                    <div class="card-body">
                       <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;high school</h5>
                        <div class="row">
                            
                            <div class="col-10">
                             
                              <p><?php echo $bedata['high'] ;?></p>
                             
                            </div>
                            <div class="col-2">
                                 <span class="edit-pencil"><a href="form/?edit=higheduform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                            </div>
                        </div>
                         <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;intermidiate</h5>
                        <div class="row">
                            
                            <div class="col-10">
                             
                              <p><?php echo $bedata['inter'] ;?></p>
                            
                            </div>
                            <div class="col-2">
                                 <span class="edit-pencil"><a href="form/?edit=intereduform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                            </div>
                        </div>
                         <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;gradutation</h5>
                        <div class="row">
                            
                            <div class="col-10">
                           
                              <p><?php echo $bedata['graduate'] ;?></p>
                             
                            </div>
                            <div class="col-2">
                                 <span class="edit-pencil"><a href="form/?edit=graduationeduform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                            </div>
                        </div>
                       <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;other</h5>
                        <div class="row">
                            
                            <div class="col-10">
                             
                              <p><?php echo $bedata['eduother'] ;?></p>
                              
                            </div>
                            <div class="col-2">
                                 <span class="edit-pencil"><a href="form/?edit=othereduform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php  } ?>
    
     <?php if($_GET['edit'] == "skill"){ ?>
        <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-gem"></i>
                        </span>
                        <span class="mx-3"> <strong>Skill </strong></span>
                    </div>


                    <div class="card-body">
                      
                       <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;Top skills &nbsp;&nbsp;<small><a href="form/?edit=topskillform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></small></h5> 
                      
                        <div class="row">
                            
                            <div class="col-10">
                              <ul class="">
                                 <?php while($topdata = mysqli_fetch_array($skillfire)) { ?>
                                  <li id="li<?php echo $topdata['id']; ?>"> <?php echo $topdata['top']; ?>&nbsp;&nbsp;  <span class=""><a href="#" class="trash" style="color:#ff9933;" data-id="<?php echo $topdata['id']; ?>"><i class="fas fa-trash"></i></a></span></li>
                                   <?php } ?>
                                 
                                  
                              </ul>
                            </div>
                            <div class="col-2">
                                
                            </div>
                        </div>
                        <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;Tools and technique &nbsp;&nbsp;<small><a href="form/?edit=toolskillform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></small></h5>
                        <div class="row">
                            
                            <div class="col-10">
                              <ul class="">
                                 <?php while($tooldata = mysqli_fetch_array($toolfire)) { ?>
                                  <li id="li<?php echo $tooldata['id']; ?>"> <?php echo $tooldata['tool']; ?>&nbsp;&nbsp; <span class=""><a href="#" class="trash" style="color:#ff9933;" data-id="<?php echo $tooldata['id']; ?>"><i class="fas fa-trash"></i></a></span></li>
                                   <?php } ?>
                                 
                                  
                                  
                              </ul>
                            </div>
                            <div class="col-2">
                                 
                            </div>
                        </div>
                        <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;interpersonal skills &nbsp;&nbsp;<small> <a href="form/?edit=interskillform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></small></h5>
                        <div class="row">
                            
                            <div class="col-10">
                              <ul class="">
                                   <?php while($interpdata = mysqli_fetch_array($interpfire)) { ?>
                                  <li id="li<?php echo $interpdata['id']; ?>">   <?php echo $interpdata['interp']; ?> &nbsp;&nbsp; <span class=""><a href="#" class="trash" style="color:#ff9933;" data-id="<?php echo $interpdata['id']; ?>"><i class="fas fa-trash"></i></a></span></li>
                                   <?php } ?>
                                  
                                  
                                  
                              </ul>
                            </div>
                            <div class="col-2">
                                
                            </div>
                        </div>
                     </div>
                </div>
            </div>
        </div>
    </div>
     <!--=============================achivements==========================---->  
      <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-trophy"></i>
                        </span>
                        <span class="mx-3"> <strong>Achivements </strong></span>
                    </div>


                    <div class="card-body">
                       <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;achivements &nbsp;&nbsp; <small class=""><a href="form/?edit=achivementsform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></small></h5>
                        <div class="row">
                            
                            <div class="col-10">
                              <ul class="">
                                  <?php while($achivdata = mysqli_fetch_array($achivfire)) { ?>
                                  <li id="li<?php echo $achivdata['id']; ?>">  <?php echo $achivdata['achivement']; ?> &nbsp;&nbsp;<span class=""><a href="#" class="trash" style="color:#ff9933;" data-id="<?php echo $achivdata['id']; ?>"><i class="fas fa-trash"></i></a></span></li>
                                   <?php } ?>
                                  
                              </ul>
                            </div>
                            <div class="col-2">
                                
                            </div>
                        </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>              
  <?php } ?>
    
     <?php if($_GET['edit'] == "project"){ ?>
        <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-project-diagram"></i>
                        </span>
                        <span class="mx-3"> <strong>projects </strong></span>
                    </div>


                    <div class="card-body">
                       <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;pojects  &nbsp;&nbsp;<small class=""><a href="form/?edit=projectform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></small></h5>
                        <div class="row">
                            
                            <div class="col-10">
                              <ul class="">
                                 <?php while($prodata = mysqli_fetch_array($profire)) { ?>
                                <li id="li<?php echo $prodata['id']; ?>">   <?php echo $prodata['project']; ?> &nbsp;&nbsp;<span class=""><a href="#" class="trash" style="color:#ff9933;" data-id="<?php echo $prodata['id']; ?>"><i class="fas fa-trash"></i></a></span></li>
                                   <?php } ?>
                                  
                              </ul>
                            </div>
                            <div class="col-2">
                                
                            </div>
                        </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>     
<!--===============================others======================------->
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-compress"></i>
                        </span>
                        <span class="mx-3"> <strong>others </strong></span>
                    </div>


                    <div class="card-body">
                       <h5 class="text-capitalize"><i class="fas fa-star"></i> &nbsp;&nbsp;others  &nbsp;&nbsp;<small class=""><a href="form/?edit=otherproform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></small></h5>
                        <div class="row">
                            
                            <div class="col-10">
                              
                             
                                  <li id="li<?php echo $langdata['id']; ?>"> <?php echo $langdata['other']; ?> </li>
                                  
                            </div>
                            <div class="col-2">
                                
                            </div>
                        </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>     

    
    
    
    <?php } ?>
     <?php if($_GET['edit'] == "contact"){ ?>
       
      <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span>
                            <i class="fas fa-address-book"></i>
                        </span>
                        <span class="mx-3"> <strong>Contact </strong></span>
                    </div>


                    <div class="card-body ">
                       
                           <h5 class=""><i class="fas fa-star"></i> &nbsp;&nbsp;Website</h5>
                        <div class="row">
                            
                            <div class="col-10">
                              <p class=""><?php echo $condata['website']; ?></p>
                            </div>
                            <div class="col-2">
                                 <span class="edit-pencil"><a href="form/?edit=contactwebform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                            </div>
                        </div>
                           <h5 class=""><i class="fas fa-star"></i> &nbsp;&nbsp;Gmail</h5>
                        <div class="row">
                            
                            <div class="col-10">
                              <p class=""><?php echo $condata['gmail']; ?></p>
                            </div>
                            <div class="col-2">
                                 <span class="edit-pencil"><a href="form/?edit=contactgmailtform&id=<?php echo $uid;  ?>"><i class="fas fa-pen"></i></a></span>
                            </div>
                        </div>
                            </div>
                     </div>
                </div>
            </div>
        </div>     
     
     
     <?php  }  ?>
    
    
    <!--====================knit adda joined edit end===================-->
  <a href="../../../../about.php?id=<?php echo $uid; ?>" type="button" name="save" class="btn btn-primary btn-block fixed-bottom">save</a>




    <script src="../../../../source/js/jquery-3.3.1.js"></script>
    <script src="../../../../source/js/bootstrap.min.js"></script>
    <script src="../../../../source/js/all.min.js"></script>
    <script src="js/editpro.min.js"></script>

</body>
</html>

