<?php

include 'connection.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>upload image</title>
</head>
<body>

	<form action="editImage.php" method="post" enctype="multipart/form-data">
		
		<input type="file" name="image">
		<input type="submit" value="Upload image">
	</form>

</body>
</html>

<?php
$filename = $_FILES["image"]["name"];
$tmpname = $_FILES["image"]["tmp_name"];
$folder = "image/".$filename;
move_uploaded_file($tmpname, $folder);

$result = "insert into profileimages values('$id','$folder')";
$result2=mysqli_query($con, $result);

if (!$result2) 
{
	echo "image not inserted";
}
else
{
	echo "image inserted";
	header("location:login.php");
}





?>