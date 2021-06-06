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
           url:"../post/postaction.php",
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
             url:"../databases/home/deletepost.php",
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
      
     
     
     
 $('.main_post').click(function(){
     var postid = $(this).data('id');
    window.location.replace("../post/comment/comment.php?id="+postid); 
 });
    
 $('video').off('play').on('play', function() {
        var dd = this.id
     $('video').each(function( index ) {
        if(dd != this.id){
            this.pause();
            this.currentTime = 0;
        }
     });
   });
                  
 }); 