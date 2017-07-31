<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_productos = "localhost";
$database_productos = "qrh618";
$username_productos = "root";
$password_productos = "";
$productos = mysql_pconnect($hostname_productos, $username_productos, $password_productos) or trigger_error(mysql_error(),E_USER_ERROR);
mysql_query("SET NAMES 'utf8'");
?>