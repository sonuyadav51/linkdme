<?php  include('../databases/dbconn.php');
       
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../Login/');
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

   $cfriend = "select * from friend where (acid= $id OR reid = $id) AND status = 1";
   $cfire = mysqli_query($conn,$cfriend);
   $ccnum = mysqli_num_rows($cfire);




?>
<?php

  $picquery = "select * from student_detail where id =$id";
  $picfire = mysqli_query($conn,$picquery);
  $picdata = mysqli_fetch_array($picfire);
  $pic = $picdata['profile'];
  $array = explode('/',$pic);
  $picname = $array['3'];

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
    <link rel="stylesheet" href="../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/frndreqst/style.css">
    <link rel="stylesheet" href="../css/home/home.css">
    <link rel="stylesheet" href="../css/home/noti.css">
    <script>
    var mainid = "<?php echo $_SESSION['uid'];  ?>";
    </script>
    <script src="../source/js/jquery-3.3.1.js"></script>
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



    <nav class="nav navbar   fixed-bottom btm-nav" style="">
        <div class=" " style="width:100%;">
            <div class="nav-a d-flex justify-content-between mx-auto mt-md-1" style="">

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

               




                <a href="" class=" reqnoti">
                    <div class="count d-none">
                        <p class="rn"></p>
                    </div>

                    <div class="col-2">

                        <i class="fas fa-users"></i>

                    </div>
                </a>
                <a href="../post/post.php?id=<?php echo $id; ?>" class="d-md-none  ">
                    <div class="col-2  ">
                        <i class="fas fa-plus-circle"></i>
                    </div>
                </a>

                <a href="../message/msg.php" class="msgnoti">
                    <div class="msgnoti">
                        <div class="mcount d-none" style="margin-left:25px; margin-top:-5px;">
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
    <div class="  ser container-fluid d-none longscr" style=" background:white; position:absolute; z-index:1; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
        <div class="row longscr">
            <div class="col-12 col-md-6 mx-md-auto my-3">
                <div class="search-result">

                </div>
            </div>
        </div>
    </div>
    <!---=======================POST INPUT SECTION START=======================--->
    <section class="post-section p-1  d-md-none fixed-top" style="background:#ff9933;">
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
                        <label for="search" class="search-icon"><i class="fas fa-search"></i></label>
                    </form>




                </div>
                <div class="col-2 pr-4 noti">
                    <div class="ncount">
                        <p class="no"> </p>
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
    <div class="mt-5">
    <div class="hed  pt-md-3 col-md-6 mx-md-auto">
        <div class="container ">
            <div class="row mx-5 d-flex" style="">


                <a href="request.php?id=<?php echo $id; ?>&action=2" class="text-center 
                     d-none
                    <?php
                     $req = $_GET['action']; 
                   if($req == 2): 
                    ?>
                    active
                    <?php endif ; ?>
                    
                    
                    
                    
                    
                    "><i class="fas fa-users "></i>Suggestion</a>




                <a href="request.php?id=<?php echo $id; ?>&action=0" class="text-center  
                    mx-2
                    <?php
                     $req = $_GET['action']; 
                   if($req == 0): 
                    ?>
                    active
                    <?php endif ; ?>
                    
                    
                    
                    "><i class="fas fa-user-plus "></i> <br> Request <br>
                    <?php echo $number; ?></a>


                <a href="request.php?id=<?php echo $id; ?>&action=1" class="text-center 
                    
                    <?php
                     $req = $_GET['action']; 
                   if($req == 1): 
                    ?>
                    active
                    <?php endif ; ?>
                    
                    
                    
                    
                    "><i class="fas fa-user-friends"></i>Connection <br>
                    <?php echo $ccnum; ?></a>


            </div>
        </div>
    </div>
    <!-- REEQUEST START -->
    <?php
    $req = $_GET['action']; 
    if($req == 0){ 
    ?>
    <h5 class="text-capitalize  text-center mt-4 " >connection Request</h5>


    <?php 
   if($number == 0){
       echo "<h4 class='mx-5 text-capitalize'> no pending request</h4>"; 
    }
    
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
                     $pic = $du['profile'];
                    $array = explode('/',$pic);
                    $picname = $array['3'];
                     $reidd = $du['id'];
               
?>

    <div class="rqs col-md-6 mx-md-auto">
        <div class="container-fluid  ">

            <div class="row text-capitalize">
                <div class="col-xs-12">
                    <table class="">
                        <tr class="text-capitalize ml-2 dele">
                            <td class="pt-2"><a href="../about.php?id=<?php echo $du['id']; ?>">
                                    <div class="img "><img src="../About/profile_pic/<?php echo  $picname ; ?>" alt=""></div>
                                </a></td>
                            <td class="pl-2 pt-3"><a href="../about.php?id=<?php echo $du['id']; ?>"><strong>
                                        <?php echo $du['name']; ?></strong></a>
                                <form action="request.php?id=<?php echo $uid ?>" method="post">

                                    <button class="btn btn-outline-success  text-uppercase  mx-1 my-2 reject" onclick="acceptRequest(<?php echo $du['id']; ?>)">accept</button>
                                    <button class="btn btn-outline-danger  text-uppercase reject" onclick="deleteRequest(<?php echo $du['id']; ?>)">reject</button>
                                </form>
                            </td>



                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <?php } ?>
    <?php } ?>
    <!-- REQUEST END -->
    <!-- SUGGESTION START -->






    <!-- SUGGESTION END -->
    <!-- CONNECTION START -->


    <?php
    $req = $_GET['action']; 
    if($req == 1): 
    ?>
    <div class="">
        <h5 class="text-center mt-3 text-capitalize">your connections</h5>
        <?php 
     $friend = "select * from friend";
   $fire = mysqli_query($conn,$friend);
   $frindid = array();
   while($row = mysqli_fetch_array($fire)){
       if($_SESSION['uid'] == $_GET['id']){
       if($_SESSION['uid'] == $id && ($row['reid'] == $id || $row['acid'] == $id) && $row['status'] == 1){
          $reid = $row['reid']." "; 
          $acid = $row['acid']." "; 
           
         array_push($frindid,$reid); 
         array_push($frindid,$acid);
      }
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
                $req = "select * from student_detail where id=$num && id !=$id";
                $fire = mysqli_query($conn,$req);
                while($du = mysqli_fetch_array($fire)){
                    $pic = $du['profile'];
                    $array = explode('/',$pic);
                    $picname = $array['3'];
                     
                  ?>
        <div class="rqs col-md-6 mx-md-auto">
            <div class="container-fluid">

                <div class="row text-capitalize">
                    <div class="col-xs-12">
                        <table class="">
                            <tr class="text-capitalize ml-2">
                                <td><a href="../about.php?id=<?php echo $du['id']; ?>">
                                        <div class="img "><img src="../About/profile_pic/<?php echo  $picname ; ?>" alt=""></div>
                                    </a></td>
                                <td class=" px-3"><a href="../about.php?id=<?php echo $du['id']; ?>"><strong>
                                            <?php echo $du['name']; ?></strong></a><br>
                                    <?php  if($_SESSION['uid'] == $_GET['id']){ ?>
                                    <span class="dropdown"><button class="btn btn-outline-info  text-uppercase my-3 " data-toggle="collapse" data-target="#unfriend<?php echo $du['id']; ?>">Connected</button>
                                        <div class="container-fluid collapse btnMenu" id="unfriend<?php echo $du['id']; ?>">
                                            <div class="row">
                                                <div class="col-12 text-capitalize">
                                                    <form action="request.php?id=<?php echo $_SESSION['uid'] ; ?>&action=1" method="post">
                                                        <button class="btn btn-outline-danger " onclick="unfriend(<?php echo $du['id']; ?>)">Disconnest</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                    </span>
                                    <?php }?>
                                </td>




                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>




        <?php
     }
             }
?>


    </div>

    <?php endif; ?>

    <!-- CONNECTION END -->
</div>



    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="../js/home/home.js"></script>
    <script src="js/frndreqst/request.min.js"></script>



</body>

</html>

<script>



</script>





<?php 

  
    if(isset($_POST['deleteid'])){
        $deleteid = $_POST['deleteid'];
        
        $delete = "delete from friend where reid=$deleteid and acid = $id and status = 0";
        $fire = mysqli_query($conn,$delete);
        
        
        }





    if(isset($_POST['acceptid'])){
        $acceptid = $_POST['acceptid'];
        
        $accept = "update friend set status = 1 where reid=$acceptid and acid = $id and status = 0";
        $fire = mysqli_query($conn,$accept);
        
        
        }



?>

   