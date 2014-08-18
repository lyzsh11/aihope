<?php
	$path="../";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>爱心帮首页</title>
<link href="css/css_main.css" rel="stylesheet" type="text/css">
<script src="js/jquery-2.1.1.min.js"></script>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<script src="js/bootstrap.min.js"></script>
</head>

<body style="margin:0 0">
<iframe src="header.html" scrolling="no" height="130px" width="100%" frameborder="0"></iframe>
<div class="box_in">
	<div class="left">
		<iframe src="left.html" scrolling="no" height="600px" width="100%" frameborder="0"></iframe>
	</div>
    <div class="middle_right">
    	<div class="middle">
    		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  			<!-- Indicators -->
  			<ol class="carousel-indicators">
    			<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    			<li data-target="#carousel-example-generic" data-slide-to="1"></li>
    			<li data-target="#carousel-example-generic" data-slide-to="2"></li>
  			</ol>

  			<!-- Wrapper for slides -->
  			<div class="carousel-inner" role="listbox">
			<?php
				require_once ($path."db.php") ; 
				$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or $my_err = true;
				@mysql_select_db($dbname);
				//$sql="insert into teacher (name,create_time) values (\"测试3\",CURTIME())";
				$sql="select * from teacher";
				$dbres = mysql_query($sql, $db_con);
				$active=" active";
				while($teacher = (mysql_fetch_array($dbres))) {
					echo "<div class=\"item".$active."\">\n";
					echo '<a href="'.$teacher['url'].'"><img src="'.$teacher['pic'].'" alt="'.$teacher['name'].'" /></a>';
					//echo '<a href="'.$teacher['url'].'"><img height=500 src="'.$path.'/pic/'.$teacher['pic'].'" alt="'.$teacher['name'].'"/></a>';
					echo "<div class=\"carousel-caption\"></div>\n";
					echo "</div>\n";
					$active="";
				}

				mysql_close($db_con);
			?>
			</div>

  			<!-- Controls -->
  			<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    			<span class="glyphicon glyphicon-chevron-left"></span>
    			<span class="sr-only">Previous</span>
  			</a>
  			<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    			<span class="glyphicon glyphicon-chevron-right"></span>
    			<span class="sr-only">Next</span>
  			</a>
			</div>
        
    	</div>
    	<div class="right">
    		<div class="text_head">微信那些事</div>
			<img src="image/bar.png"/>
            <a href="#" class="tag">社会</a>
            <a href="#" class="tag">教育</a>
    	</div>
    	<div class="middle_bottom">
        	<div class="text_head">那些身边的人和事</div>
            <div style="background:url(image/bar_long.png) repeat-x; height:5px; margin-top:5px"></div>
            <div class="box_news">
            	<a href="/web/WangChengXia/"><div class="text_head_small">采访王成霞老师的录像</div></a>
                <a href="http://v.youku.com/v_show/id_XNTgxOTE1NTgw.html"><div class="text_content">苗乡的呼唤</div></a>
            </div>
            <!--div class="box_news">
            	<div class="text_head_small">采访王成霞老师的录像</div>
                <div class="text_content">具体内容</div>
            </div-->
    	</div>
    </div>
</div>
</body>
</html>
