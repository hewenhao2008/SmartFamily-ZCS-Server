<?php
//屏蔽部分错误信息
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
require 'config.php';

if($_REQUEST['password'] != $AdminPass)
{
    exit("Wrong Password");
}

//连接数据库
require 'database.php';

$sql = "SELECT * FROM setting where name = 'C.S1'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$set0 = $row['value'];

$sql = "SELECT * FROM setting where name = 'C.S2'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$set1 = $row['value'];

$sql = "SELECT * FROM setting where name = 'L.V'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
$set2 = $row['value'];

echo 'C:S'.$set1.$set0.',L:V'.$set2;
mysql_close($con);
exit();  
?>