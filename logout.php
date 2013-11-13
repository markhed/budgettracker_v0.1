<?php
require_once("header.php");

if (loggedIn()) {
	session_unset();
	session_destroy();
	redirect("index.php");
}
else {
	redirect("index.php");
}
?>