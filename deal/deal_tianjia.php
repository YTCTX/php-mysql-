<?
$id = $_POST['id'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$cstime = $_POST['cstime'];
$jg = $_POST['jg'];
$zybh = $_POST['zybh'];
$yxbh = $_POST['yxbh'];
$jyflag = $_POST['jyflag'];



echo $id;
echo $name;
echo $gender;
echo $cstime;
echo $jg;
echo $zybh;
echo $yxbh;
echo $jyflag;


$conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
mysqli_set_charset($conn, 'utf8');
$stmt = mysqli_prepare($conn, 'insert into `stuinfo` values(?,?,?,?,?,?,?,?)');
mysqli_stmt_bind_param($stmt, 'ssssssss', $id, $name, $gender, $cstime, $jg, $zybh, $yxbh, $jyflag);
mysqli_stmt_execute($stmt);
mysqli_close($conn);
header("location:../admin/main_admin.php");
