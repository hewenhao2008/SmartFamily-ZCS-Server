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

$sql = "SELECT * FROM inf where name = '$_REQUEST[name]'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);

if($row == "")
    $sql = "INSERT INTO inf (name, value) VALUES ('$_REQUEST[name]', '$_REQUEST[value]')";
else
    $sql = "update inf set value = '$_REQUEST[value]' where name = '$_REQUEST[name]'";
mysql_query($sql);

mysql_close($con);
exit("ok");  
?>
