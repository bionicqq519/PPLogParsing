<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

define('MYSQL_HOST','localhost');
define('MYSQL_USER','root');
define('MYSQL_PW','');
function connnetDb(){
    //連線mysql資料庫
    $host = 'localhost:8889';
    $dbuser ='root';
    $dbpassword = 'root';
    $dbname = 'alpp_db';
    $conn = mysqli_connect($host,$dbuser,$dbpassword,$dbname);

    //$conn=mysql_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PW);
    //排除連線資料庫異常錯誤
    if(!$conn){
        echo "can not connect db";
        die('can not connect db');
    }
    // else
    // {
    //     echo "connect db success";
    // }
    //在mysql中選中myapp資料庫
    //mysql_select_db("alpp_db");
    return $conn;
}
?>