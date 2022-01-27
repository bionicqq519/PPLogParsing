<html>
<head>
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
</head>
<body>

	<!-- 這裡是 HTML 語法的 主要資料區 -->
	<html>
		<a href="allusers.php">返回</a><br>
	</html>

    <?php
    require_once 'db.php';
    if(empty($_POST['fn_mod'])){
        die('fn_mod is empty');
    }                                   
    if(empty($_POST['step_mod'])){
        die('step_mod is empty');
    }
    if(!is_numeric($_POST['step_mod'])){
        die('type of "step" is Integer');
    }

    $fn_mod=$_POST['fn_mod'];
    $fn = $_POST['fn'];

    $step_mod=$_POST['step_mod'];
    // $step = $_POST['step'];

    //連線資料庫
    $conn = connnetDb();

    //修改指定資料
    mysqli_query($conn, "UPDATE function_tb SET function_name='$fn_mod', step='$step_mod' WHERE function_name='$fn'");


    //排錯並返回
    if(mysqli_error($conn)){
        echo mysqli_error($conn);
    }else{
        header("Location:allusers.php");
    }
    ?>
	<!-- 這裏通常會放 footer 頁尾的資料 -->
	<!-- 這裏通常會放 footer 頁尾的資料 -->
	<!-- 這裏通常會放 footer 頁尾的資料 -->
</body>
</html>