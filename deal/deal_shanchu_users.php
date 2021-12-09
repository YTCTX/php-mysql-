<?

$id = $_GET['id'];

$conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
mysqli_set_charset($conn, 'utf8');
$stmt = mysqli_prepare($conn, 'delete from `users` where id=?');
mysqli_stmt_bind_param($stmt, 's', $id);
mysqli_stmt_execute($stmt);


mysqli_close($conn);
header("Location:../admin/main_user.php");
