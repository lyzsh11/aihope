<?php
$path="../";

$errormsg="<br><a href=\"register.php\">点此或返回重新注册</a>";
$minpasslen=6;
if (strlen($_POST["passwd"]) < $minpasslen) {
	echo "对不起，密码过短，注册失败<br>请至少设置 $minpasslen 个字符。<br>\n";
	echo $errormsg;
	die;
} else if ($_POST["passwd"] != $_POST["pass2"]) {
	echo "对不起，两次密码不一致，注册失败<br>为了避免输入错误，请重复输入两次密码。<br>\n";
	echo $errormsg;
	die;
}
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
if (!$dbres) {
	echo "创建用户失败，请换一个用户名";//.mysql_error();
	echo $errormsg;
	die;
}
setcookie("user",$_POST["id"], 3600*72);
echo "创建用户成功，已登录!";
//可跳转到个人中心  
require("jump.php");
mysql_close($db_con);
?>
