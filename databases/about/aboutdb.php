
<?php 
 include("../dbconn.php");
  session_start();

$id = $_SESSION['uid'];

if(isset($_POST['biobtn'])){
    
    $bio = mysqli_real_escape_string($conn,trim($_POST['biotext']));
    
    $query = "select * from bio where id = $id";
    $fire = mysqli_query($conn,$query);
    $num = mysqli_num_rows($fire);
    echo $num;
    echo $bio;
    echo $id;
    if($num == 0){
        $insert = "INSERT INTO `bio`(`id`, `bio`) VALUES ($id,'$bio')";
        $insfire = mysqli_query($conn,$insert);
        if($insfire){
            header("Location:../../about.php?id=$id");
        }
    }else{
        $update = "UPDATE bio SET bio = '$bio' WHERE id=$id";
        $upfire = mysqli_query($conn,$update);
        if($upfire){
             header("Location:../../about.php?id=$id");
        }
    }
    
    
    
    
}









?>
