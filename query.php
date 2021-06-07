
<?php 
 

 
   $query = "SELECT * FROM work WHERE wid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $data = mysqli_fetch_array($fire);
  
   

   $query = "SELECT * FROM fullimage WHERE id=$uid ORDER BY fid DESC";
   $fire = mysqli_query($conn,$query);
   $fulldata = mysqli_fetch_array($fire);
   $fullimage = $fulldata['image'];


   $query = "SELECT * FROM edu WHERE id=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $edudata = mysqli_fetch_array($fire);


   $query = "SELECT * FROM address WHERE clid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $cldata = mysqli_fetch_array($fire);


   $query = "SELECT * FROM haddress WHERE hid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $hdata = mysqli_fetch_array($fire);
   

   $query = "SELECT * FROM relation WHERE rid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $rdata = mysqli_fetch_array($fire);

   $query = "SELECT * FROM profile_pic WHERE pid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $picdata = mysqli_fetch_array($fire);

    $newpic = $picdata['image'];
    $array = explode('&',$newpic);
    $new = $array[1];
   $newid = $picdata['pid'];
//DANGER =========================================================================================DANGER/////////
    $update = "UPDATE `student_detail` SET `profile`='../About/profile_pic/$new' WHERE id=$newid ";
     $ufire = mysqli_query($conn,$update);
     $query = "select * from student_detail where id =$uid";
    $fire = mysqli_query($conn,$query);
    $udata = mysqli_fetch_array($fire);
     $pic = $udata['profile'];
     $picarray = explode('/',$pic);
     $picname = $picarray['3'];


   $eduquery = "SELECT * FROM basicedu WHERE beid=$uid ORDER BY id DESC";
   $edufire = mysqli_query($conn,$eduquery);
   $bedata = mysqli_fetch_array($edufire);
 
   $query = "SELECT * FROM contact WHERE conid=$uid ORDER BY id DESC";
   $fire = mysqli_query($conn,$query);
   $condata = mysqli_fetch_array($fire);
    
   $query = "SELECT * FROM skill WHERE skid=$uid LIMIT 3";
   $skillfire = mysqli_query($conn,$query);
   $tquery = "SELECT * FROM skill WHERE skid=$uid";
   $tskillfire = mysqli_query($conn,$tquery);
    $tsnum = mysqli_num_rows($tskillfire);
   $ttquery = "SELECT * FROM toolskil WHERE toolid=$uid";
   $ttskillfire = mysqli_query($conn,$ttquery);
   $ttsnum = mysqli_num_rows($ttskillfire);
   $tttquery = "SELECT * FROM interpskill WHERE ipid=$uid";
   $tttskillfire = mysqli_query($conn,$tttquery);
   $tttsnum = mysqli_num_rows($tttskillfire);
    
    $snum = $tsnum + $ttsnum + $tttsnum;
   

   $query = "SELECT * FROM achivement WHERE achivid=$uid LIMIT 3";
   $achivfire = mysqli_query($conn,$query);
   $tquery = "SELECT * FROM achivement WHERE achivid=$uid";
   $tachivfire = mysqli_query($conn,$tquery);
   $anum = mysqli_num_rows($tachivfire);

   $query = "SELECT * FROM project WHERE proid=$uid LIMIT 3";
    $profire = mysqli_query($conn,$query);
   $tquery = "SELECT * FROM project WHERE proid=$uid";
   $tprofire = mysqli_query($conn,$tquery);
   $pnum = mysqli_num_rows($tprofire);
 
   $query = "SELECT * FROM project WHERE proid=$uid LIMIT 3";
   $langfire = mysqli_query($conn,$query);
  $langdata = mysqli_fetch_array($langfire);

    

?>
