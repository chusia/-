<?php
$host = 'localhost';
$user = 'gsgf';
$pass = '';
$db = 'gsgf';
$conn = mysqli_connect($host, $user, $pass, $db) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($conn,"SET NAMES utf8"); 
?>



