
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
    <link rel="stylesheet" href="../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/privacy.css">

</head>

<body>


 <div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../home.php" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                    <?php echo $data['name']; ?>

                </h6>
            </div>

        </div>
    </div>
   
    <div class="container bg-info setting text-center text-uppercase">
        privacy
    </div>
     <div class="container info-head">
        <div class="row">
            <div class="changepwd ">
                <a href="#" class="text-capitalize"><i class="fas fa-user-shield"></i> Your personal information</a>
            </div>
        </div>
    </div>
<div class="info d-none">
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card my-3">
                <div class="card-header">
                   <span><strong><i class="fas fa-user"></i> &nbsp; Name</strong></span>
                </div>
                <div class="card-body">
                   <span class="text-capitalize"><?php echo $data['name']; ?></span> 
                </div>
            </div>
             <div class="card my-3">
                <div class="card-header">
                   <span><strong><i class="fas fa-envelope"></i> &nbsp; Email</strong></span>
                </div>
                <div class="card-body">
                   <span ><?php echo $data['email']; ?></span> 
                </div>
            </div>
             <div class="card my-3">
                <div class="card-header">
                   <span><strong><i class="fas fa-mobile"></i> &nbsp; Mobile</strong></span>
                </div>
                <div class="card-body">
                   <span class=""><?php echo $data['roll_no']; ?></span> 
                </div>
            </div>
        </div>
    </div>
</div>


</div>



    
    <script src="../source/js/jquery-3.3.1.js"></script>
    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="js/privacy.js"></script>
</body>

</html>
<script>
    $(document).ready(function(e){
        $('.info-head').click(function(){
             
            $('.info').toggleClass("d-none");
            
            
        });
       
        
        
        
    });
    
    
</script>
