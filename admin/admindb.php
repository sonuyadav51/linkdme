<?php 


include("../databases/dbconn.php");
session_start();

if(isset($_POST['loginto'])){
    
$uid = strip_tags(mysqli_real_escape_string($conn, trim($_POST['uname'])));
$pwd = strip_tags(mysqli_real_escape_string($conn, trim($_POST['pwd'])));
    
    if(!empty($uid) && !empty($pwd)){
        $query = "SELECT * FROM admin WHERE uname = '$uid' AND pwd = '$pwd'";
        $fire  = mysqli_query($conn,$query);
        $data = mysqli_fetch_array($fire);
        if(mysqli_num_rows($fire) < 1 ){
            header("Location:admin.php?msg=error");
        }else{
            $_SESSION['adid'] = $data['id'];
            header("Location:welcome.php");
        }
    }else{
        header("Location:admin.php?msg=error"); 
    }
    
    
}
?>
