<?php
include 'connection.php';
       
if (isset($_POST['how']))
{
    session_start();

    $user_id = $_SESSION['userId'];

    $post_id = $_POST['data'];

    
    $sql1 = "SELECT `liker`, `liked` FROM `likes` WHERE liker='$user_id' and liked='$post_id'";
    $res = mysqli_query($con, $sql1);

    if ($res->num_rows == 0)
    {
        $sql2 = "UPDATE `user` SET `count`=count+1 WHERE userId='$post_id'";
        if ($con->query($sql2))
        {
            $sql3 = "INSERT INTO `likes`(`liker`, `liked`) VALUES ('$user_id','$post_id')";
            if ($con->query($sql3))
            {
                echo 1;
            }
        }
    }
    else if ($res->num_rows == 1)
    {
        $sql2 = "UPDATE `user` SET `count`=count-1 WHERE userId='$post_id'";
        if ($con->query($sql2))
        {
            $sql3 = "DELETE FROM `likes` WHERE liker='$user_id' and liked='$post_id'";
            if ($con->query($sql3))
            {
                echo 0;
            }
        }
    }

}

?>
