<?php
session_start();
$id = $_POST['id']; //新
$name = $_POST['name'];
$gender = $_POST['gender'];
$cstime = $_POST['cstime'];
$jg = $_POST['jg'];
$zybh = $_POST['zybh'];
$yxbh = $_POST['yxbh'];
$jyflag = $_POST['jyflag'];
$pwd = $_POST['pwd'];



$conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
mysqli_set_charset($conn, 'utf8');
$stmt = mysqli_prepare($conn, 'update `stuinfo` set id=?,name=?,gender=?,cstime=?,jg=?,zybh=?,yxbh=?,jyflag=? where id=?');
mysqli_stmt_bind_param($stmt, 'sssssssss', $id, $name, $gender, $cstime, $jg, $zybh, $yxbh, $jyflag, $_SESSION['id_old']);
mysqli_stmt_execute($stmt);
mysqli_close($conn);
header("location:../admin/main_admin.php");
