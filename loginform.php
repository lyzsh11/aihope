<html>
<head>
<meta charset="utf-8">
<title>注册/登录</title>
<link href="css/css_table.css" rel="stylesheet" type="text/css"/>
<?php
	if(isset($_GET["t"]) && $_GET["t"]=="2") {
		$reg="none";
		$login="block";
		$regradio="";
		$loginradio="checked";
	} else {
		$reg="block";
		$login="none";
		$regradio="checked";
		$loginradio="";
	}
?>
<script>
function show_hide(id1,id2){
	div1=document.getElementById(id1);
	div2=document.getElementById(id2);
	div1.style.display='block';
	div2.style.display='none';
}
</script>
</head>

<body style="margin:0 0">
<iframe src="header.php" scrolling="no" height="150px" width="100%" frameborder="0"></iframe>
<div class="box_out">
	<div class="box_radio">
		<input style="float:left; margin-top:12px" type="radio" name="register_login" onClick="show_hide('register','login')" <?php echo $regradio ?>/><div class="radio_text">注册</div>
		<input style="float:left; margin-top:12px" type="radio" name="register_login" onClick="show_hide('login','register')" <?php echo $loginradio ?>/><div class="radio_text">登录</div>
    </div>
    <form id="register" style="display:<?php echo $reg ?>" action="register_login.php" method=POST id="register">
		<div class="box_in">
        	<div class="left_tag">用户名：</div>
            <input class="right_input" type=text size=16 name=id />
		</div>
        <div class="box_in">
        	<div class="left_tag">昵称：</div>
            <input class="right_input" type=text size=16 name=nick value="匿名" />
		</div>
        <div class="box_in">
        	<div class="left_tag">密码：</div>
            <input class="right_input" type=password size=16 name=passwd />
		</div>
        <div class="box_in">
        	<div class="left_tag">重复密码：</div>
            <input class="right_input" type=password size=16 name=pass2 />
		</div>
        <input class="button" style="margin-left:20px; margin-top:20px" type=submit name=regsubmit value="注册" />
    </form>
    <form id="login" style="display:<?php echo $login ?>" action="register_login.php" method=POST id="register">
		<div class="box_in">
        	<div class="left_tag">用户名：</div>
            <input class="right_input" type=text size=16 name=id />
		</div>
        <div class="box_in">
        	<div class="left_tag">密码：</div>
            <input class="right_input" type=password size=16 name=passwd />
		</div>
        <input class="button" style="margin-left:20px; margin-top:20px" type=submit name=loginsubmit value="登录" />
    </form>
</div>

</body>
</html>
