<?php
function SendMailR(){
	$Email = $_POST['Mail'];
	$Name = $_POST['UserName'];
	$UID = $_POST['UserID'];
	$Code = $_POST['Code'];
	mb_internal_encoding("utf-8");
	$to="$Email";
	$subject=mb_encode_mimeheader("食在好季會員信箱認證通知","utf-8");
	$message="食在好季的會員{$Name} 您好 ，<br>歡迎你註冊食在好季網站，請點擊以下網址來驗證信箱<br />　http://localhost/good_season_good_eat/Login/EmailCheck.php?UserID={$UID}&Code={$Code}";
	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=utf-8\r\n";
	$headers.="From:".mb_encode_mimeheader("食在好季","utf-8")."<rahit91201@gmail.com>\r\n";
	mail($to,$subject,$message,$headers);
}
?>