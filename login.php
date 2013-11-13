<?php
require_once("header.php");
if (!loggedIn()) {
	if (!empty($_POST)) {
		$user = new User(NULL);
		if ($user->loadByAccountAndPassword($_POST['accountLogin'], $_POST['password'])) {
			$manager = $user->getManager();
			if (TEST($manager)) {
				$_SESSION['user'] = $user;
				$_SESSION['manager'] = $manager;
				redirect("main.php");
			}
			else {
				echo "<p>x Loading user's manager failed x";
			}
		}
		else
			echo "<p>Login failed<p>";
			redirectMeta("index.php", 100);
	}
	else {
		redirect("index.php");
	}
}
else {
	redirect("main.php");
}
?>