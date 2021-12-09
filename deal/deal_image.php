<?php
if (isset($_POST['submit'])) {

    $id = $_POST['id'];
    $form_data_size = $_FILES['form_data']['size'];
    $form_data_type = $_FILES['form_data']['type'];
    $form_data = $_FILES['form_data']['tmp_name'];

    $dsn = 'mysql:dbname=test_php;host=localhost';
    $pdo = new PDO($dsn, 'dubang', 'dubang');
    $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));

    $conn = mysqli_connect('localhost', 'dubang', 'dubang', 'test_php');
    mysqli_set_charset($conn, 'utf8');
    $sql_select = "SELECT * FROM stuimage WHERE id = '$id'";
    $rows = mysqli_query($conn, $sql_select);
    if (mysqli_num_rows($rows) >= 1) {
        $sql = "update stuimage set bin_data = '$data',filesize ='$form_data_size',filetype='$form_data_type' where id='$id';";
        mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("location:../stu/stu_stuinfo.php");
    } else {
        $dsn = 'mysql:dbname=test_php;host=localhost';
        $pdo = new PDO($dsn, 'dubang', 'dubang');
        $data = addslashes(fread(fopen($form_data, "r"), filesize($form_data)));
        $result = $pdo->query("INSERT INTO stuimage (id,bin_data,filesize,filetype)
                        VALUES ('$id','$data','$form_data_size','$form_data_type')");
        header("location:../stu/stu_stuinfo.php");
    }
}
