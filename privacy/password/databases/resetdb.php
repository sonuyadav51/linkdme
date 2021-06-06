
<?php  

include("../../../databases/dbconn.php");
session_start();

$id = $_SESSION['uid'];



if(isset($_POST['resetsubmit'])){
    $pwd = $_POST['reset'];
    $pwd = md5($pwd);
    $query = "SELECT * FROM student_detail WHERE id = $id && pwd = '$pwd'";
    $fire = mysqli_query($conn,$query);
   
    
   
    if( $num = mysqli_num_rows($fire)>0){
      header("Location:../resetpwd.php?new=newpwd");
    }else{
       header("Location:../resetpwd.php?set=error");
    }
    
    
}




?>
<?php  
if(isset($_POST['newsubmit'])){
    $id = $_SESSION['uid'];
    $upwd = $_POST['upwd'];
    
   $pwd_valid = false;
    
   if(strlen($upwd)>=5 && strlen($upwd)<=15){
       
       $pwd_valid = true;
       $upwd = md5($upwd);
       
   }else{
       echo "password must be between 5 and 30";
   }
    
    
    if($pwd_valid){
        
        $uquery = "UPDATE student_detail SET pwd = '$upwd' WHERE id = $id";
        $ufire = mysqli_query($conn,$uquery);
        
        if($ufire){
            header("Location:../resetpwd.php?new=success");
        }else{
            echo "not";
        }
        
    }
    
    
    
}




?>

