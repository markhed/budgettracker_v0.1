<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	process_POST($manager);
	
	$allotments = $manager->getAllotments();
	
	$smarty->assign('arrAllotments', $allotments);
	$smarty->display('allotments.tpl');
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
			else if ($index1 == "allotment") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$allotment = new Allotment($index);
								
								if (!TEST($allotment)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$allotment = new Allotment(NULL);
									$allotment->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$allotment->setTitle($value2['title'][$index]);
							$allotment->setComment($value2['comment'][$index]);
							$allotment->setCurrentAmount($value2['currentAmount'][$index]);
							$allotment->setTargetAmount($value2['targetAmount'][$index]);
							$allotment->setTargetDate($value2['targetDate'][$index]);
							WRITE($allotment);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$allotment = new Allotment($ID);
							DELETE($allotment);
						}
					}
				}
			}
		}
	}
}
?>