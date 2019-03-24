<?php 
require_once('SendMail.php');
require_once('../../Connections/gsgf.php');
if (isset($_POST['UserID'])&&isset($_POST['Mail'])&&isset($_POST['BDay'])) {
$UID = $_POST['UserID'];
$Email = $_POST['Mail'];
$BDay = $_POST['BDay'];

$sql = "SELECT Mail FROM `user` WHERE UserID = '$UID'";
$result = mysql_query($sql, $gsgf) or die(mysql_error());
$row = mysql_fetch_array($result);
$SEmail = $row[0];

$sql = "SELECT BDay FROM `user` WHERE UserID = '$UID'";
$result = mysql_query($sql, $gsgf) or die(mysql_error());
$row = mysql_fetch_array($result);
$SBDay = $row[0];

$sql = "SELECT UserName FROM `user` WHERE UserID = '$UID'";
$result = mysql_query($sql, $gsgf) or die(mysql_error());
$row = mysql_fetch_array($result);
$SName = $row[0];

$sql = "SELECT Psd FROM `user` WHERE UserID = '$UID'";
$result = mysql_query($sql, $gsgf) or die(mysql_error());
$row = mysql_fetch_array($result);
$SPsd = $row[0];

if($Email == $SEmail && $BDay == $SBDay) {

	mb_internal_encoding("utf-8");
	$to="{$SEmail}";
	$subject=mb_encode_mimeheader("食在好季","utf-8");
	$message="食在好季的會員{$SName} 您好，
	
	您的密碼是 {$SPsd}";
	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=utf-8\r\n";
	$headers.="From:".mb_encode_mimeheader("食在好季","utf-8")."<rahit91201@gmail.com>\r\n";
	mail($to,$subject,$message,$headers);
	
	echo "<SCRIPT Language=javascript>"; 
    echo "window.alert('已將密碼信件寄出')"; 
    echo "</SCRIPT>"; 
    echo "<script language=\"javascript\">"; 
    echo "location.href='../Login.php'"; 
    echo "</script>"; 
    return; 
    exit;
//SendMailR();


} else {
	echo "<SCRIPT Language=javascript>"; 
    echo "window.alert('帳號與Email或生日不正確')"; 
    echo "</SCRIPT>"; 
    echo "<script language=\"javascript\">"; 
    echo "location.href='../ForgetPsd.php'"; 
    echo "</script>"; 
    return; 
    exit;


}
} 

?>
