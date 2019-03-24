<?php require_once('../Connections/gsgf.php'); ?>
<?php
if(isset($_GET['actID'])){
	$actID = $_GET['actID'];
	$sql = "select ACT_web from act where ACT_id = '$actID'";
	$result = mysql_query($sql,$gsgf) or die("run error");
	$row = mysql_fetch_array($result);
	$sql = "update act set Count = Count + 1 where ACT_id = '$actID'";
	$result = mysql_query($sql,$gsgf) or die("run error");
	echo "<script language=\"javascript\">"; 
	echo "location.href='".$row['ACT_web']."'"; 
	echo "</script>"; 
}