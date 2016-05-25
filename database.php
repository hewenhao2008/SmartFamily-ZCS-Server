<?php
$con = mysql_connect(DBServer, DBUser, DBPassword);
if (!$con)
    die('Could not connect: ' . mysql_error());
mysql_select_db(DBName, $con);
mysql_query("set character set 'utf8'");
?>
