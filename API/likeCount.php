<?php
include 'config.php';
header('Access-Control-Allow-Origin: *');

$query = "SELECT count, sNo FROM user ";
$result = mysqli_query($conn, $query);
$total=(int) mysqli_num_rows($result);

while ($row=mysqli_fetch_assoc($result)) 
{
	$profile[ $row['sNo']] =$row['count'];
}		

echo json_encode(array($total,$profile));




?>