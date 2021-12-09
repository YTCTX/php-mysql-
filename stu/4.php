<?php
session_start();
$id = $_SESSION["name"]; // $_GET['id']; 为简洁,直接将id写上了,正常应该是通过用户填入的id获取的
$dsn = 'mysql:dbname=test_php;host=localhost';
$pdo = new PDO($dsn, 'dubang', 'dubang');
$query = "select bin_data,filetype from stuimage where id='$id';";
$result = $pdo->query($query);
$result = $result->fetchAll(2);
//    var_dump($result);
$data = $result[0]['bin_data'];
$type = $result[0]['filetype'];
Header("Content-type: $type");
echo $data;
