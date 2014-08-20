<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="css/css_header.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0 0">
<div class="box_top">
	<div class="user_info">
    	<!--div class="text_small">点击可以进入</div-->
	<div class="text_without_link">
<?php if(isset($_COOKIE['userid'])) {
	echo $_COOKIE['userid'];
?>
		，你好！  (点此可以<a class="text_link" href="logout.php" target="_blank">登出</a>)</div>
<?php } else { ?>
	        点此可以<a class="text_link" href="register_login.php" target="_blank">注册/登录</a></div>
<?php } ?>
    </div>
</div>
<div class="box_out">
	<div class="box_in">
        <div class="box_nav_interval"><img src="image/nav_interval.png"/></div>
        <a href="index.php" target="_blank"><div class="box_nav_in">首&nbsp;&nbsp;页</div></a>
        <div class="box_nav_interval"><img src="image/nav_interval.png"/></div>
        <a href="add_teacher.php" target="_blank"><div class="box_nav_in">我&nbsp;要&nbsp;推&nbsp;荐</div></a>
        <a href="give_list.php" target="_blank"><div class="box_nav_in">我&nbsp;要&nbsp;奖&nbsp;赠</div></a>
        <div class="box_nav_interval"><img src="image/nav_interval.png"/></div>
        <a href="about.php" target="_blank"><div class="box_nav_in">关&nbsp;于&nbsp;我&nbsp;们</div></a>
        <div class="box_nav_interval"><img src="image/nav_interval.png"/></div>
    </div>
</div>
</body>
</html>
