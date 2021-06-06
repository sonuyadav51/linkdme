$(document).ready(function () {
$('.uploadbtn').attr('disabled','disabled');

function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $('.preview img').attr('src', e.target.result);
             }
             reader.readAsDataURL(input.files[0]);
             
         }
             
         
     }
     $('#file').change(function () {
         readURL(this);
         $('.uploadbtn').removeAttr('disabled');
     });
  
    
    

});