<?php   

include("../dbconn.php");

$rid = $_POST['rid'];
$aid = $_POST['aid'];

$status = 0;
$msg = '';
$ff = '';


$check = "SELECT * FROM friend WHERE (acid = $aid AND reid = $rid) OR (acid = $rid AND reid = $aid)";

$fire =mysqli_query($conn,$check);

$num = mysqli_num_rows($fire);

if($num==0){
    $insert = "INSERT INTO `friend`(`acid`, `reid`, `status`) VALUES ($aid,$rid,$status)";
    $ifire = mysqli_query($conn,$insert);
    if($ifire){
        $msg .= '<p class="text-success ml-2">Cancel</p>';
       
   
     define('EMAIL','7398sonuyadav@gmail.com');
   define('PASS','Sonuyadav123@');
   require 'PHPMailerAutoload.php';
   $friend = "SELECT * FROM `friend` WHERE estatus = 0 ORDER BY id DESC";
   $mfire = mysqli_query($conn,$friend);
   $data = mysqli_fetch_array($mfire);
   $acid = $data['acid'];
   $reid = $data['reid'];

  
  if($mfire){
      $query = "SELECT * FROM student_detail WHERE id = $acid";
      $afire = mysqli_query($conn,$query);
      $adata = mysqli_fetch_array($afire);
      $aemail = $adata['email'];
      $rquery = "SELECT * FROM student_detail WHERE id = $reid";
      $rfire = mysqli_query($conn,$rquery);
      $rdata = mysqli_fetch_array($rfire);
      $rname = $rdata['name'];
     //echo $aemail; 
  }
$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

//$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Linkdme');
$mail->addAddress($aemail);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Connection Request';
$mail->Body    = '<p> <b>'.$rdata['name'].'</b><br>  sent you Connection request</p>';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
      $update = "UPDATE friend SET estatus = 1 WHERE   acid = $acid AND reid = $reid ";
      $ufire = mysqli_query($conn,$update);
   
     
  }
  
   
   
   
   
   
   
   
   
   
    }
}
else{
    
        $acheck = "SELECT * FROM friend WHERE (acid = $aid AND reid = $rid AND status = $status) OR (acid = $rid AND reid = $aid AND status = $status) ";

             $afire =mysqli_query($conn,$acheck);

$anum = mysqli_num_rows($afire);
if($anum == 0){
    $ff .= '<div class="alert-success">
    <h2 class="text-center"><strong>you are already  friend</strong></h2>
</div>';
}else{
   
    $delete = "DELETE FROM friend WHERE (acid = $aid AND reid = $rid  AND status =$status) OR (acid = $rid AND reid = $aid  AND status =$status)";
    
    $dfire = mysqli_query($conn,$delete);
    
    
    if($dfire){
        
    $msg .= '<div class="">
    <p>Connect</p>
   </div>';
        
    }
    
}
    
}
 
$array = [
     'msg' => $msg,
    'ff' => $ff
    
    
    
    
];

echo json_encode($array);

?>


