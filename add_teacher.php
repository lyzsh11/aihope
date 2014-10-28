<?php
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
    $jumpdest = "add_teacher.php";
    require("register_login.php");
} else {
    //TODO: 检查用户的权限  

    $defaultpic = "http://www.aihope.org/web/wcx/teaching1.jpg";
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
        $defaultpic = "http://www.aihope.org/web/".$_POST["path"]."/".$filename;
        echo "上传成功，可在 <a href=\"$defaultpic\">这里</a>访问<br>\n";
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

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="css/addTeacher.css" rel="stylesheet" type="text/css"/>
</head>

<body style="background: #dddddd; margin:0 0">
<div class="box_out">
	<iframe src="header.php" height="167px" width="100%" scrolling="no" frameborder="0"></iframe>
    <div class="title">> 推荐老师</div>
    <form class="box_upload_image" enctype="multipart/form-data" action="" method=POST>
    <div class="box_in">
		<div class="left_tag">上传图片资源：</div>
        <input style="margin-top:10px" name="userfile" type="file" />
    </div>
    <div class="box_in">
		<div class="left_tag">需上传到的目录名(如wcx)：</div>
        <input class="right_input" type=text size=20 name=path value="<?php echo $_POST["path"] ?>" /><br>
    </div>
    <input class="button" style="margin-top:10px" type="submit" name="fileupload" value="上传" />
	</form>
    <form class="box_upload_all" action="deal_add.php" method=POST>
	<div class="box_in">
    	<div class="left_tag">老师名:</div>
        <input class="right_input" type=text size=20 name=teacher_name />
    </div>
	<div class="box_in">
    	<div class="left_tag">网站url目录名(如wcx):</div>
        <input class="right_input" type=text size=20 name=path value="<?php echo $_POST["path"] ?>" />
    </div>
	<div class="box_in">
    	<div class="left_tag">捐赠链接:</div>
        <input class="right_input" type=text size=100 name=shopurl value="http://wd.koudai.com/?userid=208388189" />
    </div>
	<div class="box_in">
    	<div class="left_tag">图片链接:</div>
        <input class="right_input" type=text size=100 name=piclink value="<?php echo $defaultpic ?>" />
    </div>
	<div class="box_in">
    	<div class="left_tag">执教地点:</div>
        <input class="right_input" type=text size=100 name=position />
    </div>
	<div class="box_in">
    	<div class="left_tag">事迹摘要:</div>
        <input class="right_input" type=text size=100 name=summary />
    </div>
	<div class="box_in">
    	<div class="left_tag">事迹链接:</div>
        <input class="right_input" type=text size=100 name=link />
    </div>
	<div class="box_without_height">
    	<div class="left_tag">或文字描述:</div>
        <textarea class="box_content" cols=100 rows=20 name=content></textarea>
    </div>
    <div class="box_in">
        <input style="float:left; margin-top:10px" type=checkbox name="usehtml" />
        <div class="text_small" style="float:left; margin-top:12px">文中使用了html标签(请自行保证语法正确性)</div>
    </div>
		<input class="button" type=submit name=addteacher />
    </form>
</div>
<iframe src="footer.php" height="160px" width="100%" scrolling="no" frameborder="0"></iframe>
</body>
</html>

<?php
}
?>