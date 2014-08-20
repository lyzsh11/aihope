<?php
	$path="../";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>爱心帮首页</title>
<link href="css/css_main.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.1.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="js/bootstrap.min.js"></script>
</head>

<body style="margin:0 0">
<iframe src="header.php" scrolling="no" height="130px" width="100%" frameborder="0"></iframe>
<div class="box_in">
	<div class="left">
		<iframe src="left.php" scrolling="no" height="600px" width="100%" frameborder="0"></iframe>
	</div>
    <div class="middle_right">
    	<div class="middle">
    		<iframe src="image.php" scrolling="no" height="500px" width="500px" frameborder="0" scrolling="no"></iframe>
    	</div>
    	<div class="right">
    		<div class="text_head_wx">爱心帮微信消息</div>
			<img src="image/bar.png"/>
			<iframe src="wx.php" scrolling="auto" height="350px width="100%" frameborder="0"></iframe>
    	</div>
    	<div class="middle_bottom">
        	<div class="text_head">那些身边的人和事</div>
            <div style="background:url(image/bar_long.png) repeat-x; height:5px; margin-top:5px"></div>
            <div class="box_news">
            	<a href="/web/WangChengXia/"><div class="text_head_small">采访王成霞老师的录像</div></a>
                <a href="http://v.youku.com/v_show/id_XNTgxOTE1NTgw.html"><div class="text_content">苗乡的呼唤</div></a>
            </div>
            <!--div class="box_news">
            	<div class="text_head_small">采访王成霞老师的录像</div>
                <div class="text_content">具体内容</div>
            </div-->
    	</div>
    </div>
</div>
</body>
</html>
