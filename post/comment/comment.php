
<?php  

include("../../databases/dbconn.php");
session_start();
if(!isset($_SESSION['uid'])){
    header("Location:../../Login/");
}
error_reporting(0);
$postid = $_GET['id'];
$sesid = $_SESSION['uid'];
$query = "select * from student_detail s inner join post p on s.id = p.id where post_id = $postid";

$fire = mysqli_query($conn,$query);

$data = mysqli_fetch_array($fire);
 $pic = $data['profile'];
             $array = explode('/',$pic);
             $picname = $array['3'];
$postpic = $data['post_img'];
$newarray = explode('/',$postpic);
$postpicname = $newarray['1'];



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <meta name="description" content="A large community of student from all over the world.Linkdme is helping one student to connect with other student.">
   <meta name="keywords" content="Linkdme,facebook,instagram,twitter,linkeden,social media,engineering,student">
 
    <title>Linkdme</title>
    <!--bootstrap css-->
    <link rel="stylesheet" href="../../source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../../source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/comment.css">
</head>

<body>
   
    <div class="navbar nav">
        <div class="row head">
            <div class="left ml-3">
                <span><a href="../../home.php#single<?php echo $postid ?>" class="back"><i class="fas fa-arrow-left"></i></a></span>
            </div>
            <div>
                <h6 class="text-capitalize">
                    <?php echo $data['name']; ?>

                </h6>
            </div>

        </div>
    </div>
    <!--=======================POST GOES HERE==================---->
    <div class="container-fluid post-content col-md-6 mx-md-auto">
        <div class="container post pt-4 ">
            <div class="row" style="overflow:hidden;">

                <div class="col-12">
                    <div class="post-heading profile-pic">
                        <a href="../../about.php?id=<?php echo $data['id']; ?>"><img src="../../About/profile_pic/<?php echo $picname ; ?>" alt=""></a>
                        <a href="../../about.php?id=<?php echo $data['id']; ?>" class="text-capitalize">
                            <?php echo $data['name']; ?></a>





                        <p>
                            <?php echo $data['time']; ?>
                        </p>


                    </div>
                    <div class="main_post" >
                        <p class="">
                            <?php echo $data['post']; ?>
                        </p>
                        <img src="../img/<?php echo $postpicname ?>" alt="" style="width:100%;" class="
             
                           <?php if($data['post_img'] == "img/"): ?>

                            d-none
                        <?php endif; ?>
                        ">
                     <!--   
                    <video controls style="width:117%; margin-left:-19px;" class="d-none">
                        <source src="../../post/" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                   -->
                    </div>
                   
                </div>
            </div>
            <div class="row my-3">
                <div class="col-6">
                    <span class="">
                        <?php echo getlikes($postid); ?> </span> <span>Like</span>
                </div>
                <div class="col-6">
                    <span class="number<?php echo $postid; ?>"> </span> <span>comment</span>
                </div>
            </div>


        </div>

        <div class="container my-2">
            <div class="row">
                <div class="col-12">
                    <div class="comment-section">
                        <form id="form-data" meyod="POST">

                            <div class="row ">

                                <div class="col-8">
                                    <textarea class="p-2 comment" placeholder="Drop a comment......" name="commentdata" required></textarea>
                                </div>
                                <div class="col-4 text-center my-2">
                                    <button class="btn btn-success btn-sm commentbtn" name="commentbtn">post</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>






        <div id="single<?php  echo $postid; ?>">


        </div>



        <!--
     
    
-->

        <!--=====================SINGLE COMMENT END=============--->


    </div>



    <script src="../../source/js/jquery-3.3.1.js"></script>
    <script src="../../source/js/bootstrap.min.js"></script>
    <script src="../../source/js/all.min.js"></script>
    <script src="js/comment.js"></script>
</body>

</html>
<?php
 function getlikes($id){ 
                 global $conn;
                   $uid=$_SESSION['uid'];
                   $query = "select  count(*) from postreaction where post_id = $id and post_like = 1";
                   $fire = mysqli_query($conn,$query);
                  $num = mysqli_fetch_array($fire);

             return $num[0];
     
      }


?>



<script>
    $(document).ready(function() {


        $('#form-data').on('submit', function(e) {
            e.preventDefault();
            var postid = "<?php echo $postid  ?>";

            var comment = $('.comment').val();

            $.ajax({
                url: "databases/commentdb.php",
                type: "post",
                data: {
                    postid: postid,
                    comment: comment
                },
                success: function(data) {
                    $('#form-data')[0].reset();


                    getdata();






                }





            });

        });




        // setInterval(function(){
        getdata();
        // },500);
        function getdata() {
            var postid = "<?php echo $postid ?>"
            $.ajax({
                url: "databases/fetchcomment.php",
                type: "post",
                data: {
                    postid: postid
                },

                success: function(data) {
                    res = JSON.parse(data);
                    $('.number' + postid).html(res.number);

                    $('#single' + postid).html(res.comment);

                }

            });

        }


        //SHOW OPTION FOR DELETE AND EDIT COMMENT
        <?php  
   
    $rquery = "SELECT * FROM postcomment WHERE post_id = $postid AND id = $sesid";
     $rfire = mysqli_query($conn,$rquery);

     while($rdata = mysqli_fetch_array($rfire)){
       $cmntid = $rdata['commentid'];
     ?>

        $(document).on('click', '.more', function() {
            var cmid = "<?php echo $cmntid; ?>";
            var cmntid = $(this).data("id");
            if (cmntid == cmid) {
                $('.cmntreply' + cmntid).toggleClass("d-none");
            } else {
                $('.report' + cmntid).toggleClass("d-none");
            }
        });
        <?php  }?>
        //EDIT COMMENT
        $(document).on('click', '.cmntedit', function() {
            var cmntid = $(this).data("id");
            $.ajax({
                url: "databases/editcmntdata.php",
                method: "post",
                data: {
                    cmntid: cmntid
                },
                success: function(data) {
                    $('.cmnttext' + cmntid).val(data);
                    $('.editbox' + cmntid).removeClass("d-none");

                    $('.cmntreply' + cmntid).addClass("d-none");
                }
            });

        });
        // SAVE EDIT COMMENT IN DATABASE
        $(document).on('click', '.savebtn', function() {
            var cmntid = $(this).data("id");
            var comment = $('.cmnttext' + cmntid).val();
            //alert(comment);
            if (comment != '') {
                $.ajax({
                    url: "databases/saveedit.php",
                    method: "post",
                    data: {
                        cmntid: cmntid,
                        comment: comment
                    },
                    success: function(data) {
                        // alert(data);
                        getdata();
                        $('.editbox' + cmntid).addClass("d-none");

                    }
                });
            } else {
                $('.editbox' + cmntid).addClass("d-none");
            }
        });
        //DELETE COMMNENT
        $(document).on('click', '.cmntdlt', function() {
            var cmntid = $(this).data("id");
            $.ajax({
                url: "databases/deletecmnt.php",
                method: "post",
                data: {
                    cmntid: cmntid
                },
                success: function(data) {
                    $('.maincmnt' + cmntid).addClass("d-none");
                }
            });
        });
        // reply comment start


        $(document).on('click', '.reply', function() {

            var commentid = $(this).data("id");

            $('.creply' + commentid).toggleClass("d-none");
            fetchreply(commentid);


        });

        $(document).on("click", '.replybtn', function() {
            var cid = $(this).data("id");
            var reply = $('.replydata' + cid).val();
            var sesid = "<?php echo $_SESSION['uid']; ?>";
            var postid = "<?php  echo $postid; ?>";
            if (reply != '') {
                $.ajax({
                    url: "databases/insertreply.php",
                    method: "post",
                    data: {
                        cid: cid,
                        reply: reply,
                        sesid: sesid,
                        postid: postid
                    },
                    success: function(data) {
                        $('.replydata' + cid).val('');


                        fetchreply(cid);




                    }
                });
            }
        });

        //fetchreply(3);       
        function fetchreply(cid) {

            var cid = cid;
            $.ajax({
                url: "databases/fetchreply.php",
                method: "post",
                data: {
                    cid: cid
                },
                success: function(data) {

                    $('.fetchreply' + cid).html(data);

                }
            });



        }

        //EDIT REPLY DELETE REPLY START
        ///edit 
        <?php  
   
    $ryquery = "SELECT * FROM commentreply WHERE postid = $postid AND id = $sesid";
     $ryfire = mysqli_query($conn,$ryquery);

     while($rydata = mysqli_fetch_array($ryfire)){
       $replyid = $rydata['replyid'];
         
            
     ?>


        $(document).on('click', '.replymore', function() {
            var replyid = $(this).data("id");
            var rplyid = "<?php echo $replyid; ?>";
            if (replyid == rplyid) {
                $('.cmntreplymore' + replyid).toggleClass("d-none");
            }
        });

        <?php  } ?>
        $(document).on('click', '.replyedit', function() {
            var replyid = $(this).data("id");
            $('.cmntreplymore' + replyid).addClass("d-none");
            $('.replyeditbox' + replyid).toggleClass("d-none");
            $.ajax({
                url: "databases/editreply.php",
                method: "post",
                data: {
                    replyid: replyid
                },
                success: function(data) {
                    $('.replytext' + replyid).val(data);
                }
            });
        });

        ///save edit

        $(document).on('click', '.replysavebtn', function() {
            var replyid = $(this).data("id");
            var cid = $(this).data("cid");
            var reply = $('.replytext' + replyid).val();
            //alert(comment);
            if (reply != '') {
                $.ajax({
                    url: "databases/saveeditreply.php",
                    method: "post",
                    data: {
                        replyid: replyid,
                        reply: reply
                    },
                    success: function(data) {
                        // alert(data);
                        fetchreply(cid);
                        $('.replyeditbox' + replyid).addClass("d-none");

                    }
                });
            } else {
                $('.replyeditbox' + replyid).addClass("d-none");
            }
        });

        /// DELETE REPLY
        $(document).on('click', '.replydlt', function() {
            var replyid = $(this).data("id");
            $.ajax({
                url: "databases/deletereply.php",
                method: "post",
                data: {
                    replyid: replyid
                },
                success: function() {
                    $('.mainreply' + replyid).addClass("d-none");
                }
            })
        });

    });

</script>
