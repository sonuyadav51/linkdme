$(document).ready(function(){
$('.trash').on('click',function(){
    var id = $(this).data("id");
    $.ajax({
        url:"databases/deleteskill.php",
        method:"post",
        data:{id:id},
        success:function(){
            $('#li'+id).hide();
        }
    });
});
$('.trash').on('click',function(){
    var id = $(this).data("id");
    $.ajax({
        url:"databases/deletetskill.php",
        method:"post",
        data:{id:id},
        success:function(){
            $('#li'+id).hide();
        }
    });
});
$('.trash').on('click',function(){
    var id = $(this).data("id");
    $.ajax({
        url:"databases/deletepskill.php",
        method:"post",
        data:{id:id},
        success:function(){
            $('#li'+id).hide();
        }
    });
});
$('.trash').on('click',function(){
    var id = $(this).data("id");
    $.ajax({
        url:"databases/deleteaskill.php",
        method:"post",
        data:{id:id},
        success:function(){
            $('#li'+id).hide();
        }
    });
});
$('.trash').on('click',function(){
    var id = $(this).data("id");
    $.ajax({
        url:"databases/deleteproject.php",
        method:"post",
        data:{id:id},
        success:function(){
            $('#li'+id).hide();
        }
    });
});

});
