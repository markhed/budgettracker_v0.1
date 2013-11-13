<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	process_POST($manager);
	
	$creditCards = $manager->getCreditCards();
	
	$smarty->assign('arrCreditCards', $creditCards);
	$smarty->display('creditCards.tpl');
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
			else if ($index1 == "creditCard") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$creditCard = new CreditCard($index);
								
								if (!TEST($creditCard)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$creditCard = new CreditCard(NULL);
									$creditCard->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$creditCard->setTitle($value2['title'][$index]);
							$creditCard->setComment($value2['comment'][$index]);
							$creditCard->setBank($value2['bank'][$index]);
							$creditCard->setCutOffDate($value2['cutOffDate'][$index]);
							$creditCard->setDueDate($value2['dueDate'][$index]);
							$creditCard->setAccountNum($value2['accountNum'][$index]);
							$creditCard->setCreditLimit($value2['creditLimit'][$index]);
							WRITE($creditCard);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$creditCard = new CreditCard($ID);
							DELETE($creditCard);
						}
					}
				}
			}
		}
	}
}
?>