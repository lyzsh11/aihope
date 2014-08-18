<?php
$path="../";
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
	require("loginform.php");
} else {
	//TODO: 检查用户的权限  

	if(isset($_POST["addarticle"])) {
		require_once ($path."db.php");
		$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or die;
		@mysql_select_db($dbname);
		$sql="insert into article (title, type, pic, link, create_time) values ('"
			.$_POST["title"]
			."', "
			.$_POST["articletype"]
			.", '"
			.$_POST["pic"]
			."', '"
			.$_POST["link"]
			."', NOW())";
		$dbres = mysql_query($sql, $db_con);
	        if (!$dbres) {
	                echo "$sql 插入数据库失败: ".mysql_error()."<br>\n";
		}

		mysql_close($db_con);
	}
?>
	<html>
	<body>
	<form action="" method=POST>
	<table>
	<tr><td align=right>文章标题:</td><td><input type=text size=20 name=title /> </td></tr>
	<!--tr><td align=right>文章英文网址:</td><td><input type=text size=20 name=path value="article1"/></td></tr-->
	<tr><td align=right>文章分类:</td><td><select name=articletype>
		<option name=articletype value=1>教育</option>
		<option name=articletype value=2>社会</option>
	</select>
</td></tr>
	<tr><td align=right>图片链接:</td><td><input type=text size=100 name=piclink value="http://www.aihope.org/web/pic/heart.jpg" /> </td></tr>
	<tr><td align=right>微信链接:</td><td><input type=text size=100 name=link /> </td></tr>
	<tr><td align=right>
		<input type=submit name=addarticle />
	</td><td></td></tr>
	</table>
	</body>
	</html>
<?php
}
?>
