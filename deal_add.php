<?php
$path="../";
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
        require("loginform.php");
} else {
        //TODO: 检查用户的权限  
	$dir = $_POST["path"];
	$rootpath = '/usr/share/nginx/html/v1/';
	$url = "http://www.aihope.org/web/".$dir."/";
	$uploaddir = $rootpath.$dir;
	$error = 0;
	mkdir($uploaddir);
	require_once ($path."db.php") ;
	$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or die;
	@mysql_select_db($dbname);
	//$sql="insert into teacher (name,create_time) values (\"测试3\",NOW())";
	//$sql="select * from teacher where url like \"%$dir\"";
	//$dbres = mysql_query($sql, $db_con);
	//TODO:判断重复,考察覆盖数据的权限  
	$sql="insert into teacher (name,create_time,pic,info,position,url,shopurl) values (\"".$_POST["teacher_name"]."\",NOW(),'"
	.$_POST["pic"]
	."', '"
	.$_POST["summary"]
	."', '"
	.$_POST["position"]
	."', '"
	.$url
	."', '"
	.$_POST["shopurl"]
	."')";
	$dbres = mysql_query($sql, $db_con);
	if (!$dbres) {
		echo "$sql 插入数据库失败: ".mysql_error()."<br>\n";
	//} else {
	//	echo "数据库插入成功<br>\n";
	}
	mysql_close($db_con);

	//创建老师的主网页  
	$handle = fopen($uploaddir."/index.php", "w");
	fwrite($handle ,'<html>');
	$content = $_POST["content"];
	if (strlen($content) > 0) {
		if(isset($_POST["usehtml"])) {
			fwrite($handle, $content);
		} else {
			fwrite($handle, "<pre>\n".$content."\n</pre>\n");
		}
	}
	$link = $_POST["link"];
	if (strlen($link) > 0) {
		//此链接内容作为frame
		fwrite($handle ,'<frameset cols=100%><frame width=100% height=100% src="'
		.$link
		.'" />');
		fwrite($handle ,'</frameset>');

	}

	fwrite($handle ,'</html>');
	fclose($handle);

	$jumpdest = $url;
	require("jump.php");
}
?>
