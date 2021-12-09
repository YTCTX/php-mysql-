<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/register.css">
    <title>注册</title>
</head>

<body>
    <div id="bigBox">
        <h1>注册页面</h1>


        <form action="../deal/deal_zhuce.php" method="post">
            <div class="inputBox">

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
                    性别：
                    <input type="radio" id="sex" name="sex" value="男" style="color: white">男
                    <input type="radio" id="sex" name="sex" value="女" style="color: white">女
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
                            echo "注册成功！";
                            break;
                    }
                    ?>
                </div>
            </div>
            <div>
                <input type="submit" id="register" name="register" value="注册" class="loginButton m-left">
                <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
            </div>

            <div class="register">
                <a href="login.php" style="color: white">已有账号，去登录</a>
            </div>
        </form>
    </div>
</body>

</html>