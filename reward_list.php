<?php
	$path="../";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>可捐赠列表</title>
<link href="css/give.css" rel="stylesheet" type="text/css"/>
<script src="js/ellipsis.js"></script>
</head>

<body style="background-color:#dddddd; margin:0 0"  onload="ellipsis('list_content_text', 'a')">
<div class="box_out">
	<iframe src="header.php" height="167px" width="100%" scrolling="no" frameborder="0"></iframe>
    <div class="box_in">
     	<div class="title_bar">
        	<div class="title_content">> 可捐赠列表</div>
            <img src="image/give_title_icon.png" class="title_image"/>
        </div>
        <?php
			require_once ($path."db.php") ; 
			$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or $my_err = true;
			@mysql_select_db($dbname);
			//$sql="insert into teacher (name,create_time) values (\"测试3\",CURTIME())";
			$sql="select * from teacher";
			$dbres = mysql_query($sql, $db_con);
			while($teacher = (mysql_fetch_array($dbres))) {
				echo "<div class=\"list_box\">\n";
        		echo '<div class="list_title_bar">';
				echo '<div class="list_title"><a href="'.$teacher['url'].'">'.$teacher['name'].'老师';
				if ($teacher['recommender'] != 'admin') {
					echo "（网友".$teacher['recommender']."推荐）";
				}
				echo '</a></div>';
              	echo '<a href="'.$teacher['shopurl'].'"><div class="list_button">我来帮TA</div></a>';
				echo "</div>\n";
				echo '<div class="list_content">';
        		echo '<a href="'.$teacher['url'].'"><img src="'.$teacher['pic'].'" class = "list_content_image"/></a> <div class="list_content_text"><a href="'.$teacher['url'].'">'.$teacher['info'].'</a></div>';
				echo "</div>\n</div>\n";
			}

			mysql_close($db_con);
		?>
    </div>
</div>
<iframe src="footer.php" height="160px" width="100%" scrolling="no" frameborder="0"></iframe>
</body>
</html>
