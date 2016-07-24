<meta http-equiv="refresh" content="1">
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

$sql = "SELECT * FROM inf where name = 'C.U'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    echo '市电电压：'.$value.'V<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'C.I'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    echo '电器A电流：'.$temp[0].'A；电器B电流：'.$temp[1].'A<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'C.P'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    echo '电器A功率：'.$temp[0].'W；电器B功率：'.$temp[1].'W<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'C.W'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    echo '电器A耗电：'.$temp[0].'度；电器B耗电：'.$temp[1].'度<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'S.T'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    echo '当前温度：'.$temp[0].'摄氏度；相对湿度：'.$temp[1].'%<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'S.G'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    echo '可燃气体传感器状态：'.$str.'<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'S.R'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    echo '人体传感器状态：'.$str.'<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'W.Inf'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    echo '雨水传感器状态：'.$str.'<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'D.Inf'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    echo '门窗未关传感器状态：'.$str.'<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'C.S'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, "00") == 0)
    {
        $str = "断开";
        $str1 = "断开";
    }
    else if(strcmp($value, "01") == 0)
    {
        $str = "接通";
        $str1 = "断开";
    }
    else if(strcmp($value, "10") == 0)
    {
        $str = "断开";
        $str1 = "接通";
    }
    else if(strcmp($value, "11") == 0)
    {
        $str = "接通";
        $str1 = "接通";
    }
    else
    {
        $str = "错误";
        $str1 = "错误";
    }
    echo '当前插座A状态：'.$str.'；当前插座B状态：'.$str1.'<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'L.V'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    echo '当前灯亮度为'.$value.'<br/>'; 
}


$sql = "SELECT * FROM setting where name = 'C.S1'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
$set0 = $row['value'];

$sql = "SELECT * FROM setting where name = 'C.S2'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
$set1 = $row['value'];

$sql = "SELECT * FROM setting where name = 'L.V'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
$set2 = $row['value'];
if(strcmp($set1, '0') == 0)
    $set1 = "断开";
else if(strcmp($set1, '1') == 0)
    $set1 = "接通";   
else $set1 = "错误";   
if(strcmp($set0, '0') == 0)
    $set0 = "断开";
else if(strcmp($set0, '1') == 0)
    $set0 = "接通";   
else $set0 = "错误";  
echo '当前系统配置为：插座A'.$set0.'，插座B'.$set1.'，灯光亮度'.$set2.'。<br/>'; 
$mysqli->close();
?>