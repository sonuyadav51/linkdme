
<?php 

include('../dbconn.php');
session_start();
/*
    $data = $_POST['image'];
    $img_1 = explode(';',$data);
    $img_2 = explode(',',$img_1[1]);
    $data = base64_decode($img_2[1]);
    $imageName =time() . '.png';
    $pcstore = '../About/profile_pic/'.$imageName;
    file_put_contents($pcstore,$data);
  
  
 
     echo "About/profile_pic/".$imageName; 
     
     
     
 
   */  
        
if(isset($_REQUEST['submit'])){
  
$name   =  strip_tags(mysqli_real_escape_string($conn, trim($_REQUEST['uname'])));
$email  =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['uemail'])));
$roll   =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['uroll'])));
$pwd    =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['upwd'])));
$cpwd   =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['cpwd'])));
$dob    =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['dob'])));
$gender =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['gender'])));
$branch =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['branch'])));
//$college =  strip_tags(mysqli_real_escape_string($conn,trim($_REQUEST['college'])));
    
    $pic = $_FILES['profile']; 
    //print_r($pic['name']);
    $filename = $pic['name'];
    $tempname = $pic['tmp_name'];
    //echo $filename;
    $pcstore = '../../About/profile_pic/'.$filename;
    move_uploaded_file($tempname,  $pcstore);
    $name_valid = $email_valid = $roll_valid = $pwd_valid = false;

// validate name //

    if(!empty($name)){
        if(strlen($name)>2 && strlen($name)<=30){
            if(!preg_match('/[^a-zA-Z\s]/',$name)){
                //all test pass//
                $name_valid=true;
                echo"name is valid <br>";
            }else{
                echo "name is not valid";
            }
        }
        else{
            echo"name must be between 2 to 30 chars long..<br>";
        }
        
    }
    else{
        echo"name can not be blank<br>";
    }
                      
//email validate
    if(!empty($email)){
       //ALL TEST PASS
        $email_valid = true;
        echo"email is valid<br>";
        
    }
    else{
          echo "email can not be blank <br>";                
         }
    //mobile validation
    if(!empty($roll)){
        if( strlen($roll)>9){
          if(!preg_match('/^[0-9]{10}$/')){
                //all test pass//
                $roll_valid=true;
                echo"mobile  is valid <br>";
           
             }else{
              echo "mobile is not valid";
          }
          
        }
        else{
            echo"mobile greater than 9..<br>";
        }
        
    }
    else{
        echo"mobile can not be blank<br>";
    }
     
      //password validation
    if(!empty($pwd)){
        if(strlen($pwd)>=5 && strlen($pwd)<=15){
            //all test pass
            $pwd_valid = true;
            $pwd = md5($pwd);
            echo"password is valid";
            
        }
        else{
            echo"password must be between 5 to 15 chars long..<br>";
        }
    }
    else{
        echo"password can not blank<br>";
                          
        }

           if($name_valid && $email_valid && $roll_valid && $pwd_valid){
           $check = "select * from student_detail where email = '$email' or roll_no = $roll";
           $checkfire = mysqli_query($conn,$check);
           $num = mysqli_num_rows($checkfire);
           
           if( $num > 0){
               header("Location:../../index.php?exist=invalid data submission !!please fill all data carefully.");
               
           }
           else{
              
              
               $query = "INSERT INTO `student_detail`(`name`, `email`, `roll_no`, `pwd`, `dob`, `gender`,`branch`, `profile`) VALUES ('$name','$email',$roll,'$pwd ','$dob ','$gender','$branch','$pcstore')";
                $queryFire = mysqli_query($conn,$query);
    
    
                if($queryFire == true){
                     $_SESSION['firstImg'] =  $filename;
                   
                   
                     header("Location:../../Login/index.php");
                }else{
                     header("Location:../../index.php?invalid=somrthinf");   
                    
                }
               
           }        
    
                 }else{
                    header("Location:../../index.php?invalid=invalid data submission !!please fill all data carefully.");
                  }
    
    
   
               
    
}




?>