<?php
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
	require("loginform.php");
} else {
?>
	<html>
	<body>
	<form action="deal_add" method=POST>
	<table>
	<tr><td>老师名:</td><td><input type=text size=16 name=teacher_name /> </td></tr>
	<tr><td>事迹链接:</td><td><input type=text size=100 name=link /> </td></tr>
	</table>
	<input type=submit name=addteacher />
	<br><br>
	</form>
	</body>
	</html>
<?php
}
?>
