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
      <h1><a class="active" href="#home">首页</a></h1>
    </li>
    <li><a href="stu_stuinfo.php">查看个人信息</a></li>
    <li class="active"><a href="stu_modify.php">修改个人信息</a></li>
    <li><a href="job_information.php">查看招聘信息</a></li>
    <li><a href="business_info.php">查看企业信息</a></li>
    <li><a href="../login/re_pwd.php">修改个人密码</a></li>
    <li><a href="../deal/deal_exit.php">登出</a></li>
  </ul>


  <div style="margin-left:50%">
    <?php
    session_start();
    $stuid = $_SESSION["name"];
    echo "<IMG SRC=\"4.php?\" width='100px' height='100px'>";
    // echo  "<input type='image' src='../images/" .  $stuid . ".jpg' width='100px' height='100px' />";
    echo '<br>';
    $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
    $sql_select = "SELECT * FROM stuinfo WHERE id = '$stuid'";
    $ret = mysqli_query($conn, $sql_select);
    $row = mysqli_fetch_array($ret);

    ?>
  </div>
  <div style="margin-left:52%">
  </Div><br>
  <form method="POST" action="../deal/deal_modify_stuinfo.php">
    <div style="margin-left:45%">
      <table cellpadding="20" style="text-align:right">
        <tr>
          <td style="text-align:left" ;>
            <a href="1.php">修改头像</a>
          </td>
        </tr>
        <div style="margin-left:45%">
          <table cellpadding="20" style="text-align:right">
            <tr>
              <td>学号:</td>
              <td style="text-align:left" ;>
                <?php echo $row['id']; ?>
              </td>
            </tr>
            <tr>
              <td>姓名:</td>
              <td style="text-align:left" ;>
                <input type="text" name="name" style="height: 20px;" value="<?php echo $row['name']; ?>">
              </td>
            </tr>
            <tr>
              <td>性别:</td>
              <td style="text-align:left" ;>
                <input type="text" name="gender" style="height: 20px;" value="<?php echo $row['gender']; ?>">
              </td>
            </tr>
            <tr>
              <td>出生年月:</td>
              <td style="text-align:left" ;>
                <input type="text" name="cstime" style="height: 20px;" value="<?php echo $row['cstime']; ?>">
              </td>
            </tr>
            <tr>
              <td>籍贯:</td>
              <td style="text-align:left" ;>
                <input type="text" name="jg" style="height: 20px;" value="<?php echo $row['jg']; ?>">
              </td>
            </tr>
            <tr>
              <td>专业编号:</td>
              <td style="text-align:left" ;>
                <input type="text" name="zybh" style="height: 20px;" value="<?php echo $row['zybh']; ?>">
              </td>
            </tr>
            <tr>
              <td>院系编号:</td>
              <td style="text-align:left" ;>
                <input type="text" name="yxbh" style="height: 20px;" value="<?php echo $row['yxbh']; ?>">
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
          <td><input type="submit" name="mmodufy" value="修改" style="height: 30px;width: 80px;"></td>
        </tr>

      </table>

  </form>
</body>

</html>