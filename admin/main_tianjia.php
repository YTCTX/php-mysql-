<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Chrome">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <title>个人信息</title>
</head>

<body>
  <?php
  session_start();
  if ($_SESSION['name'] == null) {
    header("location:../login/login.php");
  }
  ?>
  <ul class="sidenav">
    <li>
      <h1><a class="active" href="#">首页</a></h1>
    </li>
    <li><a href="main_admin.php">学生信息管理</a></li>
    <li class="active"><a href="main_tianjia.php">录入学生信息</a></li>
    <li><a href="main_user.php">用户信息管理</a></li>
    <li><a href="mian_YHtianjia.php">添加用户信息</a></li>
    <li><a href="../deal/deal_exit.php">登出</a></li>
  </ul>
  <div style="margin-left:50%">
    <?php
    echo  "<input type='image' src='../images/moren.jpg' width='100px' height='100px' />";
    ?><br>
  </div>
  <div style="margin-left:52%">
    <a href="1.php">上传头像</a>
  </Div><br>
  <form method="POST" action="../deal/deal_tianjia.php">
    <div style="margin-left:40%">
      <table cellpadding="20" style="text-align:right">
        <tr>
          <td>学号:</td>
          <td style="text-align:left" ;>
            <input type="text" name="id" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>姓名:</td>
          <td style="text-align:left" ;>
            <input type="text" name="name" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>性别:</td>
          <td style="text-align:left" ;>
            <input type="text" name="gender" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>出生年月:</td>
          <td style="text-align:left" ;>
            <input type="text" name="cstime" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>籍贯:</td>
          <td style="text-align:left" ;>
            <input type="text" name="jg" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>专业编号:</td>
          <td style="text-align:left" ;>
            <input type="text" name="zybh" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>院系编号:</td>
          <td style="text-align:left" ;>
            <input type="text" name="yxbh" style="height: 20px;">
          </td>
        </tr>
        <tr>
          <td>就业标志:</td>
          <td style="text-align:left" ;>
            <select name='jyflag'>
              <option selected="selected">已就业</option>
              <option>未就业</option>
            </select>
          </td>
        </tr>
    </div>

    <tr>
      <td><input type="submit" name="mmodufy" value="添加" style="height: 30px;width: 80px;"></td>
    </tr>

    </table>

  </form>
</body>

</html>