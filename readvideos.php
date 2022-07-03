<?php
include("config.php");
?>
<!doctype html>
<html>
<meta charset="utf-8">
  <head>
    <title>คลิปประชาสัมพันธ์มหาวิทยาลัย</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
<nav class="navbar bg-dark navbar-dark">
  <a class="navbar-brand" href="#">ประชาสัมพันธ์มหาวิทยาลัย</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">หน้าแรก</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="readvideos.php">แสดงวิดีโอประชาสัมพันธ์มหาวิทยาลัย</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="upload.php">เข้าสู่ระบบอัพโหลดคลิปวิดีโอประชาสัมพันธ์มหาวิทยาลัย</a>
      </li>    
      <li class="nav-item">
        <a class="nav-link" href="credits.html">รายชื่อผู้จัดทำ</a>
      </li>    
    </ul>
  </div>  
</nav>
<img src="http://6211011660021.sci.dusit.ac.th/clips/image/logo.png" width="100%" height="100%" alt="logo">
    <div>
 
     <?php
     $fetchVideos = mysqli_query($con, "SELECT * FROM videos ORDER BY id DESC");
     while($row = mysqli_fetch_assoc($fetchVideos)){
       $location = $row['location'];
       $name = $row['name'];
       echo "<div style='float: left; margin-right: 5px;'>
          <video src='".$location."' controls width='320px' height='320px' ></video>     
          <br>
          <span>".$name."</span>
       </div>";
     }
     ?>
 
    </div>

  </body>
</html>