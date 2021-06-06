
 <?php  
  include("../../databases/dbconn.php");
session_start();

  $value = $_POST['value'];
   define('EMAIL','vp50520@gmail.com');
   define('PASS','s.vivek96@');
   require 'PHPMailerAutoload.php';
   



$output ='';
$otp = rand(10000,99999);



$query = "SELECT * FROM student_detail WHERE email = '$value' ";
$fire = mysqli_query($conn,$query);

$num = mysqli_num_rows($fire);
$data = mysqli_fetch_array($fire);
$id = $data['id'];
   


if($num == 0){
    
    $output .='
    
                 <div class="error alert-danger p-2 my-2 ">
                  <p  class="text-right closebtn">&times;</p>
                  <p class="text-danger text-center">no accoount match with this email !!</p>
              </div>
    
     
    
    ';
    


    
    
}else{
    

$mail = new PHPMailer;

//$mail->SMTPDebug = 4;                               // Enable verbose debug output

 $mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;                 // SMTP username
$mail->Password = PASS;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Linkdme');
$mail->addAddress($value);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Reset Password';
$mail->Body    = '<p>Hello <b>'.$data['name'].'</b><br> this is the otp: <b>'.$otp.'</b> for your  password recover</p>';


if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    $insert = "INSERT INTO `otp`(`id`, `otp`) VALUES ($id,$otp)";
    $ifire = mysqli_query($conn,$insert);
    if($ifire){
         $select = "SELECT * FROM `otp` WHERE id = $id ORDER BY otpid DESC";
         $fire = mysqli_query($conn,$select);
         $sdata = mysqli_fetch_array($fire);
         $_SESSION['otpid'] = $sdata['otpid']; 
        
        $output .='

<div class="container  ">
  
      <div class="row">
          <div class="col-12">
             <div class="">
             <div class="error alert-success p-1 my-2 ">
                 <p  class="text-right closebtn">&times;</p>
                  <p class="text-success text-center">check your email <br> otp has been successfully sent on your email</p>
              </div>
              <form  method="post" id="otpCheck">
                 <div class="form-group">
                 <label for="mobilen"><strong>Enter otp</strong></label>
                  <input type="number" class="form-control" placeholder="enter otp..." name="otp" id="otp">
                  
                  </div>
                  <button class="btn btn-info btn-sm" name="verifybtn" id="verifybtn">verify</button>
              </form>
              
              <div class="otperror   my-2 ">
                 
              </div>
              
              </div>
          </div>
      </div>
  </div>






';

        
    }
   
}
    
    
    

}


   



echo $output;


?>