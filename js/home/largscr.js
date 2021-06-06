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
       
        
         