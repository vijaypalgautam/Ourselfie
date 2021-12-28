

        function show()
        {
            
            $.ajax({
                url : "API/likeCount.php",
                type : "POST",
                dataType : "JSON",
                success:function(data)
                {
                    for(var index=1;index<=data[0];index++)
                    {
                        $("#showData"+index).html(data[1][index]);
                        $("#showData"+index).show();  
                    }
                },
                complete:function(data)
                {
                    setTimeout(show,1000);
                }
                    
            }); 
     
        }
