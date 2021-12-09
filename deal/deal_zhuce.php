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
        $stmt = mysqli_prepare($conn, 'insert into `users` values(?,?,?,?,?,?,?,false)');
        mysqli_stmt_bind_param($stmt, 'sssssss', $id, $pwd, $gender, $QQ, $Email, $phone, $address);
        mysqli_stmt_execute($stmt);
        mysqli_close($conn);
        header("location:../login/login.php");
    }
}
echo '<script language="JavaScript">
window.history.back();
</script>';
