<?php require_once('../Connections/gsgf.php'); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
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

mysql_select_db($database_gsgf, $gsgf);
$query_Recordset1 = "SELECT * FROM act";
$Recordset1 = mysql_query($query_Recordset1, $gsgf) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
 
if (!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最愛</title>
</head>

<body>
<?php 
if(!empty($_SESSION['MM_Username'])){
	$UID = $_SESSION['MM_Username'];
	$sql = "Select Favorite From `user` WHERE UserID = '$UID'";
	$result = mysql_query($sql, $gsgf) or die(mysql_error());
	$Ftmp=mysql_fetch_array($result);
	$Fav = $Ftmp[0];
}
?>

    <!--============加到最愛===============-->
<?php
$RID = $row_Recordset1['ACT_id'];
if(!empty($_SESSION['MM_Username'])){
	if ($Fav != NULL) {
		$Favorite = explode("@",$Fav);
		if(in_array($RID,$Favorite) || $RID == $row_Recordset1['ACT_id']){//已經加了的
?>
			<form id = "NotFavorite" method="Get" action = "php/NotFavorite.php">
    <!--=============食譜id=================-->
      			<input name="CancelFav" type="hidden" value="<?php echo $RecipeNumber; ?>" />
    <!--=============食譜id=================-->
				<input name="NotFavorite" id = "NotFavorite" type="submit" value="取消最愛"/>
			</form>
<?php
		} else {//登入&沒加的
?>
			<form id = "addFav1" method="Get" action = "php/AddFavorite.php">
    <!--=============食譜id=================-->
				<input name="addFav" type="hidden" value="<?php echo $RecipeNumber; ?>" />
    <!--=============食譜id=================-->
		    	<input name="Favorite1" id = "Favorite1" type="submit" value="加到最愛" onclick = ""/>
        	</form>
<?php
		}	
	} else {//登入&沒加的&從沒加過的
?>
			<form id = "addFav2" method="Get" action = "php/AddFavorite.php">
    <!--=============食譜id=================-->
				<input name="addFav" type="hidden" value="<?php echo $RecipeNumber; ?>" />
    <!--=============食譜id=================-->
    			<input name="Favorite2" id = "Favorite2" type="submit" value="加到最愛" onclick = ""/>
            </form>
<?php
	}
} else {//沒登入的
?>
	<form id = "addFav3" method="Get" action = "php/AddFavorite.php">
    <!--=============食譜id=================-->
		<input name="addFav" type="hidden" value="<?php echo $RecipeNumber; ?>" />
    <!--=============食譜id=================-->
		<input name="Favorite3" id = "Favorite3" type="submit" value="加到最愛" />
    </form>
<?php
}
?>
<!--================加到最愛==================-->





</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
