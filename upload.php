<?php
    require_once 'db.php';
?>
<html>
<head>
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
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
	<html>
		<a href="profiling.php">回到首頁</a><br><br>
	</html>
	<!-- 這裡是 HTML 語法的 主要資料區 -->
	<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	//[start] 接收檔案
    $fileName = "";
    $folder = "upload";

	if (empty($_FILES["file"]))	//if (isset($_FILES["file"]))
	{
		echo "Error: No data submit<br />";
        return;
	}
	else if ($_FILES["file"]["error"] > 0)
	{
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
        return;
	}
	else
	{
		$fileName = $_FILES["file"]["name"];
		$type = $_FILES["file"]["type"];
		$size = ($_FILES["file"]["size"] / 1024)." kb" ;
		$tmp_name =  $_FILES["file"]["tmp_name"] ;
		echo "Upload: " .$fileName . "<br />";
		echo "Type: " . $type . "<br />";
		echo "Size: " . $size. "<br />";
		echo "Stored in: " . $tmp_name."<br />";
		move_uploaded_file($tmp_name, $folder."/".$fileName);
		echo "success"."<br /><br />";
        //return;
	}
	//[end] 接收檔案

    function delFile($dirName){
        if(file_exists($dirName) && $handle=opendir($dirName)){
            while(false!==($item = readdir($handle))){
                if($item!= "." && $item != ".."){
                    if(file_exists($dirName.'/'.$item) && is_dir($dirName.'/'.$item)){
                        delFile($dirName.'/'.$item);
                    }else{
                        if(unlink($dirName.'/'.$item)){
                            return true;
                        }
                    }
                }
            }
            closedir( $handle);
        }
    }

	function parseStr($input_arr, $left, $right){
		$left_idx = strpos($input_arr, $left)+strlen($left);
		$right_idx = strpos($input_arr, $right, $left_idx);
		return substr($input_arr, $left_idx, ($right_idx-$left_idx));
	}

	//連線資料庫
	$conn = connnetDb();
	//查詢資料表中的所有資料,並按照id降序排列
	$result = mysqli_query($conn, "SELECT * FROM function_tb ORDER BY function_name DESC");	//"SELECT * FROM function_tb ORDER BY function_name DESC"
	//獲取資料表的資料條數
	$dataCount = mysqli_num_rows($result);
	//列印輸出所有資料
	//echo $dataCount;

	$array_function = array();
	for($i=0;$i<$dataCount;$i++){
		$result_arr = mysqli_fetch_assoc($result);
		$fn = $result_arr['function_name'];
		//print_r($result_arr);
		// echo $fn." ";
		$array_function[$fn] = array();
	}
	
	// $array_function = array("Convert_to_YV21" => array(),
	// 						"TNR" => array(),
	// 						"2ndPP" => array(),
	// 						"LVSharp" => array(),
	// 					    "Convert_from_YV21" => array(),
	// 					    "alPP_Instance_algoRun" => array());

	$file_path = $folder."/".$fileName;//"./alPP_log.txt";
	$file_arr = file($file_path);
	// echo gettype($file_arr);
	if(file_exists($file_path))
	{
		for($i=0;$i<count($file_arr);$i++)
		{
			// echo $file_arr[$i]."<br>";
			foreach($array_function as $func => $content)
			{
				if(strpos($file_arr[$i], $func))
				{
					$array_function[$func][] = floatval(parseStr($file_arr[$i], "= [", "]"));
					// $array_function[$key][] = 1.0;
					 //echo $file_arr[$i]."<br>";
					//echo gettype($content[0]);
				}
				//echo $func."<br>";
			}
		}
	}
	
	$calculation_all = array();

	foreach($array_function as $func => $content)
	{
		$total = 0.0;
		$count = count($content);
		$max_tmp = 0.0;
		$min_tmp = INF;
		// echo gettype($content)."<br>";
		for($i=0;$i<$count;$i++)
		{
			$total += $content[$i];
			if($content[$i]>$max_tmp)
			{
				$max_tmp = $content[$i];
			}
			if($content[$i]<$min_tmp)
			{
				$min_tmp = $content[$i];
			}
			// echo $func." ".$content[$i]."<br>";
		}
		if($count != 0)
		{
			$calculation_all[$func] = array($total/$count, $max_tmp, $min_tmp);
		}
	}

	// avg, max, min
	echo "<table>
			<tr>
				<th>function</th>
				<th>avg.</th>
				<th>max.</th>
				<th>min.</th>
			</tr>";
	foreach($calculation_all as $func => $content)
	{
		echo "<tr>";
		echo "<td>".$func."</td>";
		echo "<td>".$content[0]."</td>";
		echo "<td>".$content[1]."</td>";
		echo "<td>".$content[2]."</td>";
		echo "</tr>";
	}
	echo "</table><br>";

    // delete upload file
    delFile($folder);

	// printf save array.
	/*
	foreach($array_function as $func => $content)
	{
		// echo gettype($content)."<br>";
		for($i=0;$i<count($content);$i++)
		{
			echo $func." ".$content[$i]."<br>";
		}
	}
	*/
	//echo $array_function['Convert_to_YV21'][0];
	?>

	<!-- 這裏通常會放 footer 頁尾的資料 -->
	<!-- 這裏通常會放 footer 頁尾的資料 -->
	<!-- 這裏通常會放 footer 頁尾的資料 -->
</body>
</html>