<?php
require_once 'db.php';
//首先進行非空排錯
if(!isset($_POST['function_name'])){
    die('name is not define');
}
$fn=$_POST['function_name'];
if(empty($fn)){
    die('function_name is empty');
}
//連線資料庫
$conn = connnetDb();

//插入資料
mysqli_query($conn, "INSERT INTO function_tb(function_name) VALUES ('$fn')");
//返回列表頁面
if(mysqli_error($conn)){
    echo mysqli_error($conn);
}else{
    header("Location:allusers.php");
}