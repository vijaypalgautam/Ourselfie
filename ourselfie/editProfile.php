<?php

    $type=$_POST['type'];
    $change= $_POST['change'];

    $id= $_POST['userId'];

    $query_edit="UPDATE user set $type='".$change."' where userId='$id' ";
    $result1=mysqli_query($this->conn,$query_edit);

?>