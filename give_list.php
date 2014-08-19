<?php
	$path="../";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>捐赠列表</title>
<link href="css/css_give_list.css" rel="stylesheet" type="text/css">
</head>

<body style="margin:0 0">
<iframe src="header.html" scrolling="no" height="120px" width="100%" frameborder="0"></iframe>
<div class="box_in">
	<div class="text_small" style="margin-left:10px">> 可捐助列表</div>
    <!--form class="box_select" action="#" method="get">
    	<div class="text_tag">捐助类型：</div>
    	<select style="width:100px; margin-left:10px; float:left">
        	<option>乡村教师</option>
        </select>
        <div class="text_tag" style="margin-left:80px">排序方式：</div>
        <select style="width:100px; margin-left:10px; float:left">
        	<option>时间</option>
            <option>捐助人数</option>
        </select>
        <div class="text_tag" style="margin-left:80px">关键字：</div>
        <input type="text" style="float:left; margin-left:10px; margin-top:2px; height:14px; width:100px" name="lastname" />
        <input type="submit" class="button_style" style="margin-left:80px" value="我要搜索"/>
    </form-->
			<?php
				require_once ($path."db.php") ; 
				$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or $my_err = true;
				@mysql_select_db($dbname);
				//$sql="insert into teacher (name,create_time) values (\"测试3\",CURTIME())";
				$sql="select * from teacher";
				$dbres = mysql_query($sql, $db_con);
				while($teacher = (mysql_fetch_array($dbres))) {
					echo "<div class=\"box_news\">\n";
        				echo '<div class="text_head_small">';
					echo '<a href="'.$teacher['url'].'">'.$teacher['name'].'老师</a>';
					if ($teacher['recommender'] != 'admin') {
						echo "(网友".$teacher['recommender']."推荐)";
					}
              				echo '<a href="'.$teacher['shopurl'].'"><div class="button_given" style="float:right; margin-top:-6px">我来帮TA</div></a>';
					echo "</div>\n";
        				echo '<a href="'.$teacher['url'].'"><img src="'.$teacher['pic'].'" height="100px" width="100px" style="margin-top:20px; float:left"/></a> <a href="'.$teacher['url'].'"><div class="text_content">'.$teacher['info'].'</div></a>';
					echo "</div>\n";
				}

				mysql_close($db_con);
	?>
    <!--div class="box_news">
        <div class="text_head_small">
            <a href="detail.html">采访王成霞老师的录像</a>
              <a href="#"><div class="button_given" style="float:right; margin-top:-6px">我来帮TA</div></a>
        </div>
        <a href="detail.html"><img src="#" height="100px" width="100px" style="margin-top:20px; float:left"/></a>
        <a href="detail.html"><div class="text_content">具体内容</div></a>
    </div-->
</body>
</html>
