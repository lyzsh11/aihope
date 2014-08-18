<?php
//print_r($_COOKIE);
if(!isset($_COOKIE['userid'])) {
	require("loginform.php");
} else {
	require("jump.php");
}
?>
