<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>เข้าสู่ระบบ</title>
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
<?php
    require('config.php');
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            header("Location: upload.php");
        } else {
            echo "<div class='form'>
                  <h3>ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง</h3><br/>
                  </div>";
        }
    } else {
?>
    <form class="form" method="post" name="login">
        <h1 class="login-title">เข้าสู่ระบบ</h1><br>
        <p>สำหรับแอดมิน user admin password 1234</p><br>
        <input type="text" class="login-input" name="username" placeholder="Username" autofocus="true"/><br>
        <input type="password" class="login-input" name="password" placeholder="Password"/><br>
        <input type="submit" value="เข้าสู่ระบบ" name="submit" class="login-button"/><br>
  </form>
<?php
    }
?>
</body>
</html>
