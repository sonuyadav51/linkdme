<?php  

  include('../dbconn.php');
  error_reporting(0);     
       
session_start();

if(!isset($_SESSION['uid'])){
    header('Location:../../Login/');
}
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

$mail->Subject = 'Connectin Request';
$mail->Body    = '<p> <b>'.$rdata['name'].'</b><br>  sent you friend request</p>';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
      $update = "UPDATE friend SET estatus = 1 WHERE   acid = $acid AND reid = $reid ";
      $ufire = mysqli_query($conn,$update);
   
     
  }
  

 



?>