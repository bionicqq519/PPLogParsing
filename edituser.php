<?php
require_once 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>修改資料</title>
</head>
<body>
    <?php
        if(!empty($_GET['fn'])){
            //連線mysql資料庫
            $conn = connnetDb();

            //查詢id
            $fn=$_GET['fn'];

            $result=mysqli_query($conn, "SELECT * FROM function_tb WHERE function_name='$fn'");
            if(mysqli_error($conn)){
                die('can not connect db');
            }
            //獲取結果陣列
            $result_arr=mysqli_fetch_assoc($result);
        }else{
            die('id not define');
        }
    ?>
    <form action="edituser_server.php" method="post">
        <label>function_name：</label><input type="text" name="fn_mod" value="<?php echo $result_arr['function_name']?>"><br>
        <label>step：</label><input type="text" name="step_mod" value="<?php echo $result_arr['step']?>"><br>
        <input type="submit" value="提交修改">

        <input type="hidden" name="fn" value="<?php echo $result_arr['function_name']?>">
        <input type="hidden" name="step" value="<?php echo $result_arr['step']?>">
</form>
</body>
</html>