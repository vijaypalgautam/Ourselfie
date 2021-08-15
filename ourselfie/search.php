<?php
    session_start();
    include_once "connection.php";

    $outgongin_userId = $_SESSION['userId'];
    $searchTerm = mysqli_real_escape_string($con, $_POST['searchTerm']);

    echo $sql = "SELECT * FROM user WHERE userId = {$outgoing_id} AND (fName LIKE '%{$searchTerm}%' OR lName LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($con, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>