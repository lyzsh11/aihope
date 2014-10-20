<?php
$path="../";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="css/wx.css" rel="stylesheet" type="text/css"/>
<script src="js/show_hide.js"></script>
</head>

<body style="margin:0 0">
<div class="weixix_box_out">
 	<div class="weixin_title_bar">
    	<div class="weixin_titie_text">微信消息</div>
        <div class="weixin_more" onmouseover="show('weixin_erweima')">
        	<a onclick="show('weixin_erweima')">加入我们</a>
        </div>
    </div>
    <div class="weixin_select_box">
    	<a href="?t=0"><div class="weixin_select_in">
        	全部
        </div></a>
        <a href="?t=1"><div class="weixin_select_in">
        	教育
        </div></a>
        <a href="?t=2"><div class="weixin_select_in">
        	社会
        </div></a>
    </div>
    <div class="weixin_content_box seamless allowStop">
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
				echo '<div class="weixin_content_in"> <a href="'.$article["link"].'" target="_blank">'.$article["title"].'</a></div>';       
	}
		?>
    </div>
</div>
<div id="weixin_erweima" onmouseout="hide('weixin_erweima')">
	<img src="image/erweima.jpg" />
</div>
</body>
<script type="text/javascript">
(function(c){
var obj=document.getElementsByTagName("div");
var _l=obj.length;
var o;
for(var i=0;i<_l;i++){
o=obj[i];
var n2=o.clientHeight;
var n3=o.scrollHeight;
o.s=0;
if(o.className.indexOf(c)>=0){
if(n3<=n2){return false;}
var delay=parseInt(o.getAttribute("delay"),10);
if(isNaN(delay)){delay=100;}
if(o.className.indexOf("allowStop")>=0){
o.onmouseover=function(){this.Stop=true;}
o.onmouseout=function(){this.Stop=false;}
}
giveInterval(autoRun,delay,o);
//关键之处！！
o.innerHTML=o.innerHTML+o.innerHTML;
}
}
//注册函数
function giveInterval(funcName,time){var args=[];for(var i=2;i<arguments.length;i++){args.push(arguments[i]);}return window.setInterval(function(){funcName.apply(this,args);},time);}
function autoRun(o,s){
if(o.Stop==true){return false;}
var n1=o.scrollTop;
var n3=o.scrollHeight;
o.s++;
o.scrollTop=o.s;
if(n1>=n3/2){
o.scrollTop=0;
o.s=0;
}
}
})('seamless')
</script>
</html>