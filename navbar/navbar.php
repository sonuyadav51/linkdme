<nav class="nav navbar   fixed-bottom btm-nav">

    <div class=" " style="width:100%;">

        <div class="nav-a d-flex justify-content-between " style="">
            <a class="navbar-brand d-none " href="#">
                <img src="About/img/img.png" width="30" height="30" alt="">
            </a>
            <form class="form-inline d-none d-md-block" action="#">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-search"></i></span>
                    </div>
                    <input type="text" name="search" class="form-control search" style="width:500px; active-outline:none;" placeholder="Search here" aria-label="Username" aria-describedby="basic-addon1">
                </div>
            </form>

            <a href="about.php?id=<?php echo $id; ?>" class="text-capitalize pt-md-2 d-none d-md-block ml-md-2" style="font-size:17px; color:white; text-decoration:none;"><img src="About/profile_pic/<?php echo $picname ; ?>" alt="" width="30px" height="30px" style="background:#ff9933; border-radius:200px;">
                <?php echo $picdata['name']; ?></a>
            <a href="home.php" class="d-none d-md-block pl-md-2" style=" text-decoration:none;">

                <i class="fas fa-home"></i>

            </a>
            <a href="notification.php" class="d-none d-md-block ml-md-3">
                <div class="col-2 pr-4 noti">
                    <div class="ncount">
                        <p class="no"> </p>
                    </div>
                </div>

                <i class="fas fa-bell"></i>


            </a>

            <a href="home.php" class="d-md-none" style="">

                <i class="fas fa-home"></i>

            </a>

            <a href="friend/request.php?id=<?php echo $_SESSION['uid']; ?>&action=0" class="reqnoti">
                <div class="count d-none">
                    <p class="rn"></p>
                </div>

                <div class="col-2">

                    <i class="fas fa-users"></i>

                </div>
            </a>
            <a href="post/post.php?id=<?php echo $id; ?>" class="d-md-none">
                <div class="col-2  ">
                    <i class="fas fa-plus-circle"></i>
                </div>
            </a>

            <a href="message/msg.php" class="msgnoti">
                <div class="msgnoti">
                    <div class="mcount d-none">
                        <p class="mn"></p>
                    </div>
                </div>
                <div class="col-2">
                    <i class="fas fa-paper-plane"></i>
                </div>
            </a>
            <a href="home.php?do=bookmarks" class="">
                <div class="col-2  ">
                    <i class="fas fa-bars"></i>
                </div>
            </a>
        </div>


    </div>
</nav>
<div class="d-xs-none ser container-fluid d-none " style=" background:white; position:absolute; z-index:1; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
    <div class="row longscr">
        <div class="col-12 col-md-6 mx-md-auto my-3">
            <div class="search-result">

            </div>
        </div>
    </div>
</div>
<!---=======================TOP NAVBAR SECTION START=======================--->
<section class="post-section p-1 d-md-none fixed-top t">
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="profile-pic">
                    <a href="about.php?id=<?php echo $id; ?>"><img src="About/profile_pic/<?php echo $picname ; ?>" alt=""></a>
                </div>
            </div>

            <div class="col-8 pt-1  text-center">

                <form action="#">
                    <input type="text" class="search pl-5" name="search" placeholder="Search" style="border:0; border-bottom:1px solid white; border-radius:0; background:#ff9933;">
                    <label for="search"><i class="fas fa-search"></i></label>
                </form>




            </div>
            <div class="col-2 pr-4 noti">
                <div class="ncount">
                    <p class="no"> </p>
                </div>
                <a href="notification.php"><i class="fas fa-bell"></i></a>
            </div>

        </div>
        <div class=" ser container-fluid d-none" style="background:white; left:-1px; position:absolute; z-index:1; box-shadow:0px 10px 10px rgba(0,0,0,.2);">
            <div class="row">
                <div class="col-12">
                    <div class="search-result">

                    </div>
                </div>
            </div>
        </div>
        <!--
           <div class="noti-cont my-3 container-fluid d-none" style="border:1px solid #ccc; background:white;">
               <div class="row">
                   <div class="col-12">
                       <div class="noti-result">
                         
                       </div>
                   </div>
               </div>
           </div>
           -->
    </div>
</section>

<!---=======================TOP NAVBAR SECTION END=======================--->
