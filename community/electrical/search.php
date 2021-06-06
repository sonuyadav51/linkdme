 <?php  

include("../../databases/dbconn.php");
error_reporting(0);
$search = $_POST['Svalue'];
$branch = "electrical engineering";
$output='';
$query = "SELECT * FROM student_detail WHERE name LIKE '%".$search."%' AND branch = '$branch'";
$fire = mysqli_query($conn,$query);
if(mysqli_num_rows($fire)>0){
   while($row = mysqli_fetch_array($fire)){
       $output .= '
        
        <p ><a href="searchData.php?serch='.$row['name'].'&id='.$row['id'].'" class="searchp" style="color:white;"><i class="fas fa-search"></i> '.$row['name'].'</a></p>
       
       ';
   }
    echo $output;
}else{
    echo "<p style='color:white;'>Data Not Found</p>";
}

?>
