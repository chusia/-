<?php require_once('../Connections/gsgf.php'); ?>
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
$query_Recordset1 = "SELECT * FROM `user`";
$Recordset1 = mysql_query($query_Recordset1, $gsgf) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}
//if(isset($_SESSION['is_login'])&&$_SESSION['is_login'] == true);
//	header('Location: loginOK.php');

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['UserID'])) {
	$loginUsername=$_POST['UserID'];
	$RP=$_POST['Psd'];
	$RP = str_ireplace("script>","禁止事項",$RP);
	$RP = str_ireplace("<?","禁止事項",$RP);
	$RP = str_ireplace("/*","禁止事項",$RP);
	$RP = str_ireplace("?>","禁止事項",$RP);
	$RP = str_ireplace("!--","禁止事項",$RP);
	$RP = str_ireplace("$","禁止事項",$RP);
	$RP = str_ireplace("~","禁止事項",$RP);
	$RP = str_ireplace("%","禁止事項",$RP);
	$RP = str_ireplace("&","禁止事項",$RP);
	$RP = str_ireplace("#","禁止事項",$RP);
	$RP = str_ireplace("_session","禁止事項",$RP);
	$RP = str_ireplace("_cookie","禁止事項",$RP);
	$RP = str_ireplace("'","禁止事項",$RP);
	$RP = str_ireplace("%23","禁止事項",$RP);
	$RP = str_ireplace("%2F","禁止事項",$RP);
	$RP = str_ireplace("%23","禁止事項",$RP);
	$password=$RP;
	$MM_fldUserAuthorization = "";
	$MM_redirectLoginSuccess = "loginOK.php";
	$MM_redirectLoginFailed = "register_wrong1.php";
	$MM_redirecttoReferrer = false;
	mysql_select_db($database_gsgf, $gsgf);
  
	$LoginRS__query=sprintf("SELECT UserID, Psd FROM `user` WHERE UserID=%s AND Psd=%s",
	GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
	$LoginRS = mysql_query($LoginRS__query, $gsgf) or die(mysql_error());
	$loginFoundUser = mysql_num_rows($LoginRS);
	if ($loginFoundUser) {
		$loginStrGroup = "";
    
		if (PHP_VERSION >= 5.1) {
			session_regenerate_id(true);
		} 
		else {
			session_regenerate_id();
		}
		//宣告兩個session並分配
		$_SESSION['MM_Username'] = $loginUsername;
		$_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    	if (isset($_SESSION['PrevUrl']) && false) {
			$MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
		}
		header("Location: " . $MM_redirectLoginSuccess );
	} else {
		echo "<SCRIPT Language=javascript>"; 
		echo "window.alert('帳號或密碼錯誤')"; 
		echo "</SCRIPT>"; 
		echo "<script language=\"javascript\">"; 
		echo "location.href='login.php'"; 
		echo "</script>"; 
		return; 
	}
}
?>
<?php
mysql_free_result($Recordset1);
?>
