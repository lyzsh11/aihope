<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>推荐老师</title>
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
		<div class="left_tag">老师ID(拼音即可,如WangChengXia)：</div>
        <input class="right_input" type=text size=20 name=path value="<?php echo $_POST["path"] ?>" /><br>
    </div>
    <input class="button" style="margin-top:10px" type="submit" name="fileupload" value="上传" />
	</form>
    <form class="box_upload_all" action="deal_add.php" method=POST>
	<div class="box_in">
    	<div class="left_tag">老师姓名:</div>
        <input class="right_input" type=text size=20 name=teacher_name />
    </div>
	<div class="box_in">
    	<div class="left_tag">老师ID<small>(拼音即可,如WangChengXia):</small></div>
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
    	<div class="left_tag">银行账号:</div>
        <input class="right_input" type=text size=100 name=bankacc />
    </div>
    <div class="box_in">
    	<div class="left_tag">开户银行名称:</div>
        <input class="right_input" type=text size=100 name=bankname />
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
