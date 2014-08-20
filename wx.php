<?php
$path="../";
?>
<head>
<meta cearset="utf-8">
<link href="css/css_header.css" rel="stylesheet" type="text/css">
<link href="css/css_main.css" rel="stylesheet" type="text/css">
</head>
<body>
    <a href="?t=1" class="tag">教育</a>
    <a href="?t=2" class="tag">社会</a>
    <a href="?t=0" class="tag">全部</a>
<br>
<br>
<br>
<?php
	require_once ($path."db.php") ;
	$db_con = @mysql_connect($dbhost, $dbuser, $dbpasswd) or $my_err = true;
	@mysql_select_db($dbname);
	$sql="select * from article";
	if(isset($_GET["t"]) && $_GET["t"] > 0) {
		$sql = $sql." where type=".$_GET["t"];
	}
	$dbres = mysql_query($sql, $db_con);
	while($article = (mysql_fetch_array($dbres))) {
		echo '<a target="_blank" href="'.$article["link"].'"><div class="text_content_wx">'.$article["title"].'</div></a>';
	}
?>
</body>
