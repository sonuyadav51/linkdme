   <?php  include('../../databases/dbconn.php');
       
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../../Login/');
}
 $id=$_SESSION['uid'];
  
  error_reporting(0);  
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
    <link rel="stylesheet" href="../../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/community.css">
     
</head>
<body> 

<div class="container-fluid">
    
    <div class="row  head text-center">
     
       <h1 class="text-center mx-auto my-5">mechanical engineering</h1>
    </div>
    
</div>
<div class="ser serc ">
<div class="container-fluid serc">
 <div class="row  search serc">
              <div class="col-12 mx-auto col-md-6 serc">
                 <form class='serc'>
                    
                         <div class="serc">
                             <span class="  search-box" id="search-icon">
                                 <i class="fas fa-search"></i>
                             </span>
                              <input type="text" class="" id="search-item" placeholder="search in mechanical engineering...">
                         </div>
                        
                    
                 </form>
              </div>
          </div>
 </div>
 <div class="search_result pl-5 d-none" style="">
   
</div>
</div>
<!--===============FIRST CONTANT START==================---->
  
    
   
    
  
 
    
 
 

    
   
    
  

<div class=" my-2 py-2">
    <div class="container-fluid">
        <div class="row">
            <?php  
    
        $branch = "mechanical engineering";
    
   // $query ="SELECT * FROM edu inner JOIN student_detail ON edu.id = student_detail.id WHERE branch = '$branch' ORDER BY bid DESC";
    $query ="SELECT * FROM student_detail WHERE branch = '$branch' AND id != $id ORDER BY id DESC";
    $fire = mysqli_query($conn,$query);
    while($data = mysqli_fetch_array($fire)){
        $uid =$data['id'];
        $pic = $data['profile'];
        $array = explode('/',$pic);
        $picname = $array['3'];
         $sub_query = "SELECT * FROM edu WHERE id =$uid ";
        $sub_fire = mysqli_query($conn,$sub_query);
        $sub_data = mysqli_fetch_array($sub_fire);
    ?>
            <div class="col-10 col-md-3 my-1 mx-auto">
                <div class="card" style="">
                   <div class="card-header mx-auto">
                    <a href="../../about.php?id=<?php echo $data['id'];  ?>" style="height:160px; width:160px; border-radius:200px; background:#ff9933;"><img src="../../About/profile_pic/<?php echo $picname  ?>" class="card-img-top" alt="..." style="height:160px; width:160px; border-radius:200px; background:#ff9933;"></a>
                    <h5 class="card-title text-capitalize text-center"><a href="../../about.php?id=<?php echo $data['id'];  ?>"><strong><?php echo $data['name'];  ?></strong></a></h5>
                    </div>
                    <div class="card-body">
                        
                        <p class="card-text text-center text-capitalize" style="font-size:15px;"><?php echo $sub_data['college'];  ?>
                         <span class="text-danger"><?php echo $sub_data['start'];  ?>-<?php echo $sub_data['end'];  ?></span></p>
                        <a href="../../about.php?id=<?php echo $data['id']; ?>" class="btn btn-block btn-outline-info">See Profile</a>
                         
                       
                    </div>
                </div>
              </div>
              <?php   }?>
        </div>
    </div>
</div>
<!--===============FIRST CONTANT END==================---->



    <script src="../../source/js/jquery-3.3.1.js"></script>
    <script src="../../source/js/bootstrap.min.js"></script>
    <script src="../../source/js/all.min.js"></script>
    <script src="js/community.js"></script>
</body>

</html>
<script>

// SEARCH START
    $(document).ready(function(){
      $('#search-item').keyup(function(e){
          $('.search_result').removeClass("d-none");
          var Svalue = $(this).val();
          if(e.which === 32 && !$(this).val().len()){
             e.preventDefault();
          }
          if(Svalue != ''){
          $.ajax({
             url:"search.php",
              method:"post",
              data:{Svalue:Svalue},
              success:function(data){
                  $('.search_result').html(data);
                 
                 
              }
          });
          
             
          }else{
              $('.search_result').html('');
              $('.search_result').addClass("d-none");
          }
      });
    $('.searchp').click(function(){
           $('#search').val('');
     });
    });
</script>    
<script>
$(window).on('resize', function() {
       if ($(window).width() > 768) {
         $('#search-item').css({"width":"1000px"});
           $('#search-icon').css({"margin-left":"-30px"});
       
            
       }else{
           $('.search-item').css({"width":"100%"});
           $('.search-icon').css({"margin-left":"0px"});
       }
});
 if ($(window).width() > 768) {
      $('#search-icon').css({"margin-left":"-30px"});   
    $('#search-item').css({"width":"1000px"});
}else{
    $('#search-item').css({"width":"100%"});
           $('#search-icon').css({"margin-left":"0px"});
}

</script>   

