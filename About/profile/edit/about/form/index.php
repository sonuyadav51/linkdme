<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
include('databases/dbconn.php');
  $uid = $_SESSION['uid'];
   $query = "select * from work where wid=$uid";
   $fire = mysqli_query($conn,$query);
  $data = mysqli_fetch_array($fire);
  
if(!isset($_SESSION['uid'])){
    header('Location:../../../../');
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
    <link rel="stylesheet" href="../../../../../source/css/bootstrap.css">
    <link rel="stylesheet" href="../../../../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
 
   <div class="navbar nav">
        <div class="row head justify-content-center">
           
            <div>
                <h6 class="text-center">Edit detail</h6>
            </div>
            
        </div>
    </div>
    <!--============================work edit form start====================-->
    <?php
    if(isset($_GET['work'])){
        
    
    ?>
     <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Work</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control"  placeholder="Edit your work" name="editWork" required></textarea>
                          <button type="submit"  name="wsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../?edit=info" name="wcancel"  class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php }   ?>
   <!--============================work edit form start====================-->  
    <!--============================edu edit form start====================-->
    <?php
    if(isset($_GET['edu'])){
        
    
    ?>
     <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Education</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your college name" name="editcollege" required></textarea>
                          <input type="text" class="form-control my-4" placeholder="edit your branch name" name="editbranch">
                          <input type="number" class="form-control my-4" placeholder="enter your starting year" name="editstart">
                          <input type="number" class="form-control my-4" placeholder="enter your passing year" name="editend">
                          <button type="submit" name="esubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../?edit=info" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php }   ?>
   <!--============================edu edit form end====================-->  
   
    <!--============================current location edit form start====================-->
    <?php
    if(isset($_GET['loac'])){
        
    
    ?>
     <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Current Location</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your current location" name="editclocation" required></textarea>
                         
                          <button type="submit" name="clsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../?edit=info" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php }   ?>
   <!--============================home town edit form start====================-->  
   
   
     <?php
    if(isset($_GET['hloc'])){
        
    
    ?>
     <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit home town</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your home town" name="edithlocation" required></textarea>
                         
                          <button type="submit" name="homesubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../?edit=info" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php }   ?>
   <!--============================home town edit form end====================-->  
   
   
    <!--============================home town edit form start====================-->  
   
   
     <?php if(isset($_GET['rel'])){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Relationship</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your relationship" name="relation" required></textarea>
                         
                          <button type="submit" name="rsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../?edit=info" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php }   ?>
   <!--============================home town edit form end====================-->  
   <!--============================education edit form start====================--> 
     <?php if($_GET['edit'] == "higheduform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit High School</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your highschool" name="high" required></textarea>
                         
                          <button type="submit" name="hsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=edu" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "intereduform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Intermidiate</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your intermidiate" name="inter" required></textarea>
                         
                          <button type="submit" name="isubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=edu" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "graduationeduform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Graduation</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit your graduation" name="gradute" required></textarea>
                         
                          <button type="submit" name="gsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=edu" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "othereduform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Edit Others</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Edit Others ex.traning internship..." name="eduother" required></textarea>
                         
                          <button type="submit" name="eosubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=edu" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <!--============================education edit form end====================--> 
     
     <!--============================skill and achivements edit form start====================--> 
       <?php if($_GET['edit'] == "topskillform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Top Skills</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add your top skills" name="top" required></textarea>
                         
                          <button type="submit" name="topsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=skill" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "toolskillform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Tools And Technique</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add your tool and technique ex.windows,linux..." name="tool" required></textarea>
                         
                          <button type="submit" name="toolsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=skill" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "interskillform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Interpersonal skills</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add your interpesonal skills ex.leadership.." name="interp" required></textarea>
                         
                          <button type="submit" name="ipsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=skill" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "achivementsform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Achivements</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add Your achivements" name="achivements" required></textarea>
                         
                          <button type="submit" name="achivsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=skill" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
    
    
     <!--============================skill and achivements edit form end====================--> 
     <!--============================projects edit form start====================--> 
       <?php if($_GET['edit'] == "projectform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Project</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add your project" name="project" required></textarea>
                         
                          <button type="submit" name="projectsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=project" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "otherproform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Others</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add Language..LIke hindi,english,bhojpuri" name="otherpro" required></textarea>
                         
                          <button type="submit" name="opsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=project" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
    
    
     <!--============================projects edit form end====================--> 
     <!--============================contact edit form start====================--> 
     <?php if($_GET['edit'] == "contactwebform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Website</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add your website" name="website" required></textarea>
                         
                          <button type="submit" name="websubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=contact" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
     <?php if($_GET['edit'] == "contactgmailtform"){ ?>
     
       <div class="container-fluid my-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4 class="text-center">Add Gmail</h4>
                  </div>
                   <div class="card-body">
                     
                      <form action="databases/dbconn.php?id=<?php echo $uid ; ?>" method="post">
                          <textarea class="form-control" placeholder="Add Gmail" name="gmail" required></textarea>
                         
                          <button type="submit" name="gmailsubmit" class="btn btn-success my-3">save</button>
                           
                      </form>
                      <a href="../index.php?edit=contact" class="btn btn-outline-info">cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <?php }   ?>
    
    
     <!--============================contact edit form end====================--> 
    
    
      <script src="../../../../../source/js/jquery-3.3.1.js"></script>
    <script src="../../../../../source/js/bootstrap.min.js"></script>
    <script src="../../../../../source/js/all.min.js"></script>
    <script src="js/editProfile.js"></script>
</body>
</html>
<script>

  let btn = document.querySelector('#btn');
    btn.addEventListener('click',function(e){
        
    })

</script>