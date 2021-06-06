<?php 

include("dbconn.php"); 


$search = $_POST['Svalue'];
$output='';
$query = "SELECT * FROM student_detail WHERE name LIKE '%".$search."%'";
$fire = mysqli_query($conn,$query);
if(mysqli_num_rows($fire)>0){
   while($row = mysqli_fetch_array($fire)){
       $output .= '
        
        <p ><a href="../searchData.php?serch='.$row['name'].'&id='.$row['id'].'" class="searchp"><i class="fas fa-search"></i> '.$row['name'].'</a></p>
       
       ';
   }
    echo $output;
}else{
    echo "Data Not Found";
}

?>
