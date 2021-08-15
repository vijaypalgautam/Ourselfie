<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html>
<head>
  <title>forget</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
  <form class="modal-content animate" action="forget_result.php" method="post"> 
    <div class="container">
      <label for="mobile_no"><b>Mobile number</b></label>
      <input type="number" placeholder="Enter Mobile number" name="mobile_no" required> 
        
      <button type="submit" name="login">Submit</button>
    </div>

    <script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
    </script>

  </form>

</body>
</html>

