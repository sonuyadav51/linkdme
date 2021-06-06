<?php 

include('../dbconn.php');
session_start();

if(isset($_POST['submit'])){
$name   =  strip_tags(mysqli_real_escape_string($conn, trim($_REQUEST['uname'])));
$pwd    =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['pwd'])));

 $name_valid = $pwd_valid = false;
   if(!empty($name)){
        if(strlen($name)>2 && strlen($name)<=30){
            if(!preg_match('/[^a-zA-Z\d.@]/',$name)){
                //all test pass//
                $name_valid=true;
                echo"name is valid <br>";
            }
        }
        else{
            header("Location:../../Login/index.php?invalid=invalid email or password");
            echo"name must be between 2 to 30 chars long..<br>";
        }
        
    }
    else{
        header("Location:../../Login/index.php?invalid=invalid email or password");
        echo"name can not be blank<br>";
    }  
    
    if(!empty($pwd)){
        if(strlen($pwd)>=5 && strlen($pwd)<=15){
            //all test pass
            $pwd_valid = true;
            $hpwd = md5($pwd);
           // echo $hpwd.'<br><br>';
            echo"password is valid";
            
        }
        else{
            header("Location:../../Login/index.php?invalid=invalid email or password");
            echo"password must be between 5 to 15 chars long..<br>";
        }
    }
    else{
        header("Location:../../Login/index.php?invalid=invalid email or password");
        echo"password can not blank<br>";
                          
        }
   
     if($name_valid && $pwd_valid){ 
     $query = "SELECT * FROM `student_detail` WHERE (email='$name' OR roll_no='$name') AND pwd = '$hpwd'";
    
    $queryfire = mysqli_query($conn,$query);
    $row = mysqli_num_rows( $queryfire);
    $data = mysqli_fetch_array($queryfire);
       if($row<1){
        
    header("Location:../../Login/index.php?invalid=wrong email or password");
    }
     else{
         
         $_SESSION['uid'] = $data['id'];
         $sub_query = "INSERT INTO `login_status`(`id`) VALUES ('".$data['id']."')";
         $fire = mysqli_query($conn,$sub_query);
         
         $subb_query = "SELECT *  FROM login_status";
         $sfire = mysqli_query($conn,$subb_query);
         $sdata = mysqli_fetch_array($sfire);
         if($sfire){
             $_SESSION['ls_id'] = $sdata['login_status_id'];
         }
         if(!empty($_POST['rembember'])){
          setcookie('email',$name,time()+60*60*24*10,'/');
          setcookie('pwd',$pwd,time()+60*60*24*10,'/');
         }
         
         if(!isset($_POST['rembember'])){
            // if(isset($_COOKIE['email'])){
                 setcookie('email','',1,'/');
            // }
            // if(isset($_COOKIE['pwd'])){
                 setcookie('pwd','',1,'/');
            // }
             
             
         }
          header("Location:../../home.php");
         }
          
    
     }else{
          header("Location:../../Login/index.php?invalid=invalid email or password");
     
     }
    
}



?>