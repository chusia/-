<?php
if (!isset($_SESSION)) {
  session_start();
}
if(isset($_GET['AQI'])){
$_SESSION['AQI'] = $_GET['AQI'];
}
if(isset($_GET['Rain'])){
$_SESSION['Rain'] = $_GET['Rain'];
}
echo $_SESSION['AQI'];
?>