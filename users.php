<?php 
  session_start();
  include_once "connection.php";
  if(!isset($_SESSION['userId'])){
    header("location: login.php");
  }
?>

<?php include_once "hide navbar.php"; ?>
<link rel="stylesheet" type="text/css" href="chat.css">
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <div class="content">
          <?php
            $query = "SELECT * FROM user WHERE userId = '{$_SESSION['userId']}'";
             $sql = mysqli_query($con, $query);
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="<?php echo $row['profileImage'];  ?> " alt="">
          <div class="details">
            <span><?php echo $row['fName']. " " . $row['lName'] ?></span>
          </div>
        </div>
        <a href="logout.php" class="logout">Logout</a>
      </header>
      <div class="search">
        <span class="text">Select an user to start chat</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <div class="users-list">
  
      </div>
    </section>
  </div>

<script type="text/javascript">
    const searchBar = document.querySelector(".search input"),
  searchIcon = document.querySelector(".search button"),
  usersList = document.querySelector(".users-list");

  searchIcon.onclick = ()=>{
    searchBar.classList.toggle("show");
    searchIcon.classList.toggle("active");
    searchBar.focus();
    if(searchBar.classList.contains("active")){
      searchBar.value = "";
      searchBar.classList.remove("active");
    }
  }

  searchBar.onkeyup = ()=>{
    let searchTerm = searchBar.value;
    if(searchTerm != ""){
      searchBar.classList.add("active");
    }else{
      searchBar.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "search.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            usersList.innerHTML = data;
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("searchTerm=" + searchTerm);
  }

  setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "user1.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            if(!searchBar.classList.contains("active")){
              usersList.innerHTML = data;
            }
          }
      }
    }
    xhr.send();
  }, 1000);
</script>

</body>
</html>
