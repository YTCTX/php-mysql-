<?php
session_start();
$id = $_POST['id'];
$pwd = $_POST['pwd'];
$gender = $_POST['gender'];
$QQ = $_POST['QQ'];
$Email = $_POST['Email'];
$Phone = $_POST['phone'];
$address = $_POST['address'];
echo $id;
echo $pwd;
echo $gender;
echo $QQ;
echo $Email;
echo $Phone;
echo $address;
echo $jyflag;
echo $_SESSION['id_user'];

if ($_POST['YHflag'] == "管理员")
    $root = true;
else
    $root = false;

$conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
mysqli_set_charset($conn, 'utf8');
$stmt = mysqli_prepare($conn, 'update `users` set id=?,pwd=?,gender=?,QQ=?,Email=?,phone=?,address=?,root=? where id=?');
mysqli_stmt_bind_param($stmt, 'sssssssss', $id, $pwd, $gender, $QQ, $Email, $Phone, $address, $root, $_SESSION['id_user']);
mysqli_stmt_execute($stmt);
mysqli_close($conn);
header("location:../admin/main_user.php");
