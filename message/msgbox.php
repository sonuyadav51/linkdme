<?php    

include("databases/dbconn.php");
session_start();

$sid = $_SESSION['uid'];
$user_id = $_GET['id'];
$query = "SELECT * FROM student_detail WHERE id = $user_id";
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
    <link rel="stylesheet" href="../css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/msgbox.css">

</head>

<body>
  <nav class="nav navbar" style="background:#ff9933;">
     <div class="container">
         <div class="row">
             <div class="col-2">
            <a href="../../About/about.php?id=<?php echo $data['id'] ?>"><img src="../../About/profile_pic/<?php echo $picname ?>" alt="" style="width:40px; height:40px; border-radius:200px;" class="mx-2"></a>
            </div>
            <div class="col-10">
              <a href="../../About/about.php?id=<?php echo $data['id'] ?>" style="color:black;"><h4  class="text-center ml-5 text-capitalize"><?php echo $data['name'] ?></h4></a>
             </div>
         </div>
     </div> 
  </nav>
  <div class="msgbox  p-2" >
   
      <div class="rmsg<?php echo $data['id'] ?>" id="messageBody"  style="height:470px; overflow-y:scroll;">
       
      
      </div>
    
      
    </div>
 
 
  <div class="nv">
      
  </div>
   
  
         
    
   


    <script src="../js/jquery-3.3.1.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../fontawesome/js/all.js"></script>
    <script src="js/msgbox.js"></script>
</body>
 
<?php //fetch_user_chat($_SESSION['uid'],$user_id,$conn); ?>
<script>
   
         var messageBody = document.querySelector('#messageBody');
          messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
    
       $(document).ready(function(){
           
          var messageBody = document.querySelector('#messageBody');
          messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
           
           var userid = "<?php echo $user_id; ?>";
              
          
           var userid = "<?php echo $user_id; ?>";
//          display_user(userid);
//          function display_user(userid){
//               
//              $.ajax({
//                  url:"to_user.php",
//                  method:"post",
//                  data:{userid:userid},
//                  success: function(data){
//                   var messageBody = document.querySelector('#messageBody');
//          messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;  
//                      
//                  $('.nv').html(data);
//                    fetch_msg_history(userid);
//                   setInterval(function(){
//                     fetch_msg_history(userid);
//                   },10000);
//                  
//                  }
//              })
//              
//          }
           
           $(document).on('click','.send_chat',function(){
               var userid = "<?php echo $user_id; ?>";
                var msg = $('#chat_msg_'+userid).val();
               if(msg != ""){
                $.ajax({
                    url:"insertmsg.php",
                     method:"post",
                    data:{ userid:userid,
                           msg:msg
                         },
                    success:function(data){
                        $('.rmsg'+userid).scrollTop = $('.rmsg'+userid).scrollHeight; 
                        $('#chat_msg_'+userid).val('');
                        
                        $('.rmsg'+userid).html(data);
                         var messageBody = document.querySelector('#messageBody');
          messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;
                      }
                });
               }
            //     $.ajax({
            //       url:"../../home/databases/msgupdate.php",
            //       method:"post",
            //       data:{mainid:userid},
            //       success:function(data){
            //          }
                       
                      
               
            //   });
           });
        });
       var userid = "<?php echo $user_id; ?>";
       fetch_msg_history(userid);
    function fetch_msg_history(userid){
         $.ajax({
             url:"fetch_msg_history.php",
             method:"post",
             data:{userid:userid},
             success:function(data){
                  $('.rmsg'+userid).html(data);
                   var messageBody = document.querySelector('#messageBody');
          messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight;  
                
             }
             
        });
         
    }
</script>
