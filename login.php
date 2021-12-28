
<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="style1.css">
</head>

<body>
    <form class="modal-content animate" action="API/userLogin.php" method="post">	
<div style="color:red;">
<?php
if(@$_GET['Empty']==true)
{
echo $_GET['Empty'];
}
?>

<?php
if(@$_GET['Invalid']==true)
{
echo $_GET['Invalid'];
}
?>
</div>

    	<div class="container">
            <label for="id"><b>User Id</b></label>
            <input type="text" placeholder="User Id" name="userId">

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter your Password" name="password" id="myInput">
            <input type="checkbox" onclick="myFunction()">Show Password<br>               
            <button type="submit" name="login">Login</button>
          
            <div align="center">	
              <a href="forget.php">Forgot password?</a>
            </div>
        </div>


    </form>
</body>

<script>

  function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>

<script type="text/javascript" src="jQuery.js"></script>




</html>