
<?php
include('../../databases/dbconn.php');
       
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../../Login/');
}

$postid = $_GET['postid'];

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
    <link rel="stylesheet" href="css/edit.css">
    <style>
        textarea:focus{
            outline: none;
            box-shadow:0px 10px 15px black;
        }
        
    </style>
     
</head>

<body style="background:lightyellow;">
<nav class="nav navbar">
    <span><a href="../../home.php"><i class="fas fa-arrow-left"></i></a></span>
    <h5 class="text-center">Edit post</h5>
    <button class="btn btn-success btn-sm save">save</button>
</nav>

<div class="container my-4">
    <div class="row">
        <div class="col-12 p-4 col-md-6 mx-md-auto" style="background:white; border-radius:7px; box-shadow:0px 10px 15px black;">
            <textarea name="edit" id="text" style="border:3px solid #ff9933; border-radius:7px;"></textarea>
            <button class="btn btn-success btn-block save my-2">save</button>
        </div>
    </div>
</div>





 <script src="../../source/js/jquery-3.3.1.js"></script>
    <script src="../../source/js/bootstrap.min.js"></script>
    <script src="../../source/js/all.min.js"></script>
   
</body>

</html>

<script>

$(document).ready(function(){
   
   var postid = "<?php  echo $postid ;?>";
    $.ajax({
        url:"databases/editpostdb.php",
        method:"post",
        data:{postid:postid},
        success:function(data){
            
            $('#text').val(data);
        }
    });
    
    $('.save').on('click',function(){
        var postid = "<?php  echo $postid ;?>";
        var post = $('#text').val();
        $.ajax({
        url:"databases/updatepostdb.php",
        method:"post",
        data:{
            postid:postid,
            post:post
        },
        success:function(data){
            window.location.replace("../../home.php#single"+postid);
            
        }
        
    });
    });
    
});


</script>
