<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	process_POST($manager);
	
	$accounts = $manager->getAccounts();
	$cashOnHand = $manager->getCashOnHand();
	$statusOptions = Status::getOptions("account");
	
	$smarty->assign('arrAccounts', $accounts);
	$smarty->assign('cashOnHand', $cashOnHand);
	$smarty->assign('arrStatusOptions', $statusOptions);
	$smarty->display('accounts.tpl');
}
else {
	redirect("index.php");
}
?>

<?php //functions used by this page
function process_POST($argManager) {
	if (isset($_POST)) {
		foreach ($_POST as $index1 => $value1) { 
			if (!is_array($value1)) {
				continue;
			}
			else if ($index1 == "account") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$account = new BudgetAccount($index);
								if (!TEST($account)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$account = new BudgetAccount(NULL);
									$account->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$account->setTitle($value2['title'][$index]);
							$account->setAccountNum($value2['accountNum'][$index]);
							$account->setCurrentAmount($value2['currentAmount'][$index]);
							$account->setStatusByValue($value2['status'][$index]);
							WRITE($account);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$account = new BudgetAccount($ID);
							DELETE($account);
						}
					}
				}
			}
			else if ($index1 == 'cashOnHand') {
				$argManager->setCashOnHand($value1);
				$updateManager = true;
				WRITE($argManager);
			}
		}
	}
}
?>