<?php
    require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>所有使用者</title>
    <style>
        table{
            border-collapse: collapse;
        }
        th,td{
            border:1px solid #ccccff;
            padding: 5px;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
<a href="profiling.php">回到首頁</a><br><br>
<a href="adduser.html">新增</a>
<table>
    <tr>
        <th>function</th>
        <th>修改/刪除</th>
    </tr>
<?php
//連線資料庫
$conn = connnetDb();
//查詢資料表中的所有資料,並按照id降序排列
$result=mysqli_query($conn, "SELECT * FROM function_tb ORDER BY function_name DESC");
//獲取資料表的資料條數
$dataCount=mysqli_num_rows($result);
//列印輸出所有資料
//echo $dataCount;

for($i=0;$i<$dataCount;$i++){
    $result_arr=mysqli_fetch_assoc($result);
    $fn=$result_arr['function_name'];
    //print_r($result_arr);
    echo "<tr>
            <td>$fn</td>
            <td><a href='edituser.php?fn=$fn'>修改</a> <a href='deleteuser.php?fn=$fn'>刪除</a></td>
          </tr>";
}

?>
</table>

</body>
</html>
