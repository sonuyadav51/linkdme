 $(document).ready(function(){
      
      $('.like-btn').click(function(){
       
       
          
      var postid = $(this).data('id');
      
      
      if(postid){
          if($(this).hasClass("liked")){
              $(this).removeClass("liked");
              $(this).addClass("unliked");
              
              
          }else{
              $(this).addClass("liked");
              $(this).removeClass("unliked");
              
              
          }
      }
      
     
      
       $.ajax({
           url:"post/postaction.php",
           type:"post",
           data:{
               postid:postid,
               userid:userid,
              
           },
           success:function(data){
              res = JSON.parse(data);
             
             
             
              $('.some'+postid).html(res.number);
               // $('.no').html(res.notinum);
              //  $('.noti-cont').removeClass("d-none");
               // $('.noti-result').html("sonu yadav like yoour post");
               if($('#likeicon'+postid).hasClass("fas fa-thumbs-up")){
                   $('#likeicon'+postid).removeClass("fas fa-thumbs-up");
                   $('#likeicon'+postid).addClass("far fa-thumbs-up");
                   
                   
               }else{
                   $('#likeicon'+postid).removeClass("far fa-thumbs-up");
                   $('#likeicon'+postid).addClass("fas fa-thumbs-up");
                   
               }
              
               
      
           }
       });
     
 });

 //MORE OPTION TO POST EDIT DELETE START
  $(document).on('click','.post-more',function(){
    
      var postid = $(this).data('id');
      $('.postedit'+postid).toggleClass("d-none");
      $('.caret'+postid).toggleClass("d-none");
      
      
  });
      $('body div').click(function(){
           var postid = $(this).data('id');
          $('.postedit'+postid).addClass("d-none");
          $('.caret'+postid).addClass("d-none");
      });
      
       
// SEARCH START
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
         
     
      $('#single'+postid).html("");
          $('.hello'+postid).removeClass("d-none");
           //$('#single'+postid).hide();
      
  });
      $('.yes').on('click',function(){
          var postid = $(this).data('id');
         //location.reload(true);
          $.ajax({
             url:"databases/home/deletepost.php",
              method:"post",
              data:{postid:postid},
              success:function(data){
                 $('.sms').html(data);
                  
              }
          });
      });
      $('.notde').on('click',function(){
          var postid = $(this).data('id');
          location.reload(true);
      });
      
      
      //NOTIFICATION START
       
  
        
        setInterval(function(){
          notification(mainid);
      },7000); 
  
    
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
          
                    $('.noti').click(function(e){
                       // e.preventDefault();
                    $('.noti-cont').removeClass("d-none");
                        
                        
                    //$('.noti-result').html(res.output);
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
                        })
                 });
          
      }
      //============MESSAGE NOTIFICATION=============
      setInterval(function(){
        msgnotification(mainid);
          
      },6000);
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
      
      
       
    //FRIEND REQUEST START
    
    
   
    setInterval(function(){
        reqnotification();
      },12000);
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
                      if(data < 10){
                  $('.rn').html(data);
                      }else{
                          $('.rn').html("9+"); 
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
    
      
     
 $('.main_post').click(function(){
     var postid = $(this).data('id');
    window.location.replace("post/comment/comment.php?id="+postid); 
 });
  /*  
 $('video').off('play').on('play', function() {
        var dd = this.id
     $('video').each(function( index ) {
        if(dd != this.id){
            this.pause();
            this.currentTime = 0;
        }
     });
   });
                  

 */
 

 
 
 
  });
 