<?php
require_once("header.php");

if (loggedIn()) {
	$user = $_SESSION['user'];
	
	$smarty->assign('firstName', $user->getFirstName());
	$smarty->display('main.tpl');
}
else {
	redirect("index.php");
}
	
?>