<?php
header('Access-Control-Allow-Origin: *');

$con = mysqli_connect("localhost","root","","ourselfie") or die("server error!");
$userId = $_POST['userId'];

$query="SELECT liker, liked FROM likes WHERE liker = '$userId' ORDER BY id";
$result = mysqli_query($con, $query);

while ($row=mysqli_fetch_assoc($result)) 
{
	$profile[]= $row;

}		

echo json_encode($profile);





?>