<?php require_once('../Connections/gsgf.php'); 
//include('src/autoload.php');
require_once "php/recaptchalib.php";
?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
$code = mt_rand(0,1000000);


// your secret key
$secret = "6LeSPzgUAAAAAMsowaWjVWfmWtiSx4lvcviHAidh";
 
// empty response
$response = '';
 
// check secret key
$reCaptcha = new ReCaptcha($secret); 
?>

<?php 
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}


if (isset($_SESSION['MM_Username'])) {
	$UID = $_SESSION['MM_Username'];
} else{
	echo "<SCRIPT Language=javascript>"; 
	echo "window.alert('請先登入')"; 
	echo "</SCRIPT>"; 
	echo "<script language=\"javascript\">"; 
	echo "location.href='login.php'"; 
	echo "</script>"; 
	return; 
}
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

/*======================打勾=========================

if(isset($_POST['g-recaptcha-response'])){
	$response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {
	
//======================打勾=========================*/

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {	
//================防重複送出=====================		
		if(isset($_POST['code'])) {
			if($_POST['code'] == $_SESSION['code']){
				// 重複提交表單了
			}else{
				$_SESSION['code'] =$_POST['code']; 
				//存儲code	
	
//================防重複送出=====================	
  $updateSQL = sprintf("UPDATE `user` SET UserName=%s, BDay=%s, Sex=%s, Weight=%s, Height=%s, Liver=%s, Kidney=%s, Stomach=%s, Lung=%s, Heart=%s, Allergy=%s, Gout=%s, Insomnia=%s, Fat=%s, Artistic=%s, Educative=%s, Outdoor=%s, Movement=%s, Family=%s WHERE UserID=%s",
                       GetSQLValueString($_POST['UserName'], "text"),
                       GetSQLValueString($_POST['BDay'], "date"),
                       GetSQLValueString($_POST['Sex'], "text"),
                       GetSQLValueString($_POST['Weight'], "text"),
                       GetSQLValueString($_POST['Height'], "text"),
                       GetSQLValueString(isset($_POST['Liver']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Kidney']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Stomach']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Lung']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Heart']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Allergy']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Gout']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Insomnia']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Fat']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Artistic']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Educative']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Outdoor']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Movement']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString(isset($_POST['Family']) ? "true" : "", "defined","'Y'","'N'"),
                       GetSQLValueString($_POST['UserID'], "text"));

  mysql_select_db($database_gsgf, $gsgf);
  $Result1 = mysql_query($updateSQL, $gsgf) or die(mysql_error());

  $updateGoTo = "LoginOK.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  	echo "<SCRIPT Language=javascript>"; 
    echo "window.alert('修改成功')"; 
    echo "</SCRIPT>"; 
    echo "<script language='javascript'>"; 
   	echo "location.href='LoginOK.php'"; 
	echo "</script>"; 
   	return; 
   	exit;
}
//		}
	}
}


mysql_select_db($database_gsgf, $gsgf);
$query_Recordset1 = "SELECT * FROM `user` where UserID = '$UID'";
// 
$Recordset1 = mysql_query($query_Recordset1, $gsgf) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--========================js===============-->

<script src='https://www.google.com/recaptcha/api.js'></script>

<script type = "text/javascript" src = "js/CheckEnter.js"></script>


<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<title>修改個人資料</title>
</head>

<body>
修改資料
<form action="<?php echo $editFormAction; ?>" method="POST" id="form1" name="form1">
<table border="1" align="center" cellspacing="5" cellpadding="5" bgcolor="#FFFFFF">


	<tr>
		<td ROWSPAN="1"><font color="red">*</font>用戶名稱</td>
		<td ROWSPAN="1" >
        <!--隱藏表單-->
        <input name="UserID" id = "UserID" type="hidden" value="<?php echo $UID?>" />
        <input name="code" type="hidden" value="<?php echo $code; ?>"/> 
        <!--隱藏表單-->
        
        <input type="text" id="UserName" name="UserName" size="10" maxlength="20" placeholder="請輸入您的暱稱" value = "<?php echo $row_Recordset1['UserName']; ?>" required/><font color="red" size="2">
	  您的暱稱</font>
    </tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>生日</td>
		<td ROWSPAN="1" ><input name="BDay" type="date" id="BDay" lang="en" value = "<?php echo $row_Recordset1['BDay']; ?>" required/><font color="red" size="2">
		請正確填寫，方便日後更改&找回密碼
         </font>
        </td>
	</tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>性別</td>
		<td ROWSPAN="1" >&nbsp;&nbsp&nbsp;&nbsp<input type="radio" id = "Sex" name="Sex" value="F"
     	<?php 
		if($row_Recordset1['Sex'] == 'F') {
			echo "checked";
		}
		?>
        
        /> 女&nbsp;&nbsp&nbsp;&nbsp<input type="radio" id = "Sex" name="Sex" value="M"
        <?php 
		if($row_Recordset1['Sex'] == 'M') {
			echo "checked";
		}
		?>
        /> 男  <!--value它的意思-->
 <br />
 		</td>
	</tr>
	<tr>
		<td ROWSPAN="1">體重</td>
		<td ROWSPAN="1" ><input name="Weight" type="text" id="Weight" lang="en" onchange="CheckWeight()" size="20" maxlength="3" value = "<?php echo $row_Recordset1['Weight']; ?>"/>
	</tr>
	<tr>
  		<td>身高</td>
  		<td ><input name="Height" type="text" id="Height" lang="en" onchange="CheckHeight()" size="20" maxlength="3" value = "<?php echo $row_Recordset1['Height']; ?>"/>    
        </td>
	</tr>
	<tr>
		<td ROWSPAN="1">欲改善</td>
		<td>
        	<input type="checkbox" id = "Health1" name="Health1"/> 暫時不需要            
			<input type="checkbox" id = "Liver" name="Liver" <?php 
		if($row_Recordset1['Liver'] == 'Y') {
			echo "checked";
		}
		?>/>肝
            
			<input type="checkbox" id = "Kidney" name="Kidney" <?php 
		if($row_Recordset1['Kidney'] == 'Y') {
			echo "checked";
		}
		?>/> 腎 

			<input type="checkbox" id = "Stomach" name="Stomach" <?php 
		if($row_Recordset1['Stomach'] == 'Y') {
			echo "checked";
		}
		?>/> 胃
 
			<input type="checkbox" id = "Lung" name="Lung" <?php 
		if($row_Recordset1['Lung'] == 'Y') {
			echo "checked";
		}
		?>/> 肺
            
            <input type="checkbox" id = "Heart" name="Heart" <?php 
		if($row_Recordset1['Heart'] == 'Y') {
			echo "checked";
		}
		?>/> 心




		</td>
	</tr>
    <tr>
    	<td>
        體質
    	</td>
    	<td>
        <input type="checkbox" id = "Health2" name="Health2"/> 很健康
    	<input type="checkbox" id = "Allergy" name="Allergy"<?php 
		if($row_Recordset1['Allergy'] == 'Y') {
			echo "checked";
		}
		?>/> 過敏
        <input type="checkbox" id = "Gout" name="Gout"
		<?php 
		if($row_Recordset1['Gout'] == 'Y') {
			echo "checked";
		}
		?>/> 痛風
        <input type="checkbox" id = "Insomnia" name="Insomnia"
        <?php 
		if($row_Recordset1['Insomnia'] == 'Y') {
			echo "checked";
		}
		?>
        /> 失眠
        <input type="checkbox" id = "Fat" name="Fat"
        <?php 
		if($row_Recordset1['Fat'] == 'Y') {
			echo "checked";
		}
		?>
        /> 肥胖
        </td>
	</tr>
    <tr>
    	<td>
        偏好活動
    	</td>
    	<td>
        <input type="checkbox" id = "NoThankYou" name="NoThankYou"/> 暫時不需要
        <input type="checkbox" id = "Artistic" name="Artistic"
        <?php 
		if($row_Recordset1['Artistic'] == 'Y') {
			echo "checked";
		}
		?>
        /> 藝文活動
        <input type="checkbox" id = "Educative" name="Educative"
        <?php 
		if($row_Recordset1['Educative'] == 'Y') {
			echo "checked";
		}
		?>
        /> 教育活動
        <input type="checkbox" id = "Outdoor" name="Outdoor"
        <?php 
		if($row_Recordset1['Outdoor'] == 'Y') {
			echo "checked";
		}
		?>
        /> 
        戶外遊憩<br>	
        <input type="checkbox" id = "Movement" name="Movement"
        <?php 
		if($row_Recordset1['Movement'] == 'Y') {
			echo "checked";
		}
		?>        
        /> 
        運動競技	
        <input type="checkbox" id = "Family" name="Family"
        <?php 
		if($row_Recordset1['Family'] == 'Y') {
			echo "checked";
		}
		?>        
        /> 親子休閒
   	  </td>
	</tr>
    <tr>
    	<td colspan="2" ROWSPAN="1">
        	<center>
            
            <!--<div class="g-recaptcha" data-sitekey="6LeSPzgUAAAAAHpIc4TKiPj33vUJlQiUfh1ByM8q"></div>==================打勾停用中==============-->
            <center><input type="submit" name="ok" id="ok" value="送出" />
    	</center>
        </td>
    </tr>

	<input type="hidden" name="MM_update" value="form1" />

</table>
</form>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
