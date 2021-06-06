 <?php
     include('../../../databases/dbconn.php');
     session_start();
     $uid =$_GET['id'] ;
    $query = "select * from student_detail where id =$uid";
    $fire = mysqli_query($conn,$query);
    $ndata = mysqli_fetch_array($fire);
     
   if(!isset($_SESSION['uid'])){
       header('Location:../../../Login/');
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
    <link rel="stylesheet" href="../../../source/css/bootstrap.css">
    <link rel="stylesheet" href="../../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/croppie.css">
</head>

<body>

<div class="navbar nav">
       <div class="container">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../../../about.php?id=<?php echo $_SESSION['uid']; ?>" class=" "><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
               <?php echo $ndata['name']; ?>
                
                </h6>
            </div>
            
        </div>
    </div>
    </div>
  <?php if ($_SESSION['uid'] == $uid){?>  
    <!-- Modal -->
    <div class="container">
    <div class="row">
<div class="modal" role="dialog" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crop image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:370px;">
       <div class="row">
       <div class="col-6" style="margin-left:-18px;">
        <div id="image_demo" style="width:350px;" class=""></div>
        
           </div>
        </div>
      </div>
      <div class="modal-footer" style="z-index:1;">
       <button type="submit" name="uploadbtn" class="btn btn-success btn-block crop_image ml-4" >Crop & Save</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
    </div>
    </div>


   
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <div class="preview">
                    <img src="img/img.png" alt="">
                </div>
            </div>
        </div>
    </div>

 <div class="main">
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-10">
              <form action="databases/postprofile.php?id=<?php echo $_SESSION['uid']; ?>" method="post" enctype="multipart/form-data">
                  <input type="file" id="file" name="uploadimg">
                  <label for="file" class="label btn btn-primary btn-block ">Upload Image</label>
                  <br>
                  <br>
                  <button type="submit" name="uploadbtn" class="btn btn-success btn-block uploadbtn my-2">Save</button>
                  
              </form>
          </div>
      </div>
  </div>
</div>

<div class="img">
<hr>
 <h5 class="mx-4">Suggestion</h5>

  <?php
    include('../../../databases/dbconn.php');
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
           <div class="col-4 my-1">
              <img src="../../profile_pic/<?php echo $new ?>" alt="">
           </div>
         <?php } ?> 
        
       
       </div>
         <hr>
   </div>
   
</div>
<?php }else{ ?>
<div class="imgoth" style="margin-top:-330px;">
<hr>
 <h5 class="mx-4">Uploaded photo</h5>
 
  <?php
    include('../../../databases/dbconn.php');
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
           <div class="col-4 my-1">
              <img src="../../profile_pic/<?php echo $new ?>" alt="">
           </div>
         <?php } ?> 
        
       
       </div>
         <hr>
   </div>
   
</div>
    

    
<?php } ?>

    <script src="../../../source/js/jquery-3.3.1.js"></script>
    <script src="js/croppie.js"></script>
    <script src="../../../source/js/bootstrap.min.js"></script>
    <script src="../../../source/js/all.min.js"></script>
    <script src="js/upload.min.js"></script>

</body>
</html>

<script>
$(document).ready(function(){
   $image_crop = $('#image_demo').croppie({
       enableExif:true,
       viewport:{
           width:200,
           height:200,
           type:'square'
       },
       boundary:{
           width:250,
           height:250
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
    
    $('.crop_image').click(function(event){
        $image_crop.croppie('result',{
            type:"canvas",
            size:"viewport"
        }).then(function(response){
            var id = "<?php echo $uid; ?>";
           $.ajax({
               url:"databases/uploaddb.php",
               method:"post",
               data:{"image":response,
                    "id":id},
               success:function(data){
                    $('#modal').modal('hide');
                  // window.location.replace("../../../About/about.php?id="+id);
               }
           }) 
        });
    })
    
});


</script>

