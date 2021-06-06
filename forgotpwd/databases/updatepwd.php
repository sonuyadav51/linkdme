<?php   
include("../../databases/dbconn.php");
session_start();
$otpid = $_SESSION['otpid'];

if(isset($_SESSION['otpid'])){
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];
    $id = $_POST['id'];
    $output='';
    $pwd_valid = false;
    
        
    if(!empty($pwd)){
        if(strlen($pwd)>=5 && strlen($pwd)<=15){
            if($pwd == $cpwd){
            //all test pass
            $pwd_valid = true;
            $pwd = md5($pwd);
            //echo $pwd.'<br><br>';
           // echo"password is valid";
            }else{
              $output .= '
              <div class="alert-danger pl-1">
              <p>password not matched!!</p>
              </div>
        
        
        ';
   
                
            }
        }
        else{
            
            $output .= '
            <div class="alert-danger pl-1">
            <p>password must be between 5 to 15 chars long</p>
            </div>
            ';
        }
    }
    else{
       
       $output .= '
            <div class="alert-danger pl-1">
            <p>password can not be blank</p>
            </div>
            ';
                          
        }
    
    if($pwd_valid){
       $update = "UPDATE student_detail SET pwd = '$pwd' WHERE id = $id";
        $ufire =mysqli_query($conn,$update);
        if($ufire){
            $output .='
             <div class="alert-success pl-1">
            <p>password successfully changed !!</p>
            <a href="../Login/index.php" class="btn btn-primary ">Login Here</a>
            </div>
            
            
            
            ';
        }else{
            $output .= '
            <div class="alert-danger pl-1">
            <p>something goes wrong</p>
            </div>
            '; 
        }
    
    
    }
    
    echo $output;
    
}


?>


