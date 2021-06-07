
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
   <meta name="description" content="A large community of student from all over the world.Linkdme is helping one student to connect with other student.">
   <meta name="keywords" content="Linkdme,facebook,instagram,twitter,linkeden,social media,engineering,student">
 
    <title>Linkdme | Signup</title>
     <!--bootstrap css--> 
     <link rel="stylesheet" href="source/css/bootstrap.css">
    <!--fontawesome css-->
    <link rel="stylesheet" href="source/css/all.min.css">
    <!--my css-->
    <link rel="stylesheet" href="css/signup/style.css">
    <link rel="stylesheet" href="css/signup/croppie.css">
</head>
<body>
   
   <!--signupForm start-->
   <div class="container-fluid">
       <div class="row   nav-bar text-uppercase">
           <h1 class="mx-auto text-center">
              Linkdme
           </h1>
       </div>
   </div>
  
     <div class="container-fluid ">
    
         <div class="row  d-flex justify-content-center">
         <div class="box">
         <div class="sign-box"> 
         <div class="col-12 ">
                 <h2 class="text-uppercase text-center">Welcome</h2>
                 
                 <h5 class="text-uppercase h py-2">Create account</h5>
                 
                
               
            <form action="databases/signup/signdb.php" method="POST" enctype="multipart/form-data">
                 <div class="input-box">
                     
                            <?php if(isset($_GET['invalid'])){ ?>  
                            <div class="text-center text-capitalize alert-danger">
                             <?php echo "either field are empty or invalid data entry "; ?>
                            </div> 
                             <?php } ?>  
                        
                             <?php if(isset($_GET['exist'])){ ?>  
                            <div class="text-center text-capitalize alert-danger">
                             <?php echo "user already exist please choose other email and mobile no. "; ?>
                            </div> 
                             <?php } ?>  
                    
                         
                         
                     
                     
                      <!--
                       <div class="alumini">
                          <label for="">Are you alumini?</label><br>
                           YES <input type="radio" name="alumini" id="yes" value="YES" required="">
                           NO <input type="radio" name="alumini" class="no" value="NO" required="">
                            
                     </div>
                      -->
                       <div class="input-container">
                            <input type="text" name="uname" class="form-control u" required="">
                            <label for="uname">Your name*</label>
                        </div>
                        <div class="input-container">
                            <input type="email" name="uemail" class="form-control u" required="">
                            <label for="uemail">Your email*</label>
                        </div>
                        <div class="input-container">
                            <input type="text" name="uroll" class="form-control u r" required="">
                            <label for="uroll" class="rl">Your mobile number*</label>
                        </div>
                        
                        <div class="input-container">
                            <input type="password" name="upwd" class="form-control u " id="p" required="">
                            <label for="upwd">Your password(between 5 and 15)*</label>
                        </div>
                        <div class="input-container">
                            <input type="password" name="cpwd" class="form-control u" id="cp" required="">
                            <label for="cpwd">Confirm password*</label>
                          <span class="text-danger cph"></span>
                        </div>
               </div>
             <div class="next-content">
                          <div>
                          <p class="text-danger text-capitalize">date of birth*</p>
                          <input type="date" class ="form-control " name="dob" required="">
                         
                          </div>
                           
                          
                          <div class="input-container">
                          <span>Select Branch:</span>
                                  <select class="form-control" id="sel1" name="branch">
                                    <option value="option">choose branch</option>
                                    <option value="computer science">computer science</option>
                                    <option value="information technology">information technology</option>
                                    <option value="civil engineering">civil engineering</option>
                                    <option value="electrical engineering">electrical engineering</option>
                                    <option value="electronics engineering">electronics engineering</option>
                                     <option value="mechanical engineering">mechanical engineering</option>
                                     <option value="mca">mca</option>
                                  </select>
                                 
                        </div>
                          <div class="redio">
                           <p>Female</p><input type="radio" name="gender" class="form-control " value="female" required="">
                           <p class="m">Male</p><input type="radio" name="gender" class="form-control " value="male" required="">
                            <label for="">Gender*</label>
                          </div>
                          
             </div>
             <div class="profile-cont">
                        
                     <div class="profileContainer">
                     <h6 class="">Choose profile pic</h6>
                          <div class="profile-img my-3">
                              <img src="img/img.png" id="pic"  alt="">
                          </div>
                          <div class="prf">
                           <input  id="file" type="file" name="profile">
                          </div>
                    
                       <div class="input-container">
                            <label for="term"><b class="text-danger">term & condition*</b></label>
                            <input type="checkbox"  name="term" class="form-control ml-5" required="">
                           
                            
                           
                        </div>
                        </div>
             </div>
                     <input type="button" name="next" class="nextbtn form-control btn btn-primary text-uppercase" value="NEXT">
                     <input type="submit" name="submit" id="signbtn" class="signbtn form-control btn btn-primary text-uppercase" value="sign up">
                    
                     </form>

                   <a href="Login/index.php" class="nav-link text-center sign-link">Already a member? login</a>
                     </div>  
                 </div>
     <!--signupform end-->
  
  </div>
     </div>
     </div>
                
             
 <div class="footer " style="background:black; height:; z-index:-1; margin-top:-50px;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center p-5 my-5">
                <a href="about.html" class="mx-2 text-capitalize" style="color:white; font-size:1.2rem; text-decoration:none">about</a>
                 <a href="term.html" class="mx-2 text-capitalize" style="color:white; font-size:1.2rem; text-decoration:none">term and support</a>
                 <a href="cookie.html" class="mx-2 text-capitalize" style="color:white; font-size:1.2rem; text-decoration:none">cookie policy</a>
            </div>
        </div>
    </div>
     
 </div>

  




  


    <script src="source/js/jquery-3.3.1.js"></script>
    
    <script src="source/js/bootstrap.min.js"></script>
    <script src="source/js/all.min.js"></script>
    <script src="js/signup/signup.js"></script>
    <script src="js/signup/jquery.min.js"></script>
</body>
</html>

