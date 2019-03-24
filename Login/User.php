<?php require_once('Connections/gsgf.php'); ?>
<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = '/good_season_good_food/Login/login.php';
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php if (!isset($_SESSION)) {
  session_start();
}
?>


<body>
<form id="form1" name="form1" method="post" action="">  
<?php
if(isset($_SESSION['MM_Username'])){
	echo "歡迎，".$_SESSION['MM_Username'];
?>
  <input type="button" name="loginOut" id="loginOut" value="登出" onClick="location.href='<?php echo $logoutAction ?>';">
<?php
} else {
?>
	<input name='login' type='button' onClick="location.href='/good_season_good_food/Login/login.php'" value = '登入'/>
<?php

}


?>
</body>
</html>