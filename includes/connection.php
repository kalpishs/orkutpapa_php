<?php
define("HOST","localhost");
define("USER","root");
define("PASSWORD","12345678");
define("DB","orkutpapa");
define("URL","http://localhost/orkut-papa");

$conn = mysql_connect("localhost","root","12345678") or die(mysql_error()) ;
mysql_select_db(DB,$conn) or die(mysql_error());
?>