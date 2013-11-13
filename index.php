<?php
require_once("header.php");

if (!loggedIn()) {
	$smarty->display('index.tpl');
}

else {
	redirect("main.php");
}
?>