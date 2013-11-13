<?php
require_once("header.php");
if (!loggedIn()) {
	$smarty->display('signup.tpl');
}
else {
	redirect("main.php");
}
?>