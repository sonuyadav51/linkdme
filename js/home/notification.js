     $(document).ready(function(){
             
      $('.search').keyup(function(e){
          $('.ser').removeClass("d-none");
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
                  $('.search-result').html(data);
                 
                 
              }
          });
          
             
          }else{
              $('.search-result').html('');
              $('.ser').addClass("d-none");
          }
      });
    $('.searchp').click(function(){
           $('.search').val('');
     });
      
      
      //DELETE POST
      
      $('.delete').on('click',function(e){
          e.preventDefault();
    
      var postid = $(this).data('id');
     // $('#single'+postid).toggleClass("d-none");
         
     
      $('#single'+postid).html("are you sure");
           $('#single'+postid).hide();
      
  });
      
      
      //NOTIFICATION START
       
       
      setInterval(function(){
    notification(mainid);
    },120000);
    
     notification(mainid);
      function notification(mainid){
          var mainid = mainid;
          var post_id = $('.like-btn').data('id');
         // $('.like-btn').on('click',function(){
              //if($(this).hasClass("liked")){
             $.ajax({
                url:"databases/home/newnotification.php",
                 method:"post",
                 data:{
                     mainid:mainid,
                     postid:post_id 
                      },
                 success:function(data){
                    
                     if(data == 0){
                         $('.ncount').addClass("d-none");
                     }else{
                         $('.ncount').removeClass("d-none");
                     }
                     
                     $('.no').html(data);
                    
                    
                 }
             });
            //}
         // });
          
                   
                      
                    $('.noti-cont').removeClass("d-none");
                      // window.location.replace = "notification.php"; 
                        
                   
                   // $('.noti-result').html(res.coutput);
                        $.ajax({
                            url:"databases/home/newupdatenoti.php",
                            method:"post",
                            data:{seid:mainid},
                            success:function(data){
                                $('.noti1').click(function(){
                             $('.noti-cont').addClass("d-none");
                               });  

                                
                            }
                        });
          
          
          
               
           
      }
            
      
  
                  
 }); 
        
          //============MESSAGE NOTIFICATION=============
        
    setInterval(function(){
        msgnotification(mainid);
      },80000);
       msgnotification(mainid);
     
      function msgnotification(mainid){
           var mainid = mainid;
          //var post_id = $('.like-btn').data('id');
          $.ajax({
             url:"databases/home/msgnoti.php",
              method:"post",
              data:{mainid:mainid},
              success:function(data){
                  
                  if(data != 0){
                  $('.mcount').removeClass("d-none");
                  $('.mn').html(data);
                 }
              }
          });
          
              $('.msgnoti').click(function(){
               $.ajax({
                   url:"databases/home/msgupdate.php",
                   method:"post",
                   data:{mainid:mainid},
                   success:function(data){
                     }
                       
                      
               
               });
                       
                 
             
            });
          
          
      }
         
// UPDATE NOTIFICATION CLICKED SET COLOR TO READ MEAN WHITE
         
         $('.liked').on('click',function(){
            var nid = $(this).data("id");
             $.ajax({
                url:"databases/home/notiread.php",
                 method:"post",
                 data:{nid:nid},
                 success:function(){
                     
                 }
                     
                 
             });
         });
         
           $('.allread').on('click',function(){
           // var nid = $(this).data("id");
             $.ajax({
                url:"databases/home/allnotiread.php",
                 method:"post",
                 data:"",
                 success:function(){
                     location.reload(true);
                 }
                     
                 
             });
         });
  
         //FRIEND REQUEST START
    
    
   
    setInterval(function(){
        reqnotification();
      },130000);
       reqnotification();
     
      function reqnotification(){
           
          //var post_id = $('.like-btn').data('id');
          $.ajax({
             url:"friend/databases/frndreqst/countreq.php",
              method:"post",
              data:"",
              success:function(data){
                 // alert(data);
                  if(data != 0){
                  $('.count').removeClass("d-none");
                      if(data < 11){
                    $('.rn').html(data);
                      }else{
                          $('.rn').html("10+"); 
                      }
                  
                  }
              }
          });
          
              $('.reqnoti').click(function(){
               $.ajax({
                   url:"friend/databases/frndreqst/updatereq.php",
                   method:"post",
                   data:"",
                   success:function(data){
                    
                   
                   }
                       
                      
               
               });
                       
                 
             
            });
          
          
      }
    



 $(window).on('resize', function() {
       if ($(window).width() > 768) {
         $('.btm-nav').removeClass('fixed-bottom');
         $('.nav-a').removeClass("justify-content-between");
         $('.nav-a').addClass("justify-content-center");
         $('nav').css({"border-top":"0","border-bottom":"1px solid #ccc","opacity":"1","background":"#ff9933"});
       
            
       }else{
          $('.btm-nav').addClass('fixed-bottom');
           $('.nav-a').addClass("justify-content-between");
           $('.nav-a').removeClass("justify-content-center");
       }
});
 if ($(window).width() > 768) {
         $('.btm-nav').removeClass('fixed-bottom');
         $('.btm-nav').addClass('fixed-top');
         $('.nav-a').removeClass("justify-content-between");
         $('.nav-a').addClass("justify-content-center");
         $('nav').css({"border-top":"0","border-bottom":"1px solid #ccc","opacity":"1","background":"#ff9933"});
   
}else{
    $('.btm-nav').addClass('fixed-bottom');
    $('.btm-nav').removeClass('fixed-top');
    $('.nav-a').addClass("justify-content-between");
    $('.nav-a').removeClass("justify-content-center");
    $('.longscr').addClass("d-none");
}  
       
 



