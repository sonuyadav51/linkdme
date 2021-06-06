<?php
     include('databases/dbconn.php');
     session_start();
     $uid =$_GET['id'] ;
    $query = "select * from student_detail where id =$uid";
    $fire = mysqli_query($conn,$query);
    $ndata = mysqli_fetch_array($fire);
     
   if(!isset($_SESSION['uid'])){
       header('Location:../../../');
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
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/croppie.css">
    
    
</head>
<?php if ($_SESSION['uid'] == $uid){?>
<body>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal" role="dialog" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="row">
       <div class="col-8">
        <div id="image_demo" style="width:300px; margin-top:30px;"></div>
        </div>
          </div>
      </div>
      <div class="modal-footer">
       <button type="submit" name="uploadbtn" class="btn btn-success btn-block uploadbtn">Crop & Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>



<div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../../about.php?id=<?php echo $_SESSION['uid']; ?>" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
               <?php echo $ndata['name']; ?>
                
                </h6>
            </div>
            
        </div>
    </div>



<div class="main">
    

  <div class="container">
      <div class="row justify-content-center">
          <div class="col-10">
             
                  <input type="file" id="file" name="uploadimg">
                  <label for="file" class="label btn btn-primary btn-block" >Upload Image</label>
                  
                  <div id="uploaded_image"></div>
                 
                  
         
          </div>
      </div>
  </div>
</div>

<div class="img">
<hr>
 <h5 class="mx-4">Suggestion</h5>
 
  <?php
    include('databases/dbconn.php');
   $query = "SELECT * FROM profile_pic WHERE pid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   
    
        
         
    

    ?>
   
   <div class="container">
       <div class="row upload-img">
        <?php while($picdata = mysqli_fetch_assoc($fire)){ 
           $newpic = $picdata['image'];
           $array = explode('&',$newpic);
            $new = $array[1];
    ?>
           <div class="col-3 my-1">
              <img src="../../../About/profile_pic/<?php echo $new ?>" alt="">
           </div>
         <?php } ?> 
        
       
       </div>
         <hr>
   </div>
   
</div>
<?php }else{ ?>
    <div class="img" style="margin-top:-330px;">
<hr>
 <h5 class="mx-4">Uploaded photo</h5>
 
  <?php
    include('databases/dbconn.php');
   $query = "SELECT * FROM profile_pic WHERE pid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   
    
        
         
    

    ?>
   
   <div class="container">
       <div class="row upload-img">
        <?php while($picdata = mysqli_fetch_assoc($fire)){ 
           $newpic = $picdata['image'];
           $array = explode('&',$newpic);
            $new = $array[1];
    ?>
           <div class="col-3">
              <img src="../../../About/profile_pic/<?php echo $new ?>" alt="">
           </div>
         <?php } ?> 
        
       
       </div>
         <hr>
   </div>
   
</div>
    

    
<?php } ?>
    
 

    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/croppie.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="fontawesome/js/all.js"></script>
    <script src="js/uplo.js"></script>

</body>
</html>
<script>
$(document).ready(function(){
   $image_crop = $('#image_demo').croppie({
       enableExif:true,
       viewport:{
           width:150,
           height:150,
           type:'circle'
       },
       boundary:{
           width:200,
           height:200
       }
   }); 
    $('#file').on('change',function(){
       var reader = new FileReader();
        reader.onload = function(event){
            $image_crop.croppie('bind',{
                url:event.target.result
            }).then(function(){
                console.log("jquery bind complete");
            })
        }
        reader.readAsDataURL(this.files[0]);
        $('#modal').modal('show');
    });
    
});


</script>
