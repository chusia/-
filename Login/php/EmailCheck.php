<?php 
require_once('../../Connections/gsgf.php');
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
mysql_select_db($database_gsgf, $gsgf);
$UID = $_GET['UserID'];
$C = $_GET['Code'];
$query_Recordset1 = "SELECT * FROM `user` where UserID = '$UID'";
$Recordset1 = mysql_query($query_Recordset1, $gsgf) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<p>
<?php
//取網址的id跟code
//session_start();
//require("../Connections/gsgf.php");
$UID = $_GET['UserID'];
$C = $_GET['Code'];

//$sql = "SELECT Code FROM user where UserID = '$Code'";
//echo $row["Code"];
?>

<?php
$C2 = $row_Recordset1['Code'];

//驗證id及code
if ($C = $C2){
	$sql = "UPDATE `user` SET `EmailC` = 'Y' WHERE `UserID` = '$UID'";
	mysql_query($sql, $gsgf) or die(mysql_error());
	echo "<SCRIPT Language=javascript>"; 
    echo "window.alert('驗證成功')"; 
    echo "</SCRIPT>"; 
    echo "<script language=\"javascript\">"; 
    echo "location.href='../Login.php'"; 
    echo "</script>"; 
    return; 
    exit;
} else {
	echo "<SCRIPT Language=javascript>"; 
    echo "window.alert('錯誤，請勿改動網址')"; 
    echo "</SCRIPT>"; 
    echo "<script language=\"javascript\">"; 
    echo "location.href='../Login.php'"; 
    echo "</script>"; 
    return; 
    exit;
}
	




//上傳y到驗證成功資料欄
//mysqli_free_result($result); 
//mysqli_close($link);
?>

</p>
<p>&nbsp;</p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>