<?php
header('Access-Control-Allow-Origin: *');

$con = mysqli_connect("localhost","root","","ourselfie") or die("server error!");

$query = "SELECT count, sNo FROM user ";
$result = mysqli_query($con, $query);
$total=(int) mysqli_num_rows($result);

while ($row=mysqli_fetch_assoc($result)) 
{
	$profile[ $row['sNo']] =$row['count'];
}		

echo json_encode(array($total,$profile));




?>