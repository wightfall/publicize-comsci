<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
</head>
<body>
<?php
    require('config.php');
    if (isset($_REQUEST['username'])) {
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $create_datetime = date("Y-m-d H:i:s");
        $query    = "INSERT into `users` (username, password, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>ลงทะเบียนสำเร็จ</h3><br/>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>กรุณากรอกข้อมูลให้ครบทุกช่อง</h3><br/>
                  </div>";
        }
    } else {
}
?>
    <form class="form" action="" method="post">
        <h1 class="login-title">ลงทะเบียน</h1>
        <input type="text" class="login-input" name="username" placeholder="Username" required /><br>
        <input type="password" class="login-input" name="password" placeholder="Password" required /><br>
        <input type="submit" name="submit" value="ลงทะเบียน" class="login-button"><br>
    </form>
</body>
</html>
