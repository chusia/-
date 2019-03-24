<?php require_once('../../Connections/gsgf.php'); ?>
<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php
if(!empty($_SESSION['MM_Username'])){
	$UID = $_SESSION['MM_Username'];
	$sql = "Select Favorite From `user` WHERE UserID = '$UID'";
	$result = mysql_query($sql, $gsgf) or die(mysql_error());
	$Ftmp=mysql_fetch_array($result);
	$Fav = $Ftmp[0];
	if(isset($_GET['addFav'])){
		$CF = $_GET['addFav'];
	}
	if ($Fav != NULL) {
		$Favorite = explode("@",$Fav);
		if(in_array($CF,$Favorite)){
?>
			<script> 
			window.alert('已在最愛');
			history.back();
			parent.window.location.replace(window.location.href);
			</script>
<?php
		} else {
			array_push($Favorite,$CF);
			$Fav = implode("@",$Favorite);
			$sql = "UPDATE user SET Favorite = '$Fav' WHERE UserID = '$UID'";
			$result = mysql_query($sql, $gsgf) or die(mysql_error());
?>
			<script> 
			window.alert('添加成功');
			history.back();
			parent.window.location.replace(window.location.href);
			</script>
<?php
		}
	} else {
		$Fav = $CF;
		$sql = "UPDATE user SET Favorite = '$Fav' WHERE UserID = '$UID'";
		$result = mysql_query($sql, $gsgf) or die(mysql_error());
?>
			<script> 
			window.alert('添加成功');
			history.back();
			parent.window.location.replace(window.location.href);
			</script>
<?php
	}
} else {
	echo "<SCRIPT Language=javascript>"; 
	echo "window.alert('請先登入')"; 
	echo "location.href='../login.php'"; 
	echo "</script>"; 
	return; 
}
?>