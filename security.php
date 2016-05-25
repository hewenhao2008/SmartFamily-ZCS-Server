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

$sql = "SELECT * FROM inf where name = 'S.T'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    $S_T = $temp[0];
    $S_W = $temp[1];
    //echo '当前温度：'.$temp[0].'摄氏度；相对湿度：'.$temp[1].'%<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'S.G'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    //echo '可燃气体传感器状态：'.$str.'<br/>'; 
    $S_G = $str;
}
$sql = "SELECT * FROM inf where name = 'S.R'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    //echo '人体传感器状态：'.$str.'<br/>'; 
    $S_R = $str;
}
$sql = "SELECT * FROM inf where name = 'W.Inf'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    //echo '雨水传感器状态：'.$str.'<br/>'; 
    $W = $str;
}
$sql = "SELECT * FROM inf where name = 'D.Inf'";
$result = mysql_query($sql);
$row = mysql_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    if(strcmp($value, 'Y') == 0)
        $str = "<font color='red'>报警</font>";
    else if(strcmp($value, 'N') == 0)
        $str = "正常";
    else $str = "<font color='red'>错误</font>";
    //echo '门窗未关传感器状态：'.$str.'<br/>'; 
    $D = $str;
}
mysql_close($con);
?>
<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>EchoIot Smart House</title>
    <meta charset="utf-8"/>
    <meta http-equiv="refresh" content="1">
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
</head>
<body>
  <div class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <div class="logo"><h1>EchoIot Smart House</h1></div>
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button> 
      </div>   
    </div>
    <div class="template-page-wrapper">
	<!-- 左边框 -->
      <div class="navbar-collapse collapse templatemo-sidebar">
        <ul class="templatemo-sidebar-menu">
          <li>
            <form class="navbar-form">
              <input type="text" class="form-control" id="templatemo_search_box" placeholder="搜索...">
              <span class="btn btn-default">GO</span>
            </form>
          </li>
          <li class="active"><a href="index.php"><i class="fa fa-home"></i>基本信息</a></li>
          <li><a href="button-control.html"><i class="fa fa-cubes"></i><span class="badge pull-right"></span>开关控制</a></li>
          <li><a href="#"><i class="fa fa-map-marker"></i><span class="badge pull-right"></span>安全控件</a></li>
          <li><a href="lights.html"><i class="fa fa-users"></i><span class="badge pull-right">NEW</span>灯光控制</a></li>
          <li><a href="#"><i class="fa fa-cog"></i>服务支持</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>登  出</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="index.php">主页</a></li>
            <li><a href="#">安全控件</a></li>   
          </ol>
          <h1>安全控件</h1>
          <p>关于室内安全的信息将会在此页显示，您在此页进行相应控制。</p>  
		  
		<div class="alert alert-danger alert-dismissible">
		  <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
		  当前温度：<strong><?php echo $S_T; ?>摄氏度</strong>&nbsp&nbsp&nbsp&nbsp相对湿度：<strong><?php echo $S_W; ?>%</strong>
		</div>  
		
		<div class="alert alert-info alert-dismissible">
		  <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
		  可燃气体传感器：<strong><?php echo $S_G; ?></strong>
		</div>
		
		<div class="alert alert-info alert-dismissible">
		  <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
		  红外热释电传感器：<strong><?php echo $S_R; ?></strong>
		</div>
		
		<div class="alert alert-info alert-dismissible">
		  <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
		  雨水传感器：<strong><?php echo $W; ?></strong>
		</div>  
         <div class="alert alert-info alert-dismissible">
		  <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
		  门窗传感器：<strong><?php echo $D; ?></strong>
		</div> 
		  
        </div>

        
<!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">您确定登出？</h4>
            </div>
            <div class="modal-footer">
              <a href="sign-in.html" class="btn btn-primary">是</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">否</button>
            </div>
          </div>
        </div>
      </div>
        <footer class="templatemo-footer">
          <div class="templatemo-copyright">
            <p>Powered By <a href="www.echoiot.com">EchoIoT</a> Technology CopyRight 2013-2016, <a href="www.echoiot.com">ECHOIOT.COM</a>, Inc.All Rights Reserved.</p>
          </div>
        </footer>
      </div>
	</div>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/templatemo_script.js"></script>
      <script src="jqvmap/jquery.vmap.js" type="text/javascript"></script>
      <script src="jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
      <script src="jqvmap/data/jquery.vmap.sampledata.js" type="text/javascript"></script>
      <script src="jqvmap/maps/jquery.vmap.usa.js" type="text/javascript"></script>
      <script src="jqvmap/maps/continents/jquery.vmap.asia.js" type="text/javascript"></script>
      <script src="jqvmap/maps/continents/jquery.vmap.europe.js" type="text/javascript"></script>
      <script src="jqvmap/maps/continents/jquery.vmap.australia.js" type="text/javascript"></script>
      <script src="jqvmap/maps/continents/jquery.vmap.africa.js" type="text/javascript"></script>
      <script src="jqvmap/maps/continents/jquery.vmap.north-america.js" type="text/javascript"></script>
      <script src="jqvmap/maps/continents/jquery.vmap.south-america.js" type="text/javascript"></script>
      
      <script type="text/javascript">
        $(document).ready(function() {

          $('#vmap_world').vectorMap({
            map: 'world_en',
            backgroundColor: '#ffffff',
            color: '#333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
          $('#vmap_usa').vectorMap({
            map: 'usa_en',
            enableZoom: true,
            showTooltip: true,
            selectedRegion: 'MO'
          });
          $('#vmap_asia').vectorMap({
            map: 'asia_en',
            backgroundColor: '#ffffff',
            color: '#333333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
          $('#vmap_europe').vectorMap({
            map: 'europe_en',
            backgroundColor: '#ffffff',
            color: '#333333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
          $('#vmap_australia').vectorMap({
            map: 'australia_en',
            backgroundColor: '#ffffff',
            color: '#333333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
          $('#vmap_africa').vectorMap({
            map: 'africa_en',
            backgroundColor: '#ffffff',
            color: '#333333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
          $('#vmap_northamerica').vectorMap({
            map: 'north-america_en',
            backgroundColor: '#ffffff',
            color: '#333333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
          $('#vmap_southamerica').vectorMap({
            map: 'south-america_en',
            backgroundColor: '#ffffff',
            color: '#333333',
            hoverOpacity: 0.7,
            selectedColor: '#666666',
            enableZoom: true,
            showTooltip: true,
            values: sample_data,
            scaleColors: ['#C8EEFF', '#006491'],
            normalizeFunction: 'polynomial'
          });
        });
</script>
</div>
</body>
</html>