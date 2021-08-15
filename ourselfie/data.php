<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM message WHERE (incoming_msg_id = '{$row['userId']}'
                OR outgoing_msg_id = '{$row['userId']}') AND (outgoing_msg_id = '{$outgoing_id}' 
                OR incoming_msg_id = '{$outgoing_id}') ORDER BY id DESC LIMIT 1";
        $query2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="No message available";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_userId'])){
            ($outgoing_id == $row2['outgoing_userId']) ? $you = "You: " : $you = "";
        }else{
            $you = "";
        }


        $output .= '<a href="chat.php?userId='. $row['userId'] .'">
                    <div class="content">
                    <img src="'. $row['profileImage'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fName']. " " . $row['lName'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                </a>';
    }
?>