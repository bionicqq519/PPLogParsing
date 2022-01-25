<?php
require_once 'db.php';

//排空錯誤
if(empty($_GET['fn'])){
    die('fn is empty');
}
//連線資料庫
$conn = connnetDb();

$fn = $_GET['fn'];

//刪除指定資料
mysqli_query($conn, "DELETE FROM function_tb WHERE function_name='$fn'");
//排錯並返回頁面
if(mysqli_error($conn)){
    echo mysqli_error($conn);
}else{
    header("Location:allusers.php");
}