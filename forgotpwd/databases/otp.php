<?php   
include("../../databases/dbconn.php");
session_start();
$otp = $_POST['otp'];
$otpid = $_SESSION['otpid'];
//echo $otpid;

$output = '';
if(isset($_SESSION['otpid'])){
$query = "SELECT * FROM otp WHERE otpid = $otpid";
$fire = mysqli_query($conn,$query);
$data = mysqli_fetch_array($fire);
$cotp = $data['otp'];
$id = $data['id'];
if($otp != $cotp){
    
    $output .= '
   <div class="alert_danger p-1">
    <p  class="text-right closebtn">&times;</p>
    <p class="text-danger text-center">otp not mached</p>
    </div>
   '; 
    
}else{
    
  
    
     $output .= '
    <div class="alert-success p-1">
    <p class="text-success text-center">otp matched</p>
    </div>
    
     <div class="container mt-1  ">
  
      <div class="row">
          <div class="col-12">
             <div class="jumbotron">
            <h4 class="text-center">Set new password</h4>
              
              <form method="post" id="setpassword">
                 <div class="form-group">
                 <label for="newpwd"><strong>Enter new password</strong></label>
                  <input type="password" class="form-control" placeholder="enter new password" id="p" required="">
                   <label for="verifypwd"><strong>Verify new password</strong></label>
                  <input type="password" class="form-control" placeholder="confirm password" id="cp" required="">
                  <span class="text-danger cph"></span>
                  </div>
                  <button class="btn btn-primary btn-sm nextbtn" name="finalbtn" id="finalbtn" data-id="'.$id.'">save</button>
              </form>
             <div class="msg"></div>
              </div>
          </div>
      </div>
  </div>
    
    
    ';
    
    
    
}
}

echo $output;

?>