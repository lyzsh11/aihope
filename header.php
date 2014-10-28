<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/header.css" rel="stylesheet" type="text/css"/>
</head>

<body style="background-color:#dddddd; margin:0 0">
<div class="box_out">
	<div class="logo_bar">
    	<img src="image/logo.png" class="logo"/>
	<div class="text_login">
<?php if(isset($_COOKIE['userid'])) {
	echo $_COOKIE['userid'];
?>
		，你好！  (点此可以<a class="text_link" href="logout.php" target="_parent">登出</a>)</div>
<?php } else { ?>
    	点此可以 <a target="_parent" href="loginRegister.php">注册</a>&nbsp;/&nbsp;<a target="_parent" href="loginRegister.php?t=2">登录</a>
<?php } ?>
	</div>
    </div>
    <div class="border_1"></div>
    <div class="border_2"></div>
    <!--<div class="group_image">
    	<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
    		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
  		</ol>

  		<div class="carousel-inner" role="listbox">
    		<div class="item active">
      			<img src="image/header_image_1.jpg" alt="...">
      			<div class="carousel-caption"></div>
    		</div>
    		<div class="item">
      			<img src="image/header_image_2.jpg" alt="...">
      			<div class="carousel-caption"></div>
    		</div>
		</div>

  		<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    		<span class="glyphicon glyphicon-chevron-left"></span>
    		<span class="sr-only">Previous</span>
  		</a>
  		<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    		<span class="glyphicon glyphicon-chevron-right"></span>
    		<span class="sr-only">Next</span>
  		</a>
		</div>
    </div>
    <div class="border_3"></div>-->
    <div class="nav_bar">
    	<a href="index.php" target="_parent"><div class="nav_item">首页</div></a>
        <a href="give.php" target="_parent"><div class="nav_item">奖赠列表</div></a>
        <a href="add_teacher.php" target="_parent"><div class="nav_item">我要推荐</div></a>
        <a href="about.php" target="_parent"><div class="nav_item">关于我们</div></a>
    </div>
</div>
</body>
</html>
