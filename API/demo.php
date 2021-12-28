   <?php
    function edit_profile($type,$change,$id)
    {
        // echo $type;
        $query_edit="UPDATE doctor_login set $type='".$change."' where doctor_id='$id' ";
        $result1=mysqli_query($this->conn,$query_edit);
        
        if($result1)
        {
            if($type=='email')
            {
            $_SESSION['$type']=$change;
            }
            echo "success";
        }
        else{
            echo "fail";
        }
    }




if(isset($_POST['edit']))
{
    $type=$_POST['type'];
    $change= $_POST['change'];
    $id= $_POST['id'];
    $ob->edit_profile($type,$change,$id);
}


$("#edit_modal").on("click",function(e) { 
$("#email").attr('disabled', false).css({ 'border' : '1px solid black' });   
$("#d_mobile").attr('disabled', false).css({ 'border' : '1px solid black' });   ;
$("#email").change(function(){
    var type="email";
    var change=$("#email").val();
    var id=$("#d_id").val();
    send_ajax(type,change,id);
});
$("#d_mobile").change(function(e){
    var type="d_mobile";
    var change=$("#d_mobile").val();
    var id=$("#d_id").val();
    send_ajax(type,change,id);
});
});