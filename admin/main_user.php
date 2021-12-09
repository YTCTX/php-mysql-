<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Chrome">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/table.css">
  <title>用户信息</title>
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
    <li><a href="main_tianjia.php">录入学生信息</a></li>
    <li class="active"><a href="main_user.php">用户信息管理</a></li>
    <li><a href="mian_YHtianjia.php">添加用户信息</a></li>
    <li><a href="../deal/deal_exit.php">登出</a></li>
  </ul>
  <h1 style="margin-left: 45%;">用户信息总览</h1>

  <h4 style="margin-left:70%;">查询条件:
    <form method="POST" action="main_user.php">
      <select name="query" style="margin-left:1%;height:30px;">
        <option selected="selected">账户</option>
        <option>邮箱</option>
      </select>
      <input type="text" name="query_zhi" style="margin-left:2%;height:30px;">
      <input type="submit" name="query1" value="查询" style="margin-left:2%;height:30px;">
    </form>
  </h4>
  <table style="margin-left: 20%;">

    <?php
    $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
    if (isset($_POST['query1'])) {
      if ($_POST['query'] == "账户")
        $cxtj = "id";
      else
        $cxtj = "Email";
      $cxz = $_POST['query_zhi'];
      $sql_select = "SELECT * FROM users where $cxtj='$cxz';";

      $result = mysqli_query($conn, $sql_select);

      echo '<form action="main_user_re.php" method="GET">';
      echo '<table style="margin-left:20%" class="table"><tr><th width="100">账户</th><th width="100">密码</th><th width="100">性别</th><th width="100">QQ</th><th width="100">E-mail</th><th width="100">电话</th><th width="100">地址</th><th width="100">用户类型</th><th width="100">操作</th>';

      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['root'] == 1)
          $root = "管理员";
        else
          $root = "学生";
        echo '<tr><td width="100" style="text-align:center;">' . $row['id'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['pwd'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['gender'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['QQ'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['Email'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['phone'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['address'] . '</td>';
        echo '<td width="100" style="text-align:center;">' .  $root . '</td>';
        echo "<td width='100' style='text-align:center;'><a onclick=\"return confirm('确定删除么')\" href=\"../deal/deal_shanchu_users.php?id={$row['id']}\">删除</a>
        <a href=\"main_user_re.php?id={$row['id']}\">修改</a></td></tr>";
      }
      echo '</table>';
      echo '</form>';
    } else {
      $sql_select = "SELECT * FROM users;";
      $result = mysqli_query($conn, $sql_select);
      echo '<form action="main_user_re.php" method="GET">';
      echo '<table style="margin-left:20%" class="table"><tr><th width="100">账户</th><th width="100">密码</th><th width="100">性别</th><th width="100">QQ</th><th width="100">E-mail</th><th width="100">电话</th><th width="100">地址</th><th width="100">用户类型</th><th width="100">操作</th>';

      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['root'] == 1)
          $root = "管理员";
        else
          $root = "学生";
        echo '<tr><td width="100" style="text-align:center;">' . $row['id'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['pwd'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['gender'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['QQ'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['Email'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['phone'] . '</td>';
        echo '<td width="100" style="text-align:center;">' . $row['address'] . '</td>';
        echo '<td width="100" style="text-align:center;">' .  $root  . '</td>';
        echo "<td width='100' style='text-align:center;'><a onclick=\"return confirm('确定删除么')\" href=\"../deal/deal_shanchu_users.php?id={$row['id']}\">删除</a>
      <a href=\"main_user_re.php?id={$row['id']}\">修改</a></td></tr>";
      }
      echo '</table>';
      echo '</form>';
    }
    ?>
  </table>

</body>

</html>