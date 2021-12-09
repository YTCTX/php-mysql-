<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    <li><a href="main_tianjia.php">录入学生信息</a></li>
    <li><a href="main_user.php">用户信息管理</a></li>
    <li><a href="mian_YHtianjia.php">添加用户信息</a></li>
    <li><a href="../deal/deal_exit.php">登出</a></li>
  </ul>


  <div style="margin-left:50%">
    <?php
    $id = $_GET['id'];
    session_start();
    $_SESSION['id_user'] = $id;


    $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
    $sql_select = "SELECT * FROM users WHERE id = '$id'";
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret);

    $sql_select_users = "SELECT * FROM users WHERE id = '$id'";
    $ret_users = mysqli_query($conn, $sql_select_users);
    $row_users = mysqli_fetch_array($ret_users);

    ?>
  </div>
  <br>
  <form method="POST" action="../deal/deal_xiugai_user.php">
    <div style="margin-left:45%">
      <table cellpadding="20" style="text-align:right">
        <tr>
          <td>账户:</td>
          <td style="text-align:left" ;>
            <input type="text" name="id" style="height: 20px;" value="<?php echo $row['id']; ?>">
          </td>
        </tr>
        <tr>
          <td>密码:</td>
          <td style=" text-align:left" ;>
            <input type="text" name="pwd" style="height: 20px;" value="<?php echo $row['pwd']; ?>">
          </td>
        </tr>
        <tr>
          <td>性别:</td>
          <td style="text-align:left" ;>
            <input type="text" name="gender" style="height: 20px;" value="<?php echo $row['gender']; ?>">
          </td>
        </tr>
        <tr>
          <td>QQ:</td>
          <td style="text-align:left" ;>
            <input type="text" name="QQ" style="height: 20px;" value="<?php echo $row['QQ']; ?>">
          </td>
        </tr>
        <tr>
          <td>E-MAIL:</td>
          <td style="text-align:left" ;>
            <input type="text" name="Email" style="height: 20px;" value="<?php echo $row['Email']; ?>">
          </td>
        </tr>
        <tr>
          <td>电话:</td>
          <td style="text-align:left" ;>
            <input type="text" name="phone" style="height: 20px;" value="<?php echo $row['phone']; ?>">
          </td>
        </tr>
        <tr>
          <td>地址:</td>
          <td style="text-align:left" ;>
            <input type="text" name="address" style="height: 20px;" value="<?php echo $row['address']; ?>">
          </td>
        </tr>
        <tr>
          <td>用户类型:</td>
          <td style="text-align:left" ;>
            <select name='YHflag'>
              <option selected="selected">管理员</option>
              <option>学生</option>
            </select>
          </td>
        </tr>
    </div>
    <tr>
      <td><input type="submit" name="mmodufy" value="修改" style="height: 30px;width: 80px;"></td>
    </tr>

    </table>

  </form>
</body>

</html>