<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" 
<title>無標題文件</title>
</head>
<body>


<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form action="upload.php" method="post" enctype="multipart/form-data">
檔案名稱:<input type="file" name="file" id="file" /><br />
<input type="submit" name="submit" value="上傳檔案" />
</form>

<?php
	$FileName = "1db70833c29ad097e586a98da7ff78b1.JPG";
if (isset($_FILES["file"]["name"])) {
	if ($_FILES["file"]["error"] > 0){
		echo "Error: " . $_FILES["file"]["error"];
	}else{
		echo "檔案名稱: " . $_FILES["file"]["name"]."<br/>";
		echo "檔案類型: " . $_FILES["file"]["type"]."<br/>";
		echo "檔案大小: " . ($_FILES["file"]["size"] / 1024)." Kb<br />";
	
		if (file_exists("upload/" . $_FILES["file"]["name"])){
			echo "檔案已經存在，請勿重覆上傳相同檔案";
		}else{	
			move_uploaded_file($_FILES["file"]["tmp_name"],"Upload/".$_FILES["file"]["name"]);
			$FileName = $_FILES["file"]["name"];
			echo $FileName;
		}
	}
}
?>
	<img src = "upload/<?php echo $FileName; ?>" />
</body>
</html>