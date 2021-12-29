<html>
<head>
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
	<!-- 這裡是 HTML 語法的 header 頁首引用宣告區 -->
</head>
<body>

	<!-- 這裡是 HTML 語法的 主要資料區 -->
	<?php
	error_reporting(E_ALL);
	ini_set('display_errors', 1);

	//[start] 接收檔案
    $fileName = "";
    $folder = "upload";
	if ($_FILES["file"]["error"] > 0)
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


	$array_function = array("Convert_to_YV21" => array(),
							"TNR" => array(),
							"2ndPP" => array(),
							"LVSharp" => array(),
						    "Convert_from_YV21" => array(),
						    "alPP_Instance_algoRun" => array());

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
				// echo $func."<br>";
			}
		}
	}
	
	$avg_function = array();

	foreach($array_function as $func => $content)
	{
		$total = 0.0;
		$count = count($content);
		// echo gettype($content)."<br>";
		for($i=0;$i<$count;$i++)
		{
			$total += $content[$i];
			// echo $func." ".$content[$i]."<br>";
		}
		$avg_function[$func] = $total/$count;
	}

	foreach($avg_function as $func => $content)
	{
		echo $func." avg. = ".$content."<br>";
	}

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