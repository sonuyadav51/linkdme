<?php
   include('../databases/dbconn.php');
     session_start();
     $uid =$_GET['id'] ;
    $query = "select * from student_detail where id =$uid";
    $fire = mysqli_query($conn,$query);
    $ndata = mysqli_fetch_array($fire);
    $sid = $_SESSION['uid'];
   
if(!isset($_SESSION['uid'])){
    header('Location:../Login/');
}
    
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
    <link rel="stylesheet" href="css/frndlist/style.css">
    <script src="../source/js/jquery-3.3.1.js"></script>
</head>

<body style="background:lightyellow;">
   
 <div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../about.php?id=<?php echo $_SESSION['uid'] ; ?>" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                    <?php echo $ndata['name']; ?>

                </h6>
            </div>

        </div>
    </div>
   
   
        <h3 class="mx-2 mt-3 text-capitalize text-center">
        
        
        <?php if($_SESSION['uid'] == $uid){ ?>
        your
        <?php } ?>
           connections</h3>
         
    <?php 
     $friend = "select * from friend";
   $fire = mysqli_query($conn,$friend);
   $frindid = array();
   while($row = mysqli_fetch_array($fire)){
       if($_SESSION['uid'] == $_GET['id']){
       if($_SESSION['uid'] == $uid && ($row['reid'] == $uid || $row['acid'] == $uid) && $row['status'] == 1){
          $reid = $row['reid']." "; 
          $acid = $row['acid']." "; 
           
         array_push($frindid,$reid); 
         array_push($frindid,$acid);
      }
           }else{
           if( ($row['reid'] == $uid || $row['acid'] == $uid) && $row['status'] == 1){
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
                $req = "select * from student_detail where id=$num && id !=$uid";
                $fire = mysqli_query($conn,$req);
                while($du = mysqli_fetch_array($fire)){
                    $pic = $du['profile'];
                    $array = explode('/',$pic);
                    $picname = $array['3'];
                     
                  ?>
<div class="p-1 my-1 col-md-6 mx-md-auto" style="background:#fff; box-shadow:0px 10px 10px rgba(0,0,0,0.2);">
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
                                            <div class="col-12 text-capitalize" >
                                 <form action="friendlist.php?id=<?php echo $_SESSION['uid'] ; ?>" method="post">
                <button class="btn btn-outline-danger "  onclick="unfriend(<?php echo $du['id']; ?>)">Disconnest</button>
                                               </form>
                                            </div>
                                        </div>
                                    </div>

                                </span>
                                 <?php }else {  ?>
                                 <a href="../about.php?id=<?php echo $du['id']; ?>" class="btn btn-outline-info mt-3">see profile</a>
                                <?php } ?>
                                 
                                
                                
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


    






    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="js/"></script>


</body>

</html>
<script>

  function unfriend(unid){
   
        $.ajax({
          url:"unfriend.php",
          type:"post",
          data:{
              unid : unid
                      
          },
          success:function(data,status){
            location.reload();
              
          }
          
          
          
      });
      
    
   
   
  }

</script>

