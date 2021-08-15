<?php 
    session_start();
    if(isset($_SESSION['userId'])){
        include_once "connection.php";
        $outgoing_id = $_SESSION['userId'];
        $incoming_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $message = mysqli_real_escape_string($con, $_POST['message']);
        if(!empty($message)){
            echo $query = "INSERT INTO message VALUES (NULL,'{$incoming_id}', '{$outgoing_id}', '{$message}',current_timestamp)";
            $sql = mysqli_query($con, $query);
        }
    }else{
        header("location: login.php");
    }


    
?>