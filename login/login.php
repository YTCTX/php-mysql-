<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>登入</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>
    <div id="bigBox">
        <h1>学生就业系统登录页面</h1>

        <form id="loginform" action="../deal/deal_login.php" method="post">
            <div class="inputBox">

                <div class="inputText">
                    <input type="text" id="name" name="username" placeholder="用户名" value="">
                </div>
                <div class="inputText">
                    <input type="password" id="password" name="password" placeholder="密码">
                </div>
                <div style="color: white;font-size: 12px">
                    <?php
                    $err = isset($_GET["err"]) ? $_GET["err"] : "";
                    switch ($err) {
                        case 1:
                            echo "用户名或密码错误！";
                            break;

                        case 2:
                            echo "用户名或密码不能为空！";
                            break;
                    } ?>
                </div>
                <div class="inputText1">
                    <input type="text" name="code" id="code" placeholder="验证码"> <img src="checks.php" width="70" height="20" id="img">

                </div>

                <br>
                <div class="register">
                    <a href="register.php" style="color:white">注册账号</a>
                </div>
                <div class="fgtpwd">
                    <a href="re_pwd.php" style="color:white">忘记密码</a>
                </div>
            </div>
            <div>
                <input type="submit" id="login" name="login" value="登录" class="loginButton m-left">
                <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
            </div>
    </div>
    </div>
    </form>
</body>

</html>