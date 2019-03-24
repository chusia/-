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

// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
  //================================
	$PEmail = $_POST['Mail']; 
  	$sql = "SELECT mail FROM `user` where mail LIKE '$PEmail'";
	$result = mysql_query($sql, $gsgf) or die(mysql_error());
	$GEmail=mysql_fetch_array($result);
	if ($GEmail[0] == $PEmail){
		echo "<SCRIPT Language=javascript>"; 
    	echo "window.alert('Email已被註冊')"; 
	    echo "</SCRIPT>"; 
    	echo "<script language='javascript'>"; 
    	echo "location.href='register.php'"; 
	    echo "</script>"; 
    	return; 
    	exit;
	} else {
  //================================
  $MM_dupKeyRedirect="Register.php";
  $loginUsername = $_POST['UserID'];
  $LoginRS__query = sprintf("SELECT UserID FROM `user` WHERE UserID=%s", GetSQLValueString($loginUsername, "text"));
  mysql_select_db($database_gsgf, $gsgf);
  $LoginRS=mysql_query($LoginRS__query, $gsgf) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
    echo "<SCRIPT Language=javascript>"; 
    echo "window.alert('帳號重複')"; 
    echo "</SCRIPT>"; 
    echo "<script language=\"javascript\">"; 
    echo "location.href='register.php'"; 
    echo "</script>"; 
    return; 
    exit;
  }
}
}
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
//============================	
	if ($_POST['Weight'] == NULL) {
		$_POST['Weight'] = 0;
	}
	if ($_POST['Height'] == NULL) {
		$_POST['Height'] =0;
	}
//============================		
  $insertSQL = sprintf("INSERT INTO user (UserID, Psd, UserName, BDay, Sex, Mail, Weight, Height, Liver, Kidney, Stomach, Lung, Heart, Allergy, Gout, Insomnia, Fat, Artistic, Educative, Outdoor, Movement, Family, Code, EmailC) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['UserID'], "text"),
                       GetSQLValueString($_POST['Psd'], "text"),
                       GetSQLValueString($_POST['UserName'], "text"),
                       GetSQLValueString($_POST['BDay'], "date"),
                       GetSQLValueString($_POST['Sex'], "text"),
                       GetSQLValueString($_POST['Mail'], "text"),
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
                       GetSQLValueString($_POST['Code'], "text"),
                       GetSQLValueString($_POST['EmailC'], "text"));

  mysql_select_db($database_gsgf, $gsgf);
  $Result1 = mysql_query($insertSQL, $gsgf) or die(mysql_error());
  
    $insertGoTo = "Login.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<!--===================html=======================-->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>註冊</title>
<!--script-->
<script type = "text/javascript" src = "js/CheckEnter.js">
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<!--script-->
</head>
<body>
<?php
$ran = rand(10000000,99999999);
//分隔
function SendMail(){
	$Email = $_POST['Mail'];
	$Name = $_POST['UserName'];
	$UID = $_POST['UserID'];
	$Code = $_POST['Code'];
	mb_internal_encoding("utf-8");
	$to="$Email";
	$subject=mb_encode_mimeheader("食在好季會員信箱認證","utf-8");
	$message="食在好季的會員{$Name}您好 ，歡迎您註冊食在好季網站，請點擊以下網址來驗證信箱</br>　http://localhost/good_season_good_eat/Login/php/EmailCheck.php?UserID={$UID}&Code={$Code}";
	$headers="MIME-Version: 1.0\r\n";
	$headers.="Content-type: text/html; charset=utf-8\r\n";
	$headers.="From:".mb_encode_mimeheader("食在好季","utf-8")."<rahit91201@gmail.com>\r\n";
	mail($to,$subject,$message,$headers);
}



?>
<h1><legend align="center">註冊會員</legend></h1>
<table border="1" align="center" cellspacing="5" cellpadding="5" bgcolor="#FFFFFF"><form action="<?php echo $editFormAction; SendMail(); ?>" method="POST" id="form1" name="form1">
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>帳號</td>
		<td ROWSPAN="1" ><input name="UserID" type="text" id="UserID" lang="en" placeholder="請輸入帳號" onchange="CheckIDLength()" size="20" maxlength="20" required/>
	    5~15個英數字，需含英文字		</td>
 	</tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>密碼</td>
		<td ROWSPAN="1" ><input name="Psd" type="password" id="Psd" lang="en" placeholder="請輸入密碼" onchange="CheckPsdLength()" size="20" maxlength="20" required/>		  
		  7~15個英數字，需含英文&amp;數字
        </td>
	</tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>確認密碼</td>
		<td ROWSPAN="1" ><input name="PsdCheck" type="password" id="PsdCheck" lang="en" placeholder="再次輸入密碼" onchange="CheckPsdSame()" size="20" maxlength="20" required/>
        </td>
	</tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>用戶名稱</td>
		<td ROWSPAN="1" ><input type="text" id="UserName" name="UserName" size="20" maxlength="10" placeholder="請輸入您的暱稱" required/>
	  您的暱稱	    </tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>生日</td>
		<td ROWSPAN="1" ><input name="BDay" type="date" id="BDay" lang="en" max="<?php echo date("Y-m-d"); ?>"required/>
		請正確填寫，方便日後更改&找回密碼</td>
	</tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>性別</td>
		<td ROWSPAN="1" >&nbsp;&nbsp&nbsp;&nbsp<input type="radio" id = "Sex" name="Sex" value="F" checked /> 女&nbsp;&nbsp&nbsp;&nbsp<input type="radio" id = "Sex" name="Sex" value="M"/> 男  <!--value它的意思-->
 <br />
 		</td>
	</tr>
	<tr>
		<td ROWSPAN="1"><font color="red">*</font>電子郵件</td>
		<td ROWSPAN="1" ><input type="text" id = "Mail" name="Mail" placeholder="請輸入您的E-mail" autocomplete="on" onchange = "CheckEmail()" required/>
		</td>
	</tr>
	<tr>
		<td ROWSPAN="1">體重</td>
		<td ROWSPAN="1" ><input name="Weight" type="text" id="Weight" lang="en" onchange="CheckWeight()" size="20" maxlength="3" />
	</tr>
	<tr>
  		<td>身高</td>
  		<td ><input name="Height" type="text" id="Height" lang="en" onchange="CheckHeight()" size="20" maxlength="3" />    
        </td>
	</tr>
	<tr>
		<td ROWSPAN="1">欲改善</td>
		<td>
        	<input type="checkbox" id = "Health1" name="Health1"/> 暫時不需要            
			<input type="checkbox" id = "Liver" name="Liver" value="Y" />肝
            
			<input type="checkbox" id = "Kidney" name="Kidney" value="Y" /> 腎 

			<input type="checkbox" id = "Stomach" name="Stomach" value="Y" /> 胃
 
			<input type="checkbox" id = "Lung" name="Lung" value="Y" /> 肺
            
            <input type="checkbox" id = "Heart" name="Heart" value="Y" /> 心

			<input name="Code" type="hidden" id="Code" value="<?php echo $ran ?>" />

			<input name="EmailC" type="hidden" id="EmailC" value="N" />
		</td>
	</tr>
    <tr>
    	<td>
        體質
    	</td>
    	<td>
        <input type="checkbox" id = "Health2" name="Health2"/> 很健康
    	<input type="checkbox" id = "Allergy" name="Allergy"/> 過敏
        <input type="checkbox" id = "Gout" name="Gout"/> 痛風
        <input type="checkbox" id = "Insomnia" name="Insomnia"/> 失眠
        <input type="checkbox" id = "Fat" name="Fat"/> 肥胖
        </td>
	</tr>
    <tr>
    	<td>
        偏好活動
    	</td>
    	<td>
        <input type="checkbox" id = "NoThankYou" name="NoThankYou"/> 暫時不需要
        <input type="checkbox" id = "Artistic" name="Artistic"/> 藝文活動
        <input type="checkbox" id = "Educative" name="Educative"/> 教育活動
        <input type="checkbox" id = "Outdoor" name="Outdoor"/> 
        戶外遊憩<br>	
        <input type="checkbox" id = "Movement" name="Movement"/> 
        運動競技	
        <input type="checkbox" id = "Family" name="Family"/> 親子休閒
   	  </td>
	</tr>
    <tr>
    	<td colspan="2" ROWSPAN="1"><center><div class=</div><input type="submit" name="ok" id="ok" value="送出" />
    	</center>
        </td>
    </tr>

	<input type="hidden" name="MM_insert" value="form1" />
</form>
</table>


</body>
</html>
