<html>
<head>
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
</head>
<body>

	<!-- 這裡是 HTML 語法的 主要資料區 -->
	<html>
		<a href="adduser.html">返回</a><br>
	</html>

    <?php
    require_once 'db.php';
    //首先進行非空排錯
    $fn=$_POST['function_name'];
    if(!isset($fn)){
        die('name is not define');
    }
    if(empty($fn)){
        die('function_name is empty');
    }

    $step=$_POST['step'];
    if(!isset($step)){
        die('name is not define');
    }
    // if(empty($step)){
    //     die('step is empty');
    // }
    if(!is_numeric($step)){
        die('type of "step" is Integer');
    }

    //連線資料庫
    $conn = connnetDb();

    //插入資料
    mysqli_query($conn, "INSERT INTO function_tb(function_name, step) VALUES ('$fn', $step)");
    //返回列表頁面
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
