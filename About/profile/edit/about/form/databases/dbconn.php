<?php 
$conn = mysqli_connect('localhost','root','','linkdmeknit');  

if($conn == true){
  
}
else{
    echo("connection failed !!");
}

?>  
<?php 
   if(isset($_POST['wsubmit'])){
   $work = $_POST['editWork'];
  $id = $_GET['id'];
  
  
   
      $query = "INSERT INTO `work`(`wid`, `work`) VALUES ($id,'$work')";
      $fire = mysqli_query($conn,$query);
      if($fire==true){
          header("Location:../../?edit=info");
      }else{
          echo "pirablem";
      }
  
  
  }

?>


<?php 
   if(isset($_POST['esubmit'])){
   $college = $_POST['editcollege'];
   $branch =  $_POST['editbranch'];
   $start =  $_POST['editstart'];
   $end =  $_POST['editend'];
  $lbranch = strtolower($branch);
  $id = $_GET['id'];
  
  
   
      $query = "INSERT INTO `edu`(`id`, `college`,`branch`,`start`,`end`) VALUES ($id,'$college','$lbranch',$start,$end)";
      $fire = mysqli_query($conn,$query);
      if($fire==true){
          header("Location:../../?edit=info");
      }else{
          echo "something goes wrong";
      }
  
  
  }

?>


<?php 
   if(isset($_POST['clsubmit'])){
   $cloc = $_POST['editclocation'];
   
  $id = $_GET['id'];
  
  
   
      $query = "INSERT INTO `address`(`clid`, `clocation`) VALUES ($id,'$cloc')";
      $fire = mysqli_query($conn,$query);
      if($fire==true){
          header("Location:../../?edit=info");
      }else{
          echo "pirablem";
      }
  
  
  }

?>


<?php 
   if(isset($_POST['homesubmit'])){
   $hloc = $_POST['edithlocation'];
   
  $id = $_GET['id'];
  
  
   
      $query = "INSERT INTO `haddress`(`hid`, `haddress`) VALUES ($id,'$hloc')";
      $fire = mysqli_query($conn,$query);
      if($fire==true){
          header("Location:../../?edit=info");
      }else{
          echo "pirablem";
      }
  
  
  }

?>


<?php 
   if(isset($_POST['rsubmit'])){
   $rel = $_POST['relation'];
   
  $id = $_GET['id'];
  
  
   
      $query = "INSERT INTO `relation`(`rid`, `relation`) VALUES ($id,'$rel')";
      $fire = mysqli_query($conn,$query);
      if($fire==true){
          header("Location:../../?edit=info");
      }else{
          echo "pirablem";
      }
  
  
  }

?>

 <?php
//////////////////////////////  EDUCATION  /////////////////////////

if(isset($_POST['hsubmit'])){
$id = $_GET['id'];
$high   = $_POST['high'];

$query = "INSERT INTO `basicedu`(`beid`, `high`) VALUES ($id,'$high')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=edu");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['isubmit'])){
$id = $_GET['id'];

$inter   = $_POST['inter'];

$query = "UPDATE basicedu SET inter ='$inter' WHERE beid = $id";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=edu");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['gsubmit'])){
$id = $_GET['id'];

$graduate   = $_POST['gradute'];

$query = "UPDATE basicedu SET graduate ='$graduate' WHERE beid = $id";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=edu");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['eosubmit'])){
$id = $_GET['id'];

$other   = $_POST['eduother'];

$query = "UPDATE basicedu SET eduother ='$other' WHERE beid = $id";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=edu");
}
else{
    echo "pirablem";
}

}


?>

 <?php
//////////////////////////////  skill  /////////////////////////

if(isset($_POST['topsubmit'])){
$id = $_GET['id'];
$high   = $_POST['top'];

$query = "INSERT INTO `skill`(`skid`, `top`) VALUES ($id,'$high')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=skill");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['toolsubmit'])){
$id = $_GET['id'];

$high   = $_POST['tool'];

$query = "INSERT INTO `toolskil`(`toolid`, `tool`) VALUES ($id,'$high')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=skill");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['ipsubmit'])){
$id = $_GET['id'];

$high   = $_POST['interp'];

$query = "INSERT INTO `interpskill`(`ipid`, `interp`) VALUES ($id,'$high')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=skill");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['achivsubmit'])){
$id = $_GET['id'];

$other   = $_POST['achivements'];

$query = "INSERT INTO `achivement`(`achivid`, `achivement`) VALUES ($id,'$other')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=skill");
}
else{
    echo "pirablem";
}

}


?>
<?php 
//////////////////////////////////// PROJECTS //////////////////////////////////


if(isset($_POST['projectsubmit'])){
$id = $_GET['id'];

$high   = $_POST['project'];

$query = "INSERT INTO `project`(`proid`, `project`) VALUES ($id,'$high')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=project");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['opsubmit'])){
$id = $_GET['id'];

$other   = $_POST['otherpro'];

$query = "UPDATE `project` SET `other` = '$other' WHERE proid = $id";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=project");
}
else{
    echo "pirablem";
}

}


?>


<?php 
//////////////////////////////////// CONTACT //////////////////////////////////


if(isset($_POST['websubmit'])){
$id = $_GET['id'];

$high   = $_POST['website'];

$query = "INSERT INTO `contact`(`conid`, `website`) VALUES ($id,'$high')";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=contact");
}
else{
    echo "pirablem";
}

}


?>

<?php 
if(isset($_POST['gmailsubmit'])){
$id = $_GET['id'];

$other   = $_POST['gmail'];

$query = "UPDATE contact  SET gmail = '$other' WHERE conid = $id";
$fire = mysqli_query($conn,$query);

if($fire == true){
     header("Location:../../?edit=contact");
}
else{
    echo "pirablem";
}

}


?>










































