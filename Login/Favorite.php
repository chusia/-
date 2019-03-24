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
		if(in_array($RecipeNumber,$Favorite) || $RecipeNumber == $RID){//已經加了的
?>
				<input name="NotFavorite" id = "NotFavorite" type="button" value="取消最愛" onclick = "location.href='/good_season_good_food/Login/php/NotFavorite.php?CancelFav=<?php echo $RecipeNumber; ?>'"/>
<?php
		} else {//登入&沒加的
?>
		    	<input name="Favorite1" id = "Favorite1" type="button" value="加到最愛" onclick = "location.href='/good_season_good_food/Login/php/AddFavorite.php?addFav=<?php echo $RecipeNumber; ?>'"/>
<?php
		}	
	} else {//登入&沒加的&從沒加過的
?>
    			<input name="Favorite2" id = "Favorite2" type="button" value="加到最愛" onclick = "location.href='/good_season_good_food/Login/php/AddFavorite.php?addFav=<?php echo $RecipeNumber; ?>'"/>
            </form>
<?php
	}
} else {//沒登入的
?>
		<input name="Favorite3" id = "Favorite3" type="button" value="加到最愛" onclick = "location.href='/good_season_good_food/Login/php/AddFavorite.php?addFav=<?php echo $RecipeNumber; ?>'" />
<?php
}
?>
<!--================加到最愛==================-->





</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
