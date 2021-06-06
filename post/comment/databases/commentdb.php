
 <?php    
  include("../../../databases/dbconn.php");
error_reporting(0);
session_start();

 $postid = $_POST['postid'];
 $comment = mysqli_real_escape_string($conn,trim($_POST['comment'])); 
 $uid = $_SESSION['uid'];
$cids = array();

$uselect = "SELECT * FROM student_detail WHERE id = $uid";
$ufire = mysqli_query($conn,$uselect);
$data = mysqli_fetch_array($ufire);
$name = $data['name'];
$image = $data['profile'];


 
if(isset($postid) && isset($comment)){
    
    $query = "INSERT INTO `postcomment`(`post_id`, `id`, `comment`,`status`) VALUES ($postid,$uid,'$comment',1)";
    
    $fire = mysqli_query($conn,$query);
    if($fire){
        echo "<p> data submited</p>";
        $select = "SELECT * FROM postcomment WHERE post_id = $postid AND id = $uid";
        $cfire = mysqli_query($conn,$select);
        while($cdata = mysqli_fetch_array($cfire)){
            $cid = $cdata['commentid'];
            array_push($cids,$cid);
        }
        $number = count($cids);
        for($i=0;$i<$number+1;$i++){
            $commentid = $cids[$i];
            $nselect = "SELECT * FROM notification WHERE cid = $commentid";
            $ncfire = mysqli_query($conn,$nselect);
            
           if(mysqli_num_rows($ncfire) == 0){
                $cquery = "INSERT INTO `notification`(`name`,`id`, `post_id`,cid, `action`,`profile`) VALUES ('$name',$uid,$postid,$commentid,2,'$image')";
                $cfire = mysqli_query($conn,$cquery);
                
           }
           
            
        
        }
        
    }else{
        echo "not hello";
    }
}









?>