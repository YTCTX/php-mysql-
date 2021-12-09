<?php

$conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
mysqli_set_charset($conn, 'utf8');
$pwd = $_POST['password'];
$re_pwd = $_POST['re_password'];
$id = $_POST['username'];
$gender = $_POST['sex'];
$QQ = $_POST['qq'];
$Email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
echo $gender;
if ($_POST['root'] == "管理员")
    $root = 'true';
else
    $root = 'false';

if ($pwd != $re_pwd) {
    echo '<script language="JavaScript">
alert("两次密码输入不一致，请重新输入!");
</script>';
} else {
    $sql_select = "SELECT * FROM users WHERE id = '$id'";
    $rows = mysqli_query($conn, $sql_select);
    if (mysqli_num_rows($rows) >= 1) {
        echo '<script language="JavaScript">
alert("已有此账户，请重新输入!");
</script>';
    } else {
        $sql = "insert into users values ('$id','$pwd','$gender','$QQ','$Email','$phone','$address',$root);";
        $result = mysqli_query($conn, $sql);
        header("location:../admin/main_user.php");
    }
}
echo '<script language="JavaScript">
window.history.back();
</script>';
