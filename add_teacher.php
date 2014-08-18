<?php
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
	require("loginform.php");
} else {
	//TODO: 检查用户的权限  

	if(isset($_POST["fileupload"])) {
	    //print_r($_FILES);
	    $uploaddir = '/usr/share/nginx/html/v1/'.$_POST["path"];
	    $error = 0;
	    mkdir($uploaddir);
	    $filename = basename($_FILES['userfile']['name']);
	    $uploadfile = "$uploaddir/$filename";

	    //echo '<pre>';
	    date_default_timezone_set('Asia/Chongqing');
	    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		echo "上传成功，可在 <a href=\"http://www.aihope.org/web/".$_POST["path"]."/$filename\">这里</a>访问<br>\n";
	    } else {
		print_r(error_get_last());
		echo $_FILES['userfile']['tmp_name']."=>$uploadfile 文件上传失败\n";
		$error = 1;
	    }

	    echo '<!--Here is some more debugging info:';
	    print_r($_FILES);
	    echo '-->';
 
	}
?>
	<html>
	<body>
	<form enctype="multipart/form-data" action="" method=POST>
	上传图片资源：<input name="userfile" type="file" /><br>
	需上传到的目录名(如写wcx)：<input type=text size=20 name=path value="<?php echo $_POST["path"] ?>" /><br>
    	<input type="submit" name="fileupload" value="上传" />
	</form>
	<hr><br>
	<form action="deal_add.php" method=POST>
	<table>
	<tr><td align=right>老师名:</td><td><input type=text size=20 name=teacher_name /> </td></tr>
	<tr><td align=right>网站url目录名(如wcx):</td><td><input type=text size=20 name=path /></td></tr>
	<tr><td align=right>捐赠链接:</td><td><input type=text size=100 name=shopurl value="http://wd.koudai.com/?userid=208388189" /> </td></tr>
	<tr><td align=right>图片链接:</td><td><input type=text size=100 name=piclink value="http://www.aihope.org/web/wcx/teaching1.jpg" /> </td></tr>
	<tr><td align=right>执教地点:</td><td><input type=text size=100 name=position /> </td></tr>
	<tr><td align=right>事迹摘要:</td><td><input type=text size=100 name=summary /> </td></tr>
	<tr><td align=right>事迹链接:</td><td><input type=text size=100 name=link /> </td></tr>
	<tr><td align=right>或文字描述:</td><td><textarea cols=100 rows=20 name=content></textarea> </td></tr>
	<tr><td align=right><input type=checkbox checked name="usehtml" /></td><td>文中使用了html标签(请自行保证语法正确性)</td></tr>
	<tr><td align=right>
	<input type=submit name=addteacher />
	</td><td></td></tr>
	</table>
	</body>
	</html>
<?php
}
?>
