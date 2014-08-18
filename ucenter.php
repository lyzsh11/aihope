<?php
	$path="../";
	require_once ($path."db.php") ;
	$id=$_COOKIE['userid'];
	$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or die;
	@mysql_select_db("userS");
	$sql = "select * from user where id='$id'";
	$dbres = mysql_query($sql, $db_con) or die;
	$info = mysql_fetch_array($dbres);
?>

<!doctype html>

<html>
<head>
<meta charset="utf-8">
<title>用户中心</title>
<link href="css/css_ucenter.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.1.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="js/bootstrap.min.js"></script>
</head>

<body>
<iframe src="header.html" scrolling="no" height="130px" width="100%" frameborder="0"></iframe>
<div class="box_in">
	<div class="box_user_info">
    	<div class="user_info">
        	<div class="user_icon"><img src="<?php echo $info["pic"] ?>"/></div>
            <div class="user_info_detail">
            	<div class="text_name" id="user_name"><?php echo $info["name"] ?></div>                <div style="padding-top:10px; height:28px; width:100px">
                	<div class="text_tag" style="float:left">用户：</div>
                	<div class="text_tag" style="float:left"><?php echo $info["id"] ?></div>
                	<!--div class="text_tag" style="float:left">性别：</div>
                	<div class="text_tag" style="float:left">女</div-->
                </div>
                <div style="padding-top:10px; height:28px; width:100px">
                	<div class="text_tag" style="float:left">等级：</div>
                	<div class="text_level" style="float:left"><?php echo $info["level"] ?></div>
                </div>
            </div>
        </div>
        <div class="user_give">
        	<div class="text_name">爱心点滴</div>
            <div class="user_give_in">
            	<div style="margin-top:10px; width:260px; height:30px">
                	<div class="icon">
                    	<img src="image/heart_double.png" width="30px"/>
                    </div>
                    <div class="text_give" style="margin-left:10px">您已捐赠了</div>
                    <div class="text_give_num"><?php echo $info["total_donation"] ?></div>
                    <div class="text_give">元</div>
                </div>
                <div style="margin-top:10px; width:260px; height:30px">
                	<div class="icon">
                    	<img src="image/heart_double.png" width="30px"/>
                    </div>
                    <div class="text_give" style="margin-left:10px">您已帮助了</div>
                    <div class="text_give_num"><?php echo $info["total_helped_people"] ?></div>
                    <div class="text_give">人</div>
                </div>
            </div>
            <div class="text_name" style="margin-top:30px">最新动态</div>
            <div class="user_give_in">
            	<div style="margin-top:10px; width:260px; height:30px">
                	<div class="icon">
                    	<img src="image/heart_fenhong.png" width="30px"/>
                    </div>
                    <div class="text_give" style="margin-left:10px">您于</div>
                    <div class="text_give_num"><?php echo $info["last_login"] ?></div>
                    <div class="text_give">第</div>
                    <div class="text_give_num"><?php echo $info["login_num"] ?></div>
                    <div class="text_give">次登录</div>
                </div>
                <div style="margin-top:10px; width:260px; height:30px">
		<?php if ($info["last_donation_money"] > 0) { ?>
                	<div class="icon">
                    	<img src="image/heart_fenhong.png" width="30px"/>
                    </div>
                    <div class="text_give" style="margin-left:10px">您于</div>
                    <div class="text_give_num"><?php echo $info["last_donation_date"] ?></div>
                    <div class="text_give">捐助了</div>
                    <div class="text_give_num"><?php echo $info["last_donation_money"] ?></div>
                    <div class="text_give">元</div>
		<?php } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="my_activity">
    	<div class="user_name_tag"><?php echo $info["name"] ?></div>
        <div class="my_activity_in">
        	<!-- Nav tabs -->
			<ul class="nav nav-tabs" role="tablist">
  				<li class="active"><a style="color:#447C49" href="#home" role="tab" data-toggle="tab">我的主页</a></li>
  				<li><a style="color:#447C49" href="#profile" role="tab" data-toggle="tab">我的捐赠</a></li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
  				<div class="tab-pane active" id="home">
                	<div class="box_home">
                    	balabala
                    </div>
                </div>
  				<div class="tab-pane" id="profile">
                	<div class="box_home">
                    	
                    </div>
                </div>
			</div>
        </div>
    </div>
</div>
</body>
</html>
