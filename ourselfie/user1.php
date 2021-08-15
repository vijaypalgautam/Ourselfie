<?php
    session_start();
    include_once "connection.php";
    $outgoing_id = $_SESSION['userId'];
    $sql = "SELECT * FROM user WHERE NOT userId = '{$outgoing_id}' ORDER BY userId DESC";
    $query = mysqli_query($con, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>