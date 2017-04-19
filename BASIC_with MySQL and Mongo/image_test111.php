
<?php
//檢查上傳檔案是否有錯誤
$target_dir = "../final/images/";
if ($_FILES["myfile"]["error"] == 0) {
	//檢查是否有上傳檔案
	if(!empty($_FILES["myfile"]["name"])) {
		//顯示上傳的檔案名稱
		echo "FileName:".$_FILES["myfile"]["name"]."<br>";
		//顯示上傳檔案的Content-Type
		echo "Content-Type:".$_FILES["myfile"]["type"]."<br>";
		//顯示檔案大小
		echo "FileSize:".$_FILES["myfile"]["size"]."<br>";
		echo "<hr>";
		//搬移上傳的檔案
		move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_dir .$_FILES["myfile"]["name"]);
	}
} else {
	//顯示錯誤代碼
	echo "Error Code: ".$_FILES["myfile"]["error"];
}

echo $_FILES["myfile"]["tmp_name"]."<BR>"

?>
<html>
<head>
<title>PostFile</title>
</head>
<body>
<form id="form1" name="form1" method="post" enctype="multipart/form-data" action="">
<input type="file" name="myfile" id="myfile" />
<input type="submit" name="submit" id="submit" value="submit" />
</form>
</body>
</html>