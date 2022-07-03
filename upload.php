<?php
include("config.php");
include("auth_session.php");
 
if(isset($_POST['but_upload'])){
   $maxsize = 524288000; // 500MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 500MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

               mysqli_query($con,$query);
               $_SESSION['message'] = "Upload successfully.";
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   header('location: upload.php');
   exit;
} 
?>
<!doctype html> 
<html> 
<meta charset="utf-8">
  <head>
     <title>ระบบอัพโหลดวิดีโอประชาสัมพันธ์มหาวิทยาลัย</title>
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
      <li class="nav-item">
        <a class="nav-link" href="logout.php">ออกจากระบบ</a>
      </li>    
    </ul>
  </div>  
</nav>
<img src="http://6211011660021.sci.dusit.ac.th/clips/image/logo.png" width="100%" height="100%" alt="logo"><br>
    <!-- Upload response -->
    <?php 
    if(isset($_SESSION['message'])){
       echo $_SESSION['message'];
       unset($_SESSION['message']);
    }
    ?>
    <form method="post" action="" enctype='multipart/form-data'>
      <input type='file' name='file' />
      <input type='submit' value='Upload' name='but_upload'>
    </form>

  </body>
</html>