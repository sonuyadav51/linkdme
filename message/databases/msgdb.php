<?php  
include("dbconn.php"); 

session_start();


$rid = $_POST['rid'];
$sid = $_POST['sid'];


$out ='';
$tsed='';

$rmsg = "select msg from message where rid = $rid and id = $sid";
$fire = mysqli_query($conn,$rmsg);

while($msg = mysqli_fetch_array($fire)){
    $out .= '
       
    
    ';
}


$smsg = "select msg from message where rid = $sid and id = $rid";
$fire = mysqli_query($conn,$smsg);

while($sed = mysqli_fetch_array($fire)){
 
    $tsed .= '
    
    
    
    ';
    
}


$array = [
    
    'rsms' => $out,
    'smsm' => $tsed
    
    
];

echo json_encode($array);


?>