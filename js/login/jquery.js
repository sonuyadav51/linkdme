 $(document).ready(function () {
     
     $('.nextbtn').attr('disabled', 'disabled');
     $('.u').keyup(function () {
         $('.u').each(function () {
             if ($(this).val().length == 0) {
                 $('.nextbtn').attr('disabled', 'disabled');
             } else {
                 $('.nextbtn').removeAttr('disabled');
             }

         });
     });

     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $('.profile-img img').attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
         }
     }
     $('.prf input').change(function () {
         readURL(this);
     });
     var rpwd = $('#p');
     var cpwd = $('#cp');
     $('#cp').keyup(function () {

         if (rpwd.val().length == 0 || cpwd.val().length == 0) {
             $('.nextbtn').attr('disabled', 'disabled');
             $('.cph').html("<span class='text-danger cph'>empty field !!</span>");

         }
             
         
         if (rpwd.val() != cpwd.val()) {
            $('.cph').html("<span class='text-danger cph'>password not matched !!</span>");
             $('.nextbtn').attr('disabled', 'disabled');
         } else {
             
             $('.cph').html("<span class='text-success cph'>password  matched !!</span>");

         }
          if (cpwd.val().length == 0){
               $('.cph').html("<span class='text-danger cph'>emptity field !!</span>");

             }
                  
        });
     $('#p').keyup(function () {


         if (rpwd.val() != cpwd.val()) {
             $('.nextbtn').attr('disabled', 'disabled');
             

         } else {
             $('.cph').html("<span class='text-danger cph'> empty field !!</span>");
         }
     });
     
     $('.loginbtn').attr('disabled','disabled');
    
       if($('.l').val().length != 0){
         $('.loginbtn').removeAttr('disabled'); 
     } 
   
     
     $('.l').keyup(function(){
          $('.l').each(function(){
              var value = $(this).val().length;
              if(value == 0){
                  $('.loginbtn').attr('disabled','disabled');
                  
              }else{
                 $('.loginbtn').removeAttr('disabled'); 
              }
          });
         
     });
     
   
     
     



 });
