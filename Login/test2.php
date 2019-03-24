<?php 
if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['A'] = '5';
$_SESSION['A'] = $_GET['B'];
?>