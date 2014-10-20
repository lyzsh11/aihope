<?php
    $path="../";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>爱心帮首页</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/index.css" rel="stylesheet" type="text/css"/>

</head>

<body style="background-color:#dddddd; margin:0 0">
<div class="box_out">
	<iframe src="header.php" height="167px" width="100%" scrolling="no" frameborder="0"></iframe>
    <div class="content_in">
    	<div class="left">
    	<div class="title_bar">
        	<div class="title_text">那些身边的人</div>
            <div class="more"><a href="give.php">更多...</a></div>
        </div>
        <div class="left_content">
            <?php
            require_once ($path."db.php") ; 
            $db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or $my_err = true;
            @mysql_select_db($dbname);
            //$sql="insert into teacher (name,create_time) values (\"测试3\",CURTIME())";
            $sql="select * from teacher";
            $dbres = mysql_query($sql, $db_con);
            $n=0;
            $f=0;
            while($teacher = (mysql_fetch_array($dbres))) {
                if ($n==0) {
                    $n ++;
                    continue;
                }
                if ($f == 0 && $teacher['pic'] != null) {
                    echo '<div class="content_list_detail">';
                    echo '<div class="content_image"><a href="'.$teacher['url'].'"><img src="'.$teacher['pic'].'" width="150px" height="120px"/></a></div>';
                    echo '<div class="content_detail">';
                    echo '<div class="content_detail_title">';
                    echo '<a href="'.$teacher['url'].'">'.$teacher['name'].'老师</a>';
                    echo '</div>';
                    echo '<div class="content_detail_in">';
                    echo '<a href="'.$teacher['url'].'">'.$teacher['info'].'</a>';
                    echo '</div></div></div>';
                    $f=1;
                 }
                else {
                    echo '<div class="content_list">';
                    echo '<div class="content_list_title">';
                    echo '<a href="'.$teacher['url'].'">'.$teacher['name'].'老师</a>';
                    echo '</div>';
                    echo '<div class="content_list_commit">';
                    echo '<a href="'.$teacher['url'].'">by '.$teacher['recommender'].'</a>';
                    echo '</div></div>';
                }
                $n ++;
                if ($n > 5) break;
            }

            mysql_close($db_con);
        ?>
       	    
    	</div>
    </div>
    <div class="right">
        <iframe src="wx.php" height="500px" width="460px" scrolling="no" frameborder="0"></iframe>
    </div>
</div>
<iframe src="footer.php" height="160px" width="100%" scrolling="no" frameborder="0"></iframe>
</body>
</html>
