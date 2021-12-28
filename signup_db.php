<?php
$con = mysqli_connect('localhost','root','','ourselfie') or die("server error!");


$fn=$_POST["fn"];
$mn=$_POST["mn"];
$ln=$_POST["ln"];
$email=$_POST["email"];
$dob=$_POST["dob"];
echo $gender=$_POST["gender"];
$mobile_no=$_POST["mobile"];
$password=$_POST["password"];

if ($gender=="male") 
{
    $profileImage="image/male.png";
}
elseif ($gender=="female") 
{
    $profileImage="image/female.png";
}
else
{
    $profileImage ="";
}

$insertImage = "INSERT INTO profileimages values('$mobile_no','$profileImage')";

mysqli_query($con,$insertImage);


$query="select * from user where mobile_no = '$mobile_no'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if ($num==1) 
{
	
	header('location:signup.php?Invalid=*Mobile number already taken.<br>Click here for <a href="login.php">Log in</a>');

	
}
else
{
	$insert = "INSERT INTO user VALUES(NULL,'$fn','$mn','$ln','$email','$dob','$gender','$mobile_no','$password')";
	echo "<br>";

	$result2=mysqli_query($con,$insert);
	if (!$result2)
	{
	echo "Value not inserted";
	}
	else
	{
		header('location:login.php');
	}
	
}
?>