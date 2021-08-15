<?php
include 'hide navbar.php';
?>
<!DOCTYPE html>
<html>
<head>
       
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
<style type="text/css">
    .modal-content {
    background-color: #fefefe;
    margin: -5% auto 0% auto !important;
    border: 1px solid #888;
    width: 80%;
  }
  @media only screen and (max-width: 576px) and (min-width: 300px)
  {
    .modal-content {
    background-color: #fefefe;
    margin: -1% auto 0% auto !important;
    border: 1px solid #888;
    width: 80%;
  }
  }
           .q{
         position: absolute;top:50%;
         left: 50%;
         transform: translate(-50% , -50%);
         }
         .uploads{
         width:450px;
         padding: 20px;
         border-radius: 2px;
         background: white;margin-top:10px;
         }
/*         .like{
            margin-top:10px;
            display: flex;
            align-items: center;
         }*/
         .like_icon{
         width:23px;
         width:23px;margin: 10px;
         }
        .comment_icon{
         width:23px;
         width:23px;
         margin: 10px;
         }
        .share_icon{
         width:23px;
         width:23px;
         margin: 10px;
         }

</style>

</head>

<body>
    

    <form>

    <?php
    session_start();

    $USER = $_SESSION['userId'];


    include("connection.php");

    $query = "select * from user";
    ?>


<?php
    if (isset($_SESSION['userId'])) 
    { 
    $result = mysqli_query($con, $query);  
        while($row = mysqli_fetch_assoc($result))  
        {  

        ?>
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <?php
                        echo $row['fName']. " ".$row['lName'];
                    ?>
                  </div>
                  <div class="responsive">
                    <?php
                        echo " <a href=".$row['profileImage']."><img src='".$row['profileImage']."'  style='width:100%'/></a><br>";
                    ?>
                  </div>

                  <div class="modal-header">

                                <div style='cursor: pointer;' class='like' title="<?php echo $row['userId']; ?>">     
                                 <img class='like_icon' src='heart.svg' >
                                    <span id="showData<?php echo $row['sNo']; ?>" value="<?php echo $row['userId']; ?>">

                                    </span>
                                </div>

                                <div style='cursor: pointer;' class='comment' title="<?php echo $row['userId']; ?>" data-toggle="modal" data-target="#exampleModal">     
                                 <img class='comment_icon' src='comment.png'>
                                    <span>
                                <!-------------------------------------------------- comment's model---------------------------- -->
                                                <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">

                                                      <div class="modal-body">
                                                        <div class="showComment">
                                                            
                                                        </div>
                                                        <input type="text" name="comment" id="comment">
                                                      </div>
                                                      <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-primary">Send comment</button>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                    </span>
                                </div>


                                <div style='cursor: pointer;' class='share' title="<?php echo $row['userId']; ?>">     
                                 <img class='share_icon' src='share.svg'>
                                    <span>
                                        <a target="_blank" href=""></a>
                                    </span>
                               </div>
                  </div>
                </div>
            </div>


        <?php
        
        }
                  ?>

            <?php
    }
    else
    {
            header("location:login.php");
    }

    ?>
    </form>

</body>
<script type="text/javascript" src="jQuery.js"></script>

      <script type="text/javascript">
        
        $(document).ready(function() {

// --------------------------------------------------for share post--------------------------------------

            $(".share").on('click', function(event) {
                event.preventDefault();
                

                var url1= location.href+'?userId='+$(this).attr("title");
                
                fbURL = 'http://www.facebook.com/sharer.php?u='+url1+'';

               $(this).attr("href", fbURL);
            });

 // --------------------------------------------------for showing comment-------------------------------------
            $(".comment").on("click", function() {

             

              var id=$(this).attr("title");
            
                $.ajax({
                    url: 'API/comment.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {userId: id},
                    success : function(data){

                        $("#showComment").append(data.comment);

                    }
                });  

// ----------------------------------------------for adding comment------------------------------------------
                var comment = $("#comment").val();
                $.ajax({
                    url: 'API/comment.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {userId: id, comment: comment},
                    success : function(data){

                    }
                });
            });
           



// -----------------------------------------------------------for adding like----------------------------------

            $(".like").click(function() {

            var id=$(this).attr("title");

            var i=$(this).children(".like_icon").attr("src");

            if(i=="heart.svg"){
                $(this).children(".like_icon").attr("src","red_heart.svg");
                $(this).children("span").text("");
            }else if(i=="red_heart.svg"){
                $(this).children(".like_icon").attr("src","heart.svg");
                $(this).children("span").text("");
            }

            $.post(
                "like.php",
                {data:id,how:'c'}
                );

                
          });

            
       setTimeout(show,1000);
         
     
         });
        function show()
        {
            
             $.ajax({
                    url : "API/likeCount.php",
                    type : "POST",
                    
                    dataType : "JSON",
                    
                    success:function(data)
                    {
                        for(var index=1;index<=data[0];index++){
                    // alert(val[index]);
                            $("#showData"+index).html(data[1][index]);
                            $("#showData"+index).show();  
                        
                            }

                          

                    },
                    complete:function(data){
               setTimeout(show,1000);
              }
                    
                }); 
     
        }
      </script>
</html>