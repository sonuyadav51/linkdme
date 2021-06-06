
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
     <link rel="stylesheet" href="../css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <!--my css-->
   
   
</head>
<body style="background:black">
<h1 class="text-center text-uppercase bg-dark p-4" style="color:white; font-size:4rem; font-family:cursive;">Linkdme</h1>
<div class="container">

       <?php if(isset($_GET['msg'])){ ?>
    <div>
        <p class="text-center text-uppercase" style="color:red;">wrong cridentials</p>
    </div>
          
    
    <?php } ?>
      
 
    <div class="row">
        <div class="col-10 col-md-6 mx-auto my-5">
           <form action="admindb.php" method="post">
               <label for="name" style="color:green;">UserName:</label>
               <input type="text" name="uname" class="form-control" required style="color:green;">
                <label for="name" style="color:green;">Password:</label>
               <input type="password" name="pwd" class="form-control" required style="color:green;"><br>
               <button type="submit" class="btn btn-sm btn-primary" name="loginto">Login</button>
           </form>
            
        </div>
    </div>
</div>



     <script src="../javaScript/jquery-3.3.1.js"></script>
     <script src="../javaScript/bootstrap.js"></script>
    <script src="../fontawesome/js/all.js"></script>
 </body>
</html>