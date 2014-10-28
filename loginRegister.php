<?php
$path="../";

if (isset($_POST["loginsubmit"])) {
	$errormsg="\n";//"<br><a href=\"register_login.php?t=2\">点此或返回重新登录</a>";
	$id=$_POST["id"];
	$pass=md5($id.$_POST["passwd"]);

	require_once ($path."db.php") ;

	$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or die;//(echo "抱歉！系统内部发生错误。请联系<a href='mailto:service@aihope.org'>站长</a>" && die);
	@mysql_select_db("userS");
	$sql="update user set last_login=NOW() , login_num=login_num+1 where id='"
		.$id
		."' and passwd='"
		.$pass
		."'";
	$dbres = mysql_query($sql, $db_con);
	$affect = mysql_affected_rows();
	mysql_close($db_con);
	if (!$dbres || $affect != 1) {
		$_GET["t"]="2";
		echo "<script> alert(\"用户名或密码不正确\"); </script>";//.mysql_error();
		echo $errormsg;
		//die;
	} else {
		//ob_start();
		setcookie("userid", $id, time()+3600*72);
		//ob_get_clean();
		//可跳转到个人中心  
		require("jump.php");
	}
} else if(isset($_POST["regsubmit"])) {
	$errormsg="\n";//"<br><a href=\"register_login.php?t=1\">点此或返回重新注册</a>";
	$minpasslen=6;
	if (strlen($_POST["passwd"]) < $minpasslen) {
		echo '<script> alert("对不起，密码过短，注册失败.\n请至少设置 '.$minpasslen.' 个字符。"); </script>';
		echo $errormsg;
	} else if ($_POST["passwd"] != $_POST["pass2"]) {
		echo '<script> alert("对不起，两次密码不一致，注册失败.\n为了避免输入错误，请重复输入两次密码。"); </script>';
		echo $errormsg;
	} else {
	//$pass=crypt($_POST["passwd"], $_POST["id"]);
	$pass=md5($_POST["id"].$_POST["passwd"]);
	require_once ($path."db.php") ;

	$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or die;//(echo "抱歉！系统内部发生错误。请联系<a href='mailto:service@aihope.org'>站长</a>" && die);
	@mysql_select_db("userS");
	$sql="insert into user (id, passwd, name, create_time, last_login, permission) values ('"
		.$_POST["id"]
		."', '"
		.$pass
		."', '"
		.$_POST["nick"]
		."', NOW(), NOW(), 3)";
		//permission: 1--可读; 2--可推荐老师; 4--可添加微信内容 ...
		$dbres = mysql_query($sql, $db_con);
		mysql_close($db_con);
		if (!$dbres) {
			echo '<script> alert("创建用户失败，请换一个用户名"); </script>';//.mysql_error();
			echo $errormsg;
		} else {
			setcookie("userid",$_POST["id"], time()+3600*72);
			echo "创建用户成功，已登录!";
			//可跳转到个人中心  
			require("jump.php");
		}
	}
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>注册/登录</title>
<link href="css/loginRegister.css" rel="stylesheet" type="text/css"/>
<?php
	if(isset($_GET["t"]) && $_GET["t"]=="2") {
		//?t=2 表示登录  
		$reg="none";
		$login="block";
		$regradio="";
		$loginradio="checked";
	} else {
		//url中没有t参数或t不是2表示新注册  
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

<body style="background: #dddddd; margin:0 0">
<div class="box_out">
	<iframe src="header.php" height="167px" width="100%" scrolling="no" frameborder="0"></iframe>
    <div class="box_radio">
		<input style="float:left; margin-top:12px" type="radio" name="register_login" onClick="show_hide('register','login')" <?php echo $regradio ?>/><div class="radio_text">注册</div>
		<input style="float:left; margin-top:12px" type="radio" name="register_login" onClick="show_hide('login','register')" <?php echo $loginradio ?>/><div class="radio_text">登录</div>
    </div>
    <form id="register" style="display:<?php echo $reg ?>; margin-top: 20px; padding-bottom: 20px" action="" method=POST id="register">
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
        <input class="button" style="margin-left:40px; margin-top:15px" type=submit name=regsubmit value="注册" />
    </form>
    <form id="login" style="display:<?php echo $login ?>; margin-top:20px; padding-bottom:20px" action="" method=POST id="register">
		<div class="box_in">
        	<div class="left_tag">用户名：</div>
            <input class="right_input" type=text size=16 name=id />
		</div>
        <div class="box_in">
        	<div class="left_tag">密码：</div>
            <input class="right_input" type=password size=16 name=passwd />
		</div>
        <input class="button" style="margin-left:40px; margin-top:15px" type=submit name=loginsubmit value="登录" />
    </form>
</div>
<iframe src="footer.php" height="160px" width="100%" scrolling="no" frameborder="0"></iframe>
</body>
</html>
