<?php
header('Access-Control-Allow-Origin: *');
class user
{

    function __construct()
    {
    	$con=mysqli_connect("localhost","root","","ourselfie") or die("server error!");
        $this->con=$con;
    }


    function user_login()
    {
        $userValid="select * from user where userId='".$_POST['userId']."'";

        $query = mysqli_query($this->con,$userValid);
        $result = mysqli_num_rows($query);

            if (!$result > 0) 
            {
                $responce = "Enter correct userId";
                header("location:../login.php?Invalid=$responce");
                echo "<p>$responce</p>";  
            }
            else
            {
                $passValid="SELECT * FROM user WHERE userId='".$_POST['userId']."' AND password='".$_POST['password']."'" ;
                $query1 = mysqli_query($this->con,$passValid);
                $result1 = mysqli_num_rows($query1);

                    if ($result1 > 0) 
                    {
                        $responce = "welcome";
                        session_start();
                       echo $_SESSION['userId']=$_POST['userId'];
                        header("location:../welcome.php");
                    }
                    else
                    {
                        $responce = "Enter correct password";
                        header("location:../login.php?Invalid=$responce"); 
                        echo "<p>$responce</p>";           
                    }
            }

        echo json_encode($responce) ;

    }


	function showProfile()
	{
		$sql="SELECT * FROM user";

        $result=mysqli_query($this->con,$sql);
        if(mysqli_num_rows($result)>0)
        {
   			while ($row=mysqli_fetch_assoc($result)) 
   			{            
	            $profile[] =[	
                    "id" => $row['sNo'], 
                    "fName" => $row['fName'],
                    "lName" => $row['lName'], 
                    "DOB" => $row['DOB'],
                    "gender" => $row['gender'],
                    "email" => $row['email'],
                    "profileImage" => $row['profileImage'],
                    "cCode" => $row['countryCode'], 
                    "mobile" => $row['mobile_no'], 
                    "userId" => $row['userId']
                
					];
            }
                echo json_encode($profile);
        }
        else{
            echo "Profile not found";
        }
	}

    function signup()
    {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $DOB = $_POST['DOB'];
        $gender = $_POST['gender'];
        $email = $_POST['email'];
        $cCode = $_POST['cCode'];
        $mobile_no = $_POST['mobile'];
        $userId = $_POST['userId'];
        $password = $_POST['password'];
           

            if(preg_match('/^[0-9]{10}+$/', $mobile_no)) 
            {

                

                    $query1 = "select userId from user where userId='$userId' ";
                    
                    $result3 = mysqli_query($this->con,$query1);
                    $result4 = mysqli_fetch_assoc($result3);

                   
                    if ($userId == $result4['userId']) 
                    {
                        $responce = "User id already exist";
                        header("location:../signup.php?Invalid=$responce");
                        
                    }
                    else
                    {

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

                        $sql = "INSERT INTO user VALUES(NULL,'$fName','$lName','$DOB','$gender','$email','$cCode','$mobile_no','$userId','$password','$profileImage',current_timestamp,0)";
                        $query = mysqli_query($this->con,$sql);

                        if ($query) 
                        {
                            $responce = "Data inserted";
                            
                            session_start();
                            $_SESSION['userId']=$_POST['userId'];
                            header("location:../welcome.php");
                        }
                        else
                        {
                            $responce = "Data not inserted";
                            // header("location:../signup.php?Invalid=Invalid credentials");

                        }
                        echo json_encode($responce);
                        
                    }
            }
                else
                {

                    $responce = "Invalid mobile number";
                    header("location:../signup.php?mobile=$responce");

                }

            
            



    }

    // class close
}    


$ob= new user;
if(isset($_POST['login'])==1)
{
    $email=$_POST['userId'];
    $passwod=$_POST['password'];
    
$ob->user_login();
}


if(isset($_POST['profile'])==2)
{
	$ob->showProfile();
}

if (isset($_POST['signup'])==3) 
{
    $ob->signup();
}






?>


