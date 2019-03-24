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
	if ($Fav != NULL) {
		$Favorite = explode("@",$Fav);
	}
	if(isset($_GET['CancelFav'])){
		$CF = $_GET['CancelFav'];
	}
	if (count($Favorite) == 1) {
		$sql = "UPDATE user SET Favorite = NULL WHERE UserID = '$UID'";
		$result = mysql_query($sql, $gsgf) or die(mysql_error());
?>
		<script>
		window.alert('已取消最愛');
		history.back();
		parent.window.location.replace(window.location.href);
		</script>
<?php
	} else {
		$key = array_search($CF,$Favorite);  
    	if(isset($key)){  
        	unset($Favorite[$key]);  
    	}
		$Fav = implode("@",$Favorite);
		$sql = "UPDATE user SET Favorite = '$Fav' WHERE UserID = '$UID'";
		$result = mysql_query($sql, $gsgf) or die(mysql_error());
?>
		<script>
		window.alert('已取消最愛');
		history.back();
		parent.window.location.replace(window.location.href);
		</script>
<?php
		
	} 
}


?>