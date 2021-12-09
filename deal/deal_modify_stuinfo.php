<?php
session_start();
$id = $_SESSION['name'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$cstime = $_POST['cstime'];
$jg = $_POST['jg'];
$zybh = $_POST['zybh'];
$yxbh = $_POST['yxbh'];
$jyflag = $_POST['jyflag'];

$conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
mysqli_set_charset($conn, 'utf8');
$sql = "update stuinfo set id='$id',name='$name',gender='$gender',cstime='$cstime',jg='$jg',zybh='$zybh',yxbh='$yxbh',jyflag='$jyflag' where id='$id';";
mysqli_query($conn, $sql);
header("location:../stu/stu_stuinfo.php");
