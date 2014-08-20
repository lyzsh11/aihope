<?php
$path="../";

$errormsg="<br><a href=\"register_login.php?t=2\">点此或返回重新登录</a>";
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
if (!$dbres || mysql_affected_rows() != 1) {
	echo "用户名或密码不正确";//.mysql_error();
	echo $errormsg;
	die;
}
//echo $sql;
//print " $dbres => ".mysql_affected_rows();
/*$session = new session;
session_start();
if (!session_is_registered("user")){ 
	session_register("user");
}
/*$con=" user=".$id;
$session->get_from_condition($con);
if ($session->counter > 0){
	$session->update($id, substr($REMOTE_ADDR,0,50), time()+3600*72);
} else {*/
//	$session->insert($id, substr($REMOTE_ADDR,0,50), time()+3600*72);
//}
//ob_start();
setcookie("userid", $id, time()+3600*72);
//ob_get_clean();
//echo "登录成功";
//$_COOKIE["user"] = $_POST["id"];
//print_r($_COOKIE);
//echo $_COOKIE["userid"];
//print_r($HTTP_SESSION_VARS);
//可跳转到个人中心  
mysql_close($db_con);

//require("ucenter.php");
require("jump.php");
?>
