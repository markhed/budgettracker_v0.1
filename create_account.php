<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	$account = new BudgetAccount(NULL);
	
	$account->setValues($manager, $_POST['outstAmount'], $_POST['title'], $_POST['accountNum'], $_POST['status']);
	if (WRITE($account)) {
		echo "<p>Account has been created. Redirecting...<p>";
		redirectMeta("accounts.php", 1);
	}
	else {
		echo "<p>x Account creation failed x<p>";
	}
}
else {
	redirect("index.php");
}
?>