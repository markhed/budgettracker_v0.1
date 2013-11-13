<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];

	process_POST($manager);
	
	$cycles = $manager->getCycles();
	$statusOptions = Status::getOptions("cycle");
	$smarty->assign('arrCycles', $cycles);
	$smarty->assign('arrStatusOptions', $statusOptions);
	$smarty->display('budgetcycles.tpl');
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
			}
			else if ($index1 == "cycle") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$cycle = new BudgetCycle($index);
								if (!TEST($cycle)) {
									continue;
								}
							}
							else {
								if (($value2['startDate'][$index] != "") and ($value2['endDate'][$index] != "")) {
									$cycle = new BudgetCycle(NULL);
									$cycle->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$cycle->setStartDate(new Date($value2['startDate'][$index]));
							$cycle->setEndDate(new Date($value2['endDate'][$index]));
							$cycle->setStatusByValue($value2['status'][$index]);
							WRITE($cycle);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$cycle = new BudgetCycle($ID);
							DELETE($cycle);
						}
					}
				}
			}
		}
	}
}
?>
