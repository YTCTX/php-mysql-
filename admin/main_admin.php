<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Chrome">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/table.css">
  <title>个人信息</title>
  <?php
  //分页的函数
  function news($pageNum = 1, $pageSize = 3)
  {
    $array = array();
    $coon = mysqli_connect("localhost", "dubang", "dubang", "test_php");
    mysqli_set_charset($coon, "utf8");
    // limit为约束显示多少条信息，后面有两个参数，第一个为从第几个开始，第二个为长度
    $rs = "select * from stuinfo limit " . (($pageNum - 1) * $pageSize) . "," . $pageSize;
    $r = mysqli_query($coon, $rs);
    while ($obj = mysqli_fetch_object($r)) {
      $array[] = $obj;
    }
    mysqli_close($coon);
    return $array;
  }

  //显示总页数的函数
  function allNews()
  {
    $coon = mysqli_connect("localhost", "dubang", "dubang", "test_php");
    mysqli_set_charset($coon, "utf8");
    $rs = "select count(*) num from stuinfo"; //可以显示出总页数
    $r = mysqli_query($coon, $rs);
    $obj = mysqli_fetch_object($r);
    mysqli_close($coon);
    return $obj->num;
  }

  @$allNum = allNews();
  @$pageSize = 3; //约定没页显示几条信息
  @$pageNum = empty($_GET["pageNum"]) ? 1 : $_GET["pageNum"];
  @$endPage = ceil($allNum / $pageSize); //总页数
  @$array = news($pageNum, $pageSize);
  ?>

</head>

<body>

  <ul class="sidenav">
    <li>
      <h1><a class="active" href="#">首页</a></h1>
    </li>
    <li class="active"><a href="main_admin.php">学生信息管理</a></li>
    <li><a href="main_tianjia.php">录入学生信息</a></li>
    <li><a href="main_user.php">用户信息管理</a></li>
    <li><a href="mian_YHtianjia.php">添加用户信息</a></li>
    <li><a href="../deal/deal_exit.php">登出</a></li>
  </ul>
  <h1 style="margin-left: 45%;">学生信息总览</h1>

  <h4 style="margin-left:70%;">查询条件:
    <form method="POST" action="main_admin.php">
      <select name="query" style="margin-left:1%;height:30px;">
        <option selected="selected">学号</option>
        <option>姓名</option>
      </select>
      <input type="text" name="query_name" style="margin-left:2%;height:30px;">
      <input type="submit" name="query1" value="查询" style="margin-left:2%;height:30px;">
    </form>
  </h4>
  <table style="margin-left: 20%;">

    <?php
    session_start();
    if ($_SESSION['name'] != null) {
      $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
      if (isset($_POST['query1'])) {
        if ($_POST['query'] == "学号") {
          $cxtj = "id";
        } else {
          $cxtj = "name";
        }
        $cxz = $_POST['query_name'];
        $sql_select = "SELECT * FROM stuinfo where $cxtj='$cxz';";
        $result = mysqli_query($conn, $sql_select);


        echo '<form action="main_xiugai.php" method="GET">';
        echo '<table style="margin-left:20%" class="table">
      <tr><th width="10">学号</th>
      <th width="10">姓名</th>
      <th width="10">性别</th>
      <th width="10">出生年月</th>
      <th width="10">籍贯</th>
      <th width="10">专业编号</th>
      <th width="10">院系编号</th>
      <th width="10">就业标志</th>
      <th width="10">操作</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
          echo '<tr><td width="10" style="text-align:center;">' . $row['id'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['name'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['gender'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['cstime'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['jg'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['zybh'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['yxbh'] . '</td>';
          echo '<td width="10" style="text-align:center;">' . $row['jyflag'] . '</td>';
          echo "<td width='10' style='text-align:center;'><a onclick=\"return confirm('确定删除么')\" href=\"../deal/deal_shanchu.php?id={$row['id']}\">删除</a>
      <a href=\"main_xiugai.php?id={$row['id']}\">修改</a></td></tr>";
        }
        echo '</table>';
        echo '</form>';
      } else {
        $sql_select = "SELECT * FROM stuinfo";
        $result = mysqli_query($conn, $sql_select);
        echo '<form action="main_xiugai.php" method="GET">';
        echo '<table style="margin-left:20%" class="table">
      <tr><th width="10">学号</th>
      <th width="10">姓名</th>
      <th width="10">性别</th>
      <th width="10">出生年月</th>
      <th width="10">籍贯</th>
      <th width="10">专业编号</th>
      <th width="10">院系编号</th>
      <th width="10">就业标志</th>
      <th width="10">操作</th></tr>';
        // while ($row = mysqli_fetch_assoc($result)) {
        foreach ($array as $key => $values) {
          echo '<tr><td width="10" style="text-align:center;">' . $values->id . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->name . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->gender . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->cstime . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->jg . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->zybh . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->yxbh . '</td>';
          echo '<td width="10" style="text-align:center;">' . $values->jyflag . '</td>';
          echo "<td width='10' style='text-align:center;'><a onclick=\"return confirm('确定删除么')\" href=\"../deal/deal_shanchu.php?id={$values->id}\">删除</a>
      <a href=\"main_xiugai.php?id={$values->id}\">修改</a></td></tr>";
        }
        echo '</table>';

        echo '</form>';
      }
    } else {
      header("location:../login/login.php");
    }
    ?>
    <a href="?pageNum=1" style="margin-left: 60%;">首页</a>
    <a href="?pageNum=<?php echo $pageNum == 1 ? 1 : ($pageNum - 1) ?>">上一页</a>
    <a href="?pageNum=<?php echo $pageNum == $endPage ? $endPage : ($pageNum + 1) ?>">下一页</a>
    <a href="?pageNum=<?php echo $endPage ?>">尾页</a><br>
    }
  </table>
</body>

< /html>