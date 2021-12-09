<?php
$id = $_POST['username'];
$Email = $_POST['Email'];
$password = $_POST['password'];
$password1 = $_POST['password1'];


if ($password != $password1) {
    echo '<script language="JavaScript">
    alert("两次密码输入不一致，请重新输入!");
    </script>';
    echo '<script language="JavaScript">
                window.history.back();
                </script>';
} else {
    $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
    $sql_select = "SELECT * FROM users WHERE id = '$id'";
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret);
    if (mysqli_num_rows($ret) >= 1) {
        if ($row['Email'] == $Email) {
            $stmt = mysqli_prepare($conn, 'update `users` set pwd = ? where id=?');
            mysqli_stmt_bind_param($stmt, 'ss', $password, $id);
            mysqli_stmt_execute($stmt);
            mysqli_close($conn);
            header('location:../login/login.php');
        } else {
            echo '<script language="JavaScript">
             alert("邮箱不正确，不能修改！");
             </script>';
            echo '<script language="JavaScript">
                window.history.back();
                </script>';
        }
    } else {
        echo '<script language="JavaScript">
        alert("没有此用户！");
        </script>';
        echo '<script language="JavaScript">
                window.history.back();
                </script>';
    }
}
