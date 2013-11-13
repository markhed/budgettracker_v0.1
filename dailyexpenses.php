<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	process_POST($manager);
	
	$dailyOutflows = $manager->getDailyOutflows();
	
	$smarty->assign('arrDailyOutflows', $dailyOutflows);
	$smarty->display('dailyexpenses.tpl');
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
			else if ($index1 == "dailyOutflow") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$dailyOutflow = new DailyOutflow($index);
								
								if (!TEST($dailyOutflow)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$dailyOutflow = new DailyOutflow(NULL);
									$dailyOutflow->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$dailyOutflow->setTitle($value2['title'][$index]);
							$dailyOutflow->setComment($value2['comment'][$index]);
							$dailyOutflow->setUnitAmount($value2['unitAmount'][$index]);
							$dailyOutflow->setTotalUnits($value2['totalUnits'][$index]);
							WRITE($dailyOutflow);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$dailyOutflow = new DailyOutflow($ID);
							DELETE($dailyOutflow);
						}
					}
				}
			}
		}
	}
}
?>