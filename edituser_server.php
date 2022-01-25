<?php
require_once 'db.php';
if(empty($_POST['fn_mod'])){
    die('fn_mod is empty');
}

$fn_mod=$_POST['fn_mod'];
$fn = $_POST['fn'];

//連線資料庫
$conn = connnetDb();

//修改指定資料
mysqli_query($conn, "UPDATE function_tb SET function_name='$fn_mod' WHERE function_name='$fn'");


//排錯並返回
if(mysqli_error($conn)){
    echo mysqli_error($conn);
}else{
    header("Location:allusers.php");
}