$(document).ready(function(){
 $('.nextbtn').attr('disabled', 'disabled');

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
             $('.nextbtn').removeAttr('disabled'); 

         }
          if (cpwd.val().length == 0){
               $('.cph').html("<span class='text-danger cph'>emptity field !!</span>");
               $('.nextbtn').attr('disabled', 'disabled');

             }
                  
        });
     $('#p').keyup(function () {


         if (rpwd.val() != cpwd.val()) {
            $('.nextbtn').attr('disabled', 'disabled');
             

         } else {
             $('.cph').html("<span class='text-danger cph'> empty field !!</span>");
              $('.nextbtn').attr('disabled', 'disabled');
         }
     });
     });

