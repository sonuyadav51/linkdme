$(document).ready(function(){
     
    $('.user-more').click(function(){
        
        $('.more-content').toggleClass("more-hide");
        
        
    });
    $('.user-more-other').click(function(){
        
        $('.more-content-other').toggleClass("more-hide");
        
        
    });
   
   // bio start
    
    $('.editbio').on('click',function(e){
        e.preventDefault();
        $('.bio-content').removeClass("d-none");
        
    });
    
    $('.bio-close').on('click',function(){
        $('.bio-content').addClass("d-none");
         $('.more-content').addClass("more-hide");
        
    });
    
    $('.biobtn').attr('disabled','disabled');
    $('#biotext').keyup(function(){
        $('.biobtn').removeAttr('disabled');
        if($('#biotext').val() == ""){
            $('.biobtn').attr('disabled','disabled');
        }
        if($(this).val().length == 80){
             $('.biobtn').attr('disabled','disabled');
        }
       
        
    });
});

