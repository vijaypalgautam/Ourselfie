<?php 
    session_start();
    if(isset($_SESSION['userId'])){
        include_once "connection.php";
        $outgoing_msg_id = $_SESSION['userId'];
        $incoming_msg_id = mysqli_real_escape_string($con, $_POST['incoming_id']);
        $output = "";
         $sql = "SELECT * FROM message LEFT JOIN user ON user.userId = message.outgoing_msg_id 
                WHERE (outgoing_msg_id = '{$outgoing_msg_id}' AND incoming_msg_id = '{$incoming_msg_id}')
                OR (outgoing_msg_id = '{$incoming_msg_id}' AND incoming_msg_id = '{$outgoing_msg_id}') ORDER BY id";
        $query = mysqli_query($con, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_msg_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="'.$row['profileImage'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">No messages are available. Once you send message they will appear here.</div>';
        }
        echo $output;
    }else{
        header("location:login.php");
    }

?>