$(document).ready(function(){
     $('#otpbtn1').on('click',function(e){
    e.preventDefault();
    var value = $('#mbl').val();
     $.ajax({
         url:"databases/forgotdb.php",
         method:"post",
         data:{value:value},
         success:function(data){
           
             $('#checkForm input').val(" ");
            
             $('.error').html(data);
            
             
         }
     });
   
});
    

    $(document).on("click",'#verifybtn',function(e){
        e.preventDefault();
       var otp = $("#otp").val();
     $.ajax({
         url:"databases/otp.php",
         method:"post",
         data:{otp:otp},
         success:function(data){
           
             $("#otpCheck input").val("");
            
             $('.otperror').html(data);
             //alert(data);
            
             
         }
     });
   
});
        $(document).on("click",'#finalbtn',function(e){
           e.preventDefault();
            var pwd = $('#p').val();
            var cpwd = $('#cp').val();
            var id = $('#finalbtn').data("id");
            $.ajax({
               url:"databases/updatepwd.php",
                method:"post",
                data:{
                     pwd:pwd,
                     cpwd:cpwd,
                     id:id
                     },
                success:function(data){
                    $('#setpassword #p').val('');
                    $('#setpassword #cp').val('');
                    $('.msg').html(data);
                }
            
            });
            
        });
        
        
 });   
