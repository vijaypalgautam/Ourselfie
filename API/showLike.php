<?php
include '../connection.php';
header('Access-Control-Allow-Origin: *');

$userId = $_POST['userId'];

$query="SELECT liker, liked FROM likes WHERE liker = '$userId' ORDER BY id";
$result = mysqli_query($con, $query);

while ($row=mysqli_fetch_assoc($result)) 
{
	$profile[]= $row;

}		

echo json_encode($profile);





?>