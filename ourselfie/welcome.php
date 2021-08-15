
<?php

include 'hide navbar.php';

session_start();

$USER = $_SESSION['userId'];


include("connection.php");

$query = "select * from user where userId='$USER'";
$data = mysqli_query($con,$query);

if (isset($_SESSION['userId'])) 
{
	        	while ($result = mysqli_fetch_assoc($data)) 
        {
        ?>

        <!DOCTYPE html>
        <html>
        <head>
        <style>
          table {
          	text-align: center;
            border-collapse: collapse;
            border-spacing: 0;
            width: 80%;
            border: 1px solid #ddd;
           }
            th, td {
            text-align: left;
            padding: 16px;

           }
            tr:nth-child(even) {
            background-color: #4cd8ed;
            }
        </style>
        </head>

        <body style="background-color: #b2eaed">


        <form method="POST" enctype="multipart/form-data">
          <font size="05" color="#3333ff" style="font-family: time new roman">
        <table align="center">
        	<th colspan="2" style="color: red;">
        		<b><i><font size="06">Only you can see given data.</font></i></b>
        	</th>
         <tr>

          <tr>
          
            <td colspan="2">
                  <div align="center">  
                    
              <?php
                $query1 = "select profileImage from user where userId='$USER'";
                $image = mysqli_query($con, $query1);  
                while($profileImage = mysqli_fetch_array($image))  
                {

                  echo "<a href='$profileImage[profileImage]'><img src=".$profileImage['profileImage']." class='rounded-circle' style='width:40%'/></a>";
                }            
                ?>
                </div>
              </td>
          </tr>


         	<td style="color: #331d75;">
         		User name
         	</td>
         	<td>
         		<?php
         			echo $result['fName']." ".$result['lName'];

         			?>
         		</td>
         </tr>	
         <tr>
         	<td style="color: #331d75;">
         		Email
         	</td>
         	<td>
         		<?php
         			echo $result['email'];
         			?>
         		</td>
         </tr>
         <tr>
         	<td style="color: #331d75;">
         		Date of birth
         	</td>
         	<td>
         		<?php
         			echo $result['DOB'];
         			?>
         		</td>
         </tr>
         <tr>
         	<td style="color: #331d75;">
         		Gender
         	</td>
         	<td>
         		<?php
         			echo $result['gender'];
         			?>
         		</td>
         </tr>
         <tr>
         	<td style="color: #331d75;">
         		Mobile number
         	</td>
         	<td>
         		<?php
         			echo $result['mobile_no'];
         			?>
         		</td>
         </tr>
         <?php	
        }		
        ?>
        <tr>
        	<td>
        		
        <?php
        	echo '<a href="logout.php?logout" >Logout</a>';
        ?>

        	</td>
        	<td>
        		
        <?php
        	echo '<a href="edit.php" >Edit profile</a>';
        ?>

        	</td>
        </tr>
<?php
}
else
{
	header("location:login.php");
}

?>
 	



  
</table>
</font>
</form>
</body>



</html>
