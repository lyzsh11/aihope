<?php
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
?>
	<html>
	<body>
	<form action="deal_login.php" method=POST>
	<table>
	<tr><td>用户名:</td><td><input type=text size=16 name=id /> </td></tr>
	<tr><td>密码:</td><td><input type=password size=16 name=passwd /> </td></tr>
	</table>
	<input type=submit name=reg />
	<br><br>
	尚无用户？<a href="register.php">点此注册</a>
	</form>
	</body>
	</html>
<?php
} else {
	require("ucenter.php");
}
?>
