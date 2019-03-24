<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_gsgf = "localhost";
$database_gsgf = "gsgf";
$username_gsgf = "gsgf";
$password_gsgf = "";
$gsgf = mysql_pconnect($hostname_gsgf, $username_gsgf, $password_gsgf) or trigger_error(mysql_error(),E_USER_ERROR); 
mysql_query("set names 'utf8'");
?>