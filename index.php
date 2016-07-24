<!DOCTYPE html>
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

$sql = "SELECT * FROM inf where name = 'C.U'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $C_U = $row['value'];
    //echo '市电电压：'.$value.'V<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'C.I'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    $C_I1 = $temp[0];
    $C_I2 = $temp[1];
    //echo '电器A电流：'.$temp[0].'A；电器B电流：'.$temp[1].'A<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'C.P'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    //echo '电器A功率：'.$temp[0].'W；电器B功率：'.$temp[1].'W<br/>'; 
    $C_P1 = $temp[0];
    $C_P2 = $temp[1];
}
$sql = "SELECT * FROM inf where name = 'C.W'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    $C_W1 = $temp[0];
    $C_W2 = $temp[1];
    //echo '电器A耗电：'.$temp[0].'度；电器B耗电：'.$temp[1].'度<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'S.T'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    $temp = explode(",",$value);
    $S_T = $temp[0];
    $S_W = $temp[1];
    //echo '当前温度：'.$temp[0].'摄氏度；相对湿度：'.$temp[1].'%<br/>'; 
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
    //echo '可燃气体传感器状态：'.$str.'<br/>'; 
    $S_G = $str;
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
    //echo '人体传感器状态：'.$str.'<br/>'; 
    $S_R = $str;
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
    //echo '雨水传感器状态：'.$str.'<br/>'; 
    $W = $str;
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
    //echo '门窗未关传感器状态：'.$str.'<br/>'; 
    $D = $str;
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
    $C_S1 = $str;
    $C_S2 = $str1;
    //echo '当前插座A状态：'.$str.'；当前插座B状态：'.$str1.'<br/>'; 
}
$sql = "SELECT * FROM inf where name = 'L.V'";
$result = $mysqli->query($sql);
$row = mysqli_fetch_array($result);
if($row != "")
{
    $value = $row['value'];
    //echo '当前灯亮度为'.$value.'<br/>'; 
    $L = $value;
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
//echo '当前系统配置为：插座A'.$set0.'，插座B'.$set1.'，灯光亮度'.$set2.'。<br/>'; 
$ConfS1 = $set0;
$ConfS2 = $set1;
$ConfL = $set2;
$mysqli->close();
?>
<html>
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
          <li class="active"><a href="#"><i class="fa fa-home"></i>基本信息</a></li>
          <li><a href="button-control.html"><i class="fa fa-cubes"></i><span class="badge pull-right"></span>开关控制</a></li>
          <li><a href="security.php"><i class="fa fa-map-marker"></i><span class="badge pull-right"></span>安全控件</a></li>
          <li><a href="lights.html"><i class="fa fa-users"></i><span class="badge pull-right">NEW</span>灯光控制</a></li>
          <li><a href="#"><i class="fa fa-cog"></i>服务支持</a></li>
          <li><a href="javascript:;" data-toggle="modal" data-target="#confirmModal"><i class="fa fa-sign-out"></i>登  出</a></li>
        </ul>
      </div><!--/.navbar-collapse -->

      <div class="templatemo-content-wrapper">
        <div class="templatemo-content">
          <ol class="breadcrumb">
            <li><a href="index.php">主页</a></li>
            <li><a href="#">基本信息</a></li>   
          </ol>
          <h1>基本信息</h1>
          <p>这里记录了智能家居中各个传感器现在的状态，您可以方便的获取现在您家中传感器的数据。</p> 

          <div class="row">
            <div class="col-md-6">
              <div class="templatemo-alerts">
                <div class="row">
                  <div class="col-md-12">
                    <div class="alert alert-info alert-dismissible">
                      <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
                      市电电压：<strong><?php echo $C_U; ?>伏</strong>
                    </div>
					
					<div class="alert alert-warning alert-dismissible">
                      <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
                      用电器A电流：<strong><?php echo $C_I1; ?>安</strong>&nbsp&nbsp&nbsp&nbsp用电器B电流：<strong><?php echo $C_I2; ?>安</strong>
                    </div>
					
                    <div class="alert alert-info alert-dismissible">
                      <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
                      用电器A功率：<strong><?php echo $C_P1; ?>瓦</strong>&nbsp&nbsp&nbsp&nbsp用电器B功率：<strong><?php echo $C_P2; ?>瓦</strong>
                    </div>
					
                    <div class="alert alert-warning alert-dismissible">
                      <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
                      用电器A耗电：<strong><?php echo $C_W1; ?>度</strong>&nbsp&nbsp&nbsp&nbsp用电器B耗电：<strong><?php echo $C_W2; ?>度</strong>
                    </div>
					
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
					
					<div class="alert alert-info alert-dismissible">
                      <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
                      插座A状态：<strong><?php echo $C_S1; ?></strong>&nbsp&nbsp&nbsp&nbsp插座B状态：<strong><?php echo $C_S2; ?></strong>
                    </div>
					
					<div class="alert alert-info alert-dismissible">
                      <p type="text"><span aria-hidden="true"></span><span class="sr-only"></span></p>
                      当前灯亮度：<strong><?php echo $L; ?></strong>
                    </div>
                  </div>  
                </div>            
              </div>              
            </div>
			
            <div class="col-md-6">
              <div class="templatemo-progress">
                <div class="list-group">
                  <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">最近数据</h4>
                    <p class="list-group-item-text">最近数据均处于正常状态，未发现任何异常警告！</p>
                  </a>
                  <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">官网信息</h4>
                    <p class="list-group-item-text">测试信息，发现大量数据同步问题，请检查！</p>
                  </a>
                </div>                
              </div> 
            </div>
          </div>
		  
        
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

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/Chart.min.js"></script>
    <script src="js/templatemo_script.js"></script>
    <script type="text/javascript">
    // Line chart
    var randomScalingFactor = function(){ return Math.round(Math.random()*100)};
    var lineChartData = {
      labels : ["January","February","March","April","May","June","July"],
      datasets : [
      {
        label: "My First dataset",
        fillColor : "rgba(220,220,220,0.2)",
        strokeColor : "rgba(220,220,220,1)",
        pointColor : "rgba(220,220,220,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(220,220,220,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      },
      {
        label: "My Second dataset",
        fillColor : "rgba(151,187,205,0.2)",
        strokeColor : "rgba(151,187,205,1)",
        pointColor : "rgba(151,187,205,1)",
        pointStrokeColor : "#fff",
        pointHighlightFill : "#fff",
        pointHighlightStroke : "rgba(151,187,205,1)",
        data : [randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor(),randomScalingFactor()]
      }
      ]

    }

    window.onload = function(){
      var ctx_line = document.getElementById("templatemo-line-chart").getContext("2d");
      window.myLine = new Chart(ctx_line).Line(lineChartData, {
        responsive: true
      });
    };

    $('#myTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    $('#loading-example-btn').click(function () {
      var btn = $(this);
      btn.button('loading');
      // $.ajax(...).always(function () {
      //   btn.button('reset');
      // });
  });
  </script>
</body>
</html>