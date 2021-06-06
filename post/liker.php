<!DOCTYPE html>
<?php
   include('../databases/dbconn.php');
     session_start();
    error_reporting(0);
    $sesid = $_SESSION['uid'];
    $postid = $_GET['postid'];
 
     
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
    <link rel="stylesheet" href="../css/home/liker.css">
    <script src="../source/js/jquery-3.3.1.js"></script>
</head>

<body>
   

    <nav class="navbar nav  ">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../home.php" class=""><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize text-center">
                  linkdme

                </h6>
            </div>

        </div>
    </nav>
    
    <!---=========================LIST GOES HERE --------------->
    <?php
     $userid = array();
     $query = "SELECT * FROM postreaction WHERE post_id = $postid";
    $fire = mysqli_query($conn,$query);
    while($ids = mysqli_fetch_array($fire)){
        $uid = $ids['user_id'];
        array_push($userid,$uid);
        
    }
    //print_r($userid);
    $num = count($userid);
    for($i=0;$i<$num+1;$i++){
        $id = $userid[$i];
        
        $main_query = "SELECT * FROM student_detail WHERE id = $id AND id != $sesid ORDER BY id DESC";
        $mainfire = mysqli_query($conn,$main_query);
        while($data = mysqli_fetch_array($mainfire)){
            $pic = $data['profile'];
            $array = explode("/",$pic);
            $picname = $array['3'];
    
    
    ?>
    <div class="main p-1 my-1">
        <div class="container">
            <div class="row">
                <div class="col-3">
                 <div class="profile">
                  <a href="../about.php?id=<?php echo $data['id']; ?>"><img src="../About/profile_pic/<?php echo $picname; ?>" alt=""></a>  
                </div>
                </div>
                <div class="col-5 py-3">
                   <a href="../about.php?id=<?php echo $data['id']; ?>"><h5 class="text-capitalize"><?php echo $data['name']; ?></h5></a> 
                </div>
                <div class="col-4 py-3">
                   <a href="../about.php?id=<?php echo $data['id']; ?>" class="btn btn-info btn-sm ">see profile</a> 
                </div>
            </div>
        </div>
    </div>   
        
<?php } } ?>
    




 <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="../js/about/about.min.js"></script>
    
   
</body>

</html>

