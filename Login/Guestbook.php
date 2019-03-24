<?php require_once('Connections/gsgf.php'); 
require_once ('php/recaptchalib.php');
?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
$Gcode = mt_rand(0,1000000);//防重複
$_SESSION['Gcode'] = 1000001;
//====================打勾======================
// your secret key
$secret = "6LeSPzgUAAAAAMsowaWjVWfmWtiSx4lvcviHAidh";
 
// empty response
$response = '';
 
// check secret key
$reCaptcha = new ReCaptcha($secret); 
//====================打勾======================
?>

<?php
if (!function_exists("GetSQLValueString")) {
	function GetSQLValueString($theValue, $theType, 	$theDefinedValue = "", $theNotDefinedValue = "") {
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
	$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}


//======================打勾=========================

if(isset($_POST['g-recaptcha-response'])){
	$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {
	
//======================打勾=========================
	
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//====================防重複提交======================	
		if(isset($_POST['Gcode'])) {
			if($_POST['Gcode'] == $_SESSION['Gcode']){
				// 重複提交表單了
			}else{
				$_SESSION['Gcode'] =$_POST['Gcode']; 
				//存儲code
//====================防重複提交======================
		
		$RP=$_POST['Content'];
		$RP = str_ireplace("script>","禁止事項",$RP);
		$RP = str_ireplace("<?","禁止事項",$RP);
		$RP = str_ireplace("/*","禁止事項",$RP);
		$RP = str_ireplace("*/","禁止事項",$RP);
		$RP = str_ireplace("?>","禁止事項",$RP);
		$RP = str_ireplace("!--","禁止事項",$RP);
		$RP = str_ireplace("$","禁止事項",$RP);
		$RP = str_ireplace("%","禁止事項",$RP);
		$RP = str_ireplace("#","禁止事項",$RP);
		$RP = str_ireplace("--","禁止事項",$RP);
		$RP = str_ireplace("_session","禁止事項",$RP);
		$RP = str_ireplace("_cookie","禁止事項",$RP);
		$RP = str_ireplace("%23","禁止事項",$RP);
		$RP = str_ireplace("%2F","禁止事項",$RP);
		$RP = str_ireplace("%23","禁止事項",$RP);
		$insertSQL = sprintf("INSERT INTO guestbook (UserID, UserName, Content, GNumber) VALUES (%s, %s, %s, %s)",
		GetSQLValueString($_POST['UserID'], "text"),
		GetSQLValueString($_POST['UserName'], "text"),
	    GetSQLValueString(nl2br($RP), "text"),
		GetSQLValueString($_POST['GNumber'], "int"));

		mysql_select_db($database_gsgf, $gsgf);
		$Result1 = mysql_query($insertSQL, $gsgf) or die(mysql_error());
			
		$sql = "Select Count From `recipe` WHERE RID = '$RecipeNumber'";
		$result = mysql_query($sql, $gsgf) or die(mysql_error());
		$CountTmp=mysql_fetch_array($result);
		$GCount = $CountTmp[0]+1;
		$sql = "Update recipe set Count = {$GCount} WHERE RID = {$RecipeNumber}";
		$result = mysql_query($sql, $gsgf) or die(mysql_error());
				
			}
		}
	}
}

mysql_select_db($database_gsgf, $gsgf);
$query_Recordset1 = "SELECT * FROM guestbook where GNumber = '$RecipeNumber' order by ID desc";
$Recordset1 = mysql_query($query_Recordset1, $gsgf) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--===================JS==========================-->
<script type="text/javascript" src='https://www.google.com/recaptcha/api.js'></script>

<script src='js/CheckEnter.js'></script>
<!--===================JS==========================-->


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言板</title>
</head>

<body>


<?php 
if(empty($_SESSION['MM_Username'])){
	echo "請先登入";
} else {
	$UID = $_SESSION['MM_Username'];
	$sql = "Select UserName From `user` WHERE UserID = '$UID'";
	$result = mysql_query($sql, $gsgf) or die(mysql_error());
	$UN=mysql_fetch_array($result);
?>

<form id="form1" name="form1" method="POST" action="<?php echo $editFormAction; ?>">
<table width="750" border="0">
  <tr>
    <td width="100" align="center">
    <img src ="../img/pm/jj.png" width="80"><br>
      <?php echo $UN[0];?>
    </td>
    <td colspan = "3">
      <textarea name="Content" id="Content" cols='80' rows='3' placeholder = "
說點什麼吧!" onchange = 'CheckContents()'></textarea>
	  <input name="Gcode" type="hidden" value="<?php echo $Gcode; ?>"/> 
      <!-- 防重複送出 -->
	  <input name="UserID" id = "UserID" type="hidden" value="<?php echo $UID;?>" />
      <input name="UserName" id = "UserName" type="hidden" value="<?php echo $UN[0];?>" />
      <input name="GNumber" id = "GNumber" type="hidden" value="<?php echo $RecipeNumber; ?>" />
    </td>
  </tr>
  <tr><td>
  	<td colspan = "1">
    	<div class="g-recaptcha" data-sitekey="6LeSPzgUAAAAAHpIc4TKiPj33vUJlQiUfh1ByM8q"></div>
    </td>
    <td valign = "bottom">
        &nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="Enter" id="Enter" value="送出" />
      </div>
    </td>
    </td>
  </tr>
  <input type="hidden" name="MM_insert" value="form1" />

</table></form>
<?php
}
?>



<?php if ($totalRows_Recordset1 == 0) { // Show if recordset empty ?>
  目前沒有任何留言
  <?php } // Show if recordset empty ?>
<table width="1256" border="1">
  <tr>
    <td width="189">留言者</td>
    <td width="1051">內容</td>
  </tr>
  <?php do { ?>
    <tr>
      <td height="26">
      <img src ="../img/pm/jj.png" width="50"><br>
	  <?php echo $row_Recordset1['UserName']; ?></td>
      <td><?php echo $row_Recordset1['Content']; ?></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
<p>&nbsp;</p>
<p>

</p>
</body>
</html>
<?php 
	mysql_free_result($Recordset1);
?>
