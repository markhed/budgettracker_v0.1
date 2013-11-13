<?php
require_once("header.php");

//$smarty->assign('person', $_POST['']);
if (!loggedIn()) {
	$user = new User(NULL);
	$manager = new BudgetManager(NULL);
	
	if (WRITE($manager)) { //manager is assigned with ID
		$user->setValues($_POST['accountLogin'], $_POST['password'], $_POST['firstName'],
								  $_POST['lastName'], $_POST['email'], $manager);
	
		if (WRITE($user)) {
			$_SESSION['user'] = $user;
			$_SESSION['manager'] = $manager;
			
			echo "<p>User has been created. Redirecting...<p>";
			redirectMeta("main.php", 2);
		}
		else {
			DELETE($manager);
			echo "<p>x User creation failed x<p>";
		}
	}
	else {
		echo "<p>x User creation failed - Manager assignment failed x<p>";
	}
}
else {
	redirect("main.php");
}
?>