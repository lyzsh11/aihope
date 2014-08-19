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
    <head>
    	<link href="css/css_table.css" rel="stylesheet" type="text/css"/>
    </head>
	<body style="margin:0 0">
    <iframe src="header.html" scrolling="no" height="150px" width="100%" frameborder="0"></iframe>
	<form class="box_out" action="" method=POST>
	<div class="box_in">
    	<div class="left_tag">文章标题：</div>
        <input class="right_input" type=text size=20 name=title />
    </div>
	<!--tr><td align=right>文章英文网址:</td><td><input type=text size=20 name=path value="article1"/></td></tr-->
	<div class="box_in">
    	<div class="left_tag">文章分类:</div>
        <select name=articletype>
			<option name=articletype value=1>教育</option>
			<option name=articletype value=2>社会</option>
		</select>
    </div>
    <div class="box_in">
    	<div class="left_tag">图片链接：</div>
        <input class="right_input" type=text size=100 name=piclink value="http://www.aihope.org/web/pic/heart.jpg" />
    </div>
    <div class="box_in">
    	<div class="left_tag">微信链接：</div>
        <input class="right_input" type=text size=100 name=link />
    </div>
	<input class="button" style="margin-left:20px" type=submit name=addarticle />
	</form>
	</body>
	</html>
<?php
}
?>
