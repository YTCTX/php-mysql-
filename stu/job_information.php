<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/table.css">
    <title>招聘信息</title>
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
        <li><a href="stu_modify.php">修改个人信息</a></li>
        <li class="active"><a href="job_information.php">查看招聘信息</a></li>
        <li><a href="business_info.php">查看企业信息</a></li>
        <li><a href="../login/re_pwd.php">修改个人密码</a></li>
        <li><a href="../deal/deal_exit.php">登出</a></li>
    </ul>
    <div style="margin-left:20%; padding-top: 15px;">
        <h1 style="margin-left: 45%;">招聘信息</h1>
        <table style="margin-left: 20%;">

            <?php
            $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
            $sql_select = "SELECT * FROM zpinfo";
            $result = mysqli_query($conn, $sql_select);
            echo '<table style="margin-left:5%" class="table">
                <tr><th width="200">招聘企业</th>
                <th width="200">招聘岗位</th>
                <th width="200">工作需求</th>
                <th width="200">薪酬</th>
                <th width="200">招聘人数</th>
                <th width="200">还需人数</th>
                <th width="200">联系方式</th></tr>';
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr><td width="200" style="text-align:center;">' . $row['zpqy'] . '</td>';
                echo '<td width="200" style="text-align:center;">' . $row['zpgw'] . '</td>';
                echo '<td width="200" style="text-align:center;">' . $row['workxq'] . '</td>';
                echo '<td width="200" style="text-align:center;">' . $row['xc'] . '</td>';
                echo '<td width="200" style="text-align:center;">' . $row['neednum'] . '</td>';
                echo '<td width="200" style="text-align:center;">' . $row['leftnum'] . '</td>';
                echo '<td width="200" style="text-align:center;">' . $row['phone'] . '</td></tr>';
            }
            echo '</table>';

            ?>

    </div>


</body>

</html>