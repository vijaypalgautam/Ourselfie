

<?php
header('Access-Control-Allow-Origin: *');

$user = $_POST['userId'];

$con = mysqli_connect("localhost","root","","ourselfie") or die("server error!");

if (isset($comment)) 
{
    $comment = $_POST['comment'];
    
    $query1 = "INSERT INTO comment VALUES(NULL,'$user','$comment')";
    $result1 = mysqli_query($con, $query1);
}



$query = "SELECT comment FROM comment WHERE userId = '$user'";
$result = mysqli_query($con, $query);
while ($row=mysqli_fetch_assoc($result)) 
{
	$profile[] = [ 
                         "comment" => $row['comment']
                ];
}		

echo json_encode($profile);


?>