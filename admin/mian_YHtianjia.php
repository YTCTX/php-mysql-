<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/tianjia.css">
    <title>注册</title>
</head>

<body>
    <div id="bigBox">
        <h1>用户添加页面</h1>
        <form action="mian_YHtianjia.php" method="POST">
            <div class="inputBox">
                <div class="textarea">
                    <div class="inputText">
                        <input type="text" id="id_name" name="username" required="required" placeholder="用户名">
                    </div>
                    <div class="inputText">
                        <input type="password" id="password" name="password" required="required" placeholder="密码">
                    </div>
                    <div class="inputText">
                        <input type="password" id="re_password" name="re_password" required="required" placeholder="再次输密码">
                    </div>
                    <div class="inputText m-plc" style="color: white;opacity: 70%">
                        类型
                        <input type="radio" id="type" name="root" value="管理员" style="color: white">管理员
                        <input type="radio" id="type" name="root" value="学生" style="color: white">学生
                    </div>
                    <div class="inputText m-plc" style="color: white;opacity: 70%">
                        性别
                        <input type="radio" id="type" name="sex" value="男" style="color: white">男
                        <input type="radio" id="type" name="sex" value="女" style="color: white">女
                    </div>
                    <div class="inputText">
                        <input type="text" id="qq" name="qq" required="required" placeholder="QQ">
                    </div>
                    <div class="inputText">
                        <input type="email" id="email" name="email" required="required" placeholder="Email">
                    </div>
                    <div class="inputText">
                        <input type="text" id="phone" name="phone" required="required" placeholder="电话">
                    </div>
                    <div class="inputText">
                        <input type="text" id="address" name="address" required="required" placeholder="地址">
                    </div>
                    <br>
                    <div style="color: white;font-size: 12px">
                        <!--提示信息-->
                        <?php
                        $err = isset($_GET["err"]) ? $_GET["err"] : "";
                        switch ($err) {
                            case 1:
                                echo "用户名已存在！";
                                break;

                            case 2:
                                echo "密码与重复密码不一致！";
                                break;

                            case 3:
                                echo "添加成功！";
                                break;
                        }
                        ?>
                    </div>
                </div>
                <div>
                    <input type="submit" id="register" name="register" value="添加" class="loginButton m-left">
                    <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
                </div>
            </div>
        </form>
    </div>
    <?php
    if (isset($_POST['register'])) {
        /*
$pwd = $_POST['password'];
$re_pwd = $_POST['re_password'];
$id = $_POST['username'];
$gender = $_POST['sex'];
$QQ = $_POST['qq'];
$Email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
if ($_POST['root'] == "管理员")
    $root = 'true';
else
    $root = 'false';

echo $pwd;
echo $re_pwd;
echo $id;
echo $gender;
echo $QQ;
echo $Email;
echo $phone;
echo $address;
echo $root;*/
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
    }
    ?>
</body>

</html>