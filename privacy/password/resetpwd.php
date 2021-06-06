
      <?php  include('../../databases/dbconn.php');
       
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../../Login/');
}
 $id=$_SESSION['uid'];
$query = "select * from student_detail where id = $id";
$fire = mysqli_query($conn,$query);
$data = mysqli_fetch_array($fire);
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
    <link rel="stylesheet" href="../../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/pwd.css">

</head>

<body>

    <div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../../home.php" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                    <?php echo $data['name']; ?>

                </h6>
            </div>

        </div>
    </div>
    <?php if(!isset($_GET['new'])) {?>
    <?php if(!isset($_GET['set'])){?>
    <div class="container bg-info setting text-center text-uppercase">
        setting
    </div>
    <div class="container">
        <div class="row">
            <div class="changepwd ">
                <a href="resetpwd.php?set=changepwd"><i class="fas fa-key"></i> change your password</a>
            </div>
        </div>
    </div>

    <?php } ?>

    <?php if(isset($_GET['set']) ){?>
    <div class="container">
        <div class="jumbotron my-4 resetpwd">
            <h4 class="text-capitalize mx-3">Enter your current password </h4>
            <div class="row">

                <div class="col-10">
                    <form action="databases/resetdb.php" method="post">
                        <input type="password" id="resetpwd" class="form-control" placeholder="Enter your current password" name="reset">
                        <button type="submit" class="btn btn-success my-2" name="resetsubmit" id="resetsubmit">submit </button>
                    </form>
                </div>
                <?php if($_GET['set'] == "error" ) {?>
                <h4 class="text-danger text-capitalize mx-5">password not mached !!</h4>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php }?>
    <?php } ?>



   
    <?php if(isset($_GET['new'])) {?>
    <div class="container">
   
    <div class="row jumbotron">
     <?php if($_GET['new']== "success") { ?>
         <div class="text-center text-capitalize alert-success">
          <?php echo "Password changed successfully "; ?>
        </div> 
            <?php  } ?>
    <form action="databases/resetdb.php" method="post">
    <div class="input-container">
       <label for="upwd">New password (must be between 5 to 15)*</label>
        <input type="password" name="upwd" class="form-control u " id="p" required="" placeholder="Enter new password">
        
    </div>
    <div class="input-container">
        <label for="cpwd">Confirm password*</label>
        <input type="password" name="cpwd" class="form-control u" id="cp" required="" placeholder="Confirm new password" required>
       
        <span class="text-danger cph"></span>
    </div>
    <input type="submit" name="newsubmit" id="signbtn" class="my-2 nextbtn  btn btn-success btn-sm text-uppercase" value="save change" required>
    </form>
    <div class="msg">
        
         

    </div>
    </div>
    </div>
   
  <?php } ?>
 
        
    
    <script src="../../source/js/jquery-3.3.1.js"></script>
    <script src="../../source/js/bootstrap.min.js"></script>
    <script src="../../source/js/all.min.js"></script>
    <script src="js/pwd.js"></script>
</body>

</html>
