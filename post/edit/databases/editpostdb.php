<?php

include("../../../databases/dbconn.php");

$postid = $_POST['postid'];

$query = "SELECT * FROM post WHERE post_id = $postid";
$fire = mysqli_query($conn,$query);
$data = mysqli_fetch_array($fire);

echo mysqli_real_escape_string($conn,trim($data['post']));

?>
