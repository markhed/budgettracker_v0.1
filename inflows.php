<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	if (isSubmitted('submit')) {
		//displayArray($_POST);
		
		foreach ($_POST['ID'] as $ID) {
			$currentAccount = new BudgetAccount($ID);
			if (TEST($currentAccount)) {
				$currentAccount->setTitle($_POST['title'][$ID]);
				$currentAccount->setAccountNum($_POST['accountNum'][$ID]);
				$currentAccount->setOutstAmount($_POST['outstAmount'][$ID]);
				$currentAccount->setStatus($_POST['status'][$ID]);
				WRITE($currentAccount);
			}
		}
		
		if (isSubmitted('newTitle')) {
			foreach ($_POST['newTitle'] as $index => $value) {
				if (($_POST['newTitle'][$index] != "") or ($_POST['newAccountNum'][$index] != "")) {
					$newAccount = new BudgetAccount(NULL);
					$newAccount->setTitle($_POST['newTitle'][$index]);
					$newAccount->setAccountNum($_POST['newAccountNum'][$index]);
					$newAccount->setOutstAmount($_POST['newOutstAmount'][$index]);
					$newAccount->setStatus($_POST['newStatus'][$index]);
					$newAccount->setManager($manager);
					WRITE($newAccount);
				}
			}
		}
	}
	
	else if (isSubmitted('delete')) {
		$currentAccount = new BudgetAccount($_POST['delete']);
		DELETE($currentAccount);
	}
	
	$accounts = $manager->getAccounts();
	$smarty->assign('arrAccounts', $accounts);
	$smarty->display('accounts.tpl');
}
else {
	redirect("index.php");
}
?>
