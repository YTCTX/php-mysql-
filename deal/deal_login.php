<?php

header("Content-Type: text/html;charset=utf-8");
$username = isset($_POST['username']) ? $_POST['username'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$yzm = isset($_POST['code']) ? $_POST['code'] : "";
session_start();
$_SESSION['name'] = $username;
if (isset($yzm)) {
    if (strtolower($yzm) == $_SESSION['check_checks']) {
        if (!empty($username) && !empty($password)) {
            $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
            $sql_select = "SELECT * FROM users WHERE id = '$username'";
            $ret = mysqli_query($conn, $sql_select);
            $row = mysqli_fetch_array($ret);
            //判断用户名或密码是否正确
            if ($password == $row['pwd'] && $row['root'] == 1) {
                header("Location:../admin/main_admin.php");
            } elseif ($password == $row['pwd'] && $row['root'] == 0) {
                header("Location:../stu/stu_stuinfo.php");
            }
            mysqli_close($conn);
        } else {
            header("Location:../login/login.php?err=1");
        }
    } else {
        header("Location:../login/login.php?err=2");
    }
} else {
    header("Location:../login/login.php");
}

exit();
