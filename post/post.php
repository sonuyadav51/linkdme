
<?php include('../databases/dbconn.php');
error_reporting(0);
session_start();
$id = $_SESSION['uid'];
  $query = "select * from student_detail where id  = $id";
  $fire = mysqli_query($conn,$query);
   $data = mysqli_fetch_array($fire);
    $pic = $data['profile'];
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
    <link rel="stylesheet" href="../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/post.css">
</head>

<body style="background:lightyellow">

<div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../home.php" class=" ">cancel</a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                 Your thoughts
                
                </h6>
            </div>
            
        </div>
    </div>
    
    <div class="post-input col-md-4 mx-md-auto my-md-5" style="box-shadow:0px 10px 15px black; border-radius:7px;">
    <div class="container-fluid">
       <div class="row">
           <div class="col-12 info" style="border:0px; margin-left:150px;">
              <span class=""><a href="../about.php?id=<?php echo $id ?>"><img src="../About/profile_pic/<?php echo $picname ?>" alt="" style="width:60px; height:60px;"></a></span> 
              <span class="mx-3 text-capitalize"><strong><a href="../about.php?id=<?php echo $id ?>" style="font-size:1.2rem;"><?php echo $data['name']; ?></a></strong></span>
           </div>
           
       </div>
        
    </div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 ">
           <div class="post">
            <form action="datapost.php?id=<?php echo $id ?>" id="some" method="post" enctype="multipart/form-data">
                <textarea type="text" placeholder="Write here...." name="post-content" class="a"></textarea><br><br>
                <input type="file" id="img" name="postimg" multiple accept="image/*"  class="b">
                <label for="img" class="btn btn-danger btn-sm">upload image</label>
                <!--
                 <input type="file" accept="video/*" name="postvideo" id="video" class="c">
                 <label for="video" class="btn btn-info btn-sm">upload video</label>
                 -->
                 <small class="hint"></small>
                <span class="preview mx-3">
                  
                    <img src="" alt="">
                </span>
                
               
                <button type="submit" name="submit" class="btn btn-primary btn-block text-uppercase mt-3" id="postbtn" >post</button>
                <div class="progress my-2 d-none">
                  <div class="progress-bar bg-success" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"     aria-valuemax="100"></div>
                </div>
                <div class="progressr alert-info p-2 d-none"></div>
           </form>
            </div>
        </div>
    </div>
</div>
</div>






    <script src="../source/js/jquery-3.3.1.js"></script>
    <script src="../source/js/bootstrap.min.js"></script>
    <script src="../source/js/all.min.js"></script>
    <script src="js/post.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.min.js"></script>
</body>

</html>






<script>
  $(document).ready(function(){
    $('#postbtn').attr('disabled','disabled');
$('.a').keyup(function(){
    $('#postbtn').removeAttr("disabled");
    if($(this).val() == ""){
        $('#postbtn').attr('disabled','disabled');
    }
});
$('.b').on('change',function(){
    $('#postbtn').removeAttr("disabled");
});
    $('.c').on('change',function(){
    $('#postbtn').removeAttr("disabled");
    $('.hint').html("<span class='text-success text-capitalize ' style='font-size:1rem;'>video is selected</span>");    
});  
   
   
 
        $('#postbtn').on('click',function(e){
            $('.progress').removeClass("d-none");
          //  e.preventDefault();
           $('#some').ajaxSubmit({
              uploadProgress: function(event,position,total,percomplete){
                  $('.progress-bar').css('width',percomplete+'%');
                   $('.progress-bar').html(percomplete+'%');
                   if(percomplete == 100){
                       $('.progress').hide();
                       $('.progressr').removeClass("d-none");
                        $('.progressr').html("<h5 class='text-capitalize text-center my-2'>posting to linkdme <img src='img/load.gif'></img></h5>");
                   }
              },
              success:function(){
                  
               }
               
        });
        });
        });
</script>