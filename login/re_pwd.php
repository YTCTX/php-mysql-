<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/re_pwd.css">
    <title>忘记密码</title>
</head>

<body>
    <div id="bigBox">



        <form action="../deal/deal_repwd.php" method="post">
            <div class="inputBox">
                <div class="inputText">
                    <input type="text" id="id_name" name="username" required="required" placeholder="用户名">
                </div>
                <div class="inputText">
                    <input type="text" id="id_email" name="Email" required="required" placeholder="邮箱">
                </div>
                <div class="inputText">
                    <input type="password" id="password" name="password" required="required" placeholder="新密码">
                </div>
                <div class="inputText">
                    <input type="password" id="password1" name="password1" required="required" placeholder="再次输入新密码">
                </div>
                <div>
                    <input type="submit" id="login" name="login" value="确定" class="loginButton m-left">
                    <input type="reset" id="reset" name="reset" value="重置" class="loginButton">
                </div>
            </div>
</body>

</html>