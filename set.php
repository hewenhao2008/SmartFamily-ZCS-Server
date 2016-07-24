<?php 
if(strcmp($_REQUEST[name], "L.V") == 0)
    $aim = "lights";
else 
    $aim = "button-control";
?>
<meta http-equiv="refresh" content="0.1;url=<?php echo $aim; ?>.html"> 
<?php
//屏蔽部分错误信息
error_reporting(E_ALL ^ E_DEPRECATED ^ E_NOTICE);
require 'config.php';

//if($_REQUEST['password'] != $AdminPass)
//{
//    exit("Wrong Password");
//}

//连接数据库
require 'database.php';

$sql = "update setting set value = '$_REQUEST[set]' where name = '$_REQUEST[name]'";

$mysqli->query($sql);

$mysqli->close();
exit("请求已提交。");  
?>
