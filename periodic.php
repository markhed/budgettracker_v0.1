<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	process_POST($manager);
	
	$periodicInflows = $manager->getPeriodicInflows();
	$periodicOutflows = $manager->getPeriodicOutflows();
	$owners =  $manager->getOwners();
	$budgetTypeOptions = BudgetType::getOptions();
	$flowTypeOptions = FlowType::getOptions();
	$statusOptionsIn = Status::getOptions("inflow");
	$statusOptionsOut = Status::getOptions("outflow");
	
	$smarty->assign('arrPeriodicInflows', $periodicInflows);
	$smarty->assign('arrPeriodicOutflows', $periodicOutflows);
	$smarty->assign('arrOwners', $owners);
	$smarty->assign('arrBudgetTypeOptions', $budgetTypeOptions);
	$smarty->assign('arrFlowTypeOptions', $flowTypeOptions);
	$smarty->assign('arrStatusOptionsIn', $statusOptionsIn);
	$smarty->assign('arrStatusOptionsOut', $statusOptionsOut);
	$smarty->display('periodic.tpl');
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
			else if ($index1 == "periodicInflow") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$periodicInflow = new PeriodicInflow($index);
								
								if (!TEST($periodicInflow)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$periodicInflow = new PeriodicInflow(NULL);
									$periodicInflow->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$periodicInflow->setTitle($value2['title'][$index]);
							$periodicInflow->setOwner(new Owner($value2['owner'][$index]));
							$periodicInflow->setOutstAmount($value2['outstAmount'][$index]);
							$periodicInflow->setReceivedAmount($value2['receivedAmount'][$index]);
							$periodicInflow->setBudgetTypeByValue($value2['budgetType'][$index]);
							$periodicInflow->setComment($value2['comment'][$index]);
							$periodicInflow->setStartDate($value2['startDate'][$index]);
							$periodicInflow->setSpecificDay($value2['specificDay'][$index]);
							$periodicInflow->setSpecificDate($value2['specificDate'][$index]);
							$periodicInflow->setPeriod($value2['period'][$index]);
							WRITE($periodicInflow);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$periodicInflow = new PeriodicInflow($ID);
							DELETE($periodicInflow);
						}
					}
				}
			}
			else if ($index1 == "periodicOutflow") {
				foreach ($value1 as $index2 => $value2) {
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$periodicOutflow = new PeriodicOutflow($index);
								
								if (!TEST($periodicOutflow)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$periodicOutflow = new PeriodicOutflow(NULL);
									$periodicOutflow->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$periodicOutflow->setTitle($value2['title'][$index]);
							$periodicOutflow->setOwner(new Owner($value2['owner'][$index]));
							$periodicOutflow->setOutstAmount($value2['outstAmount'][$index]);
							$periodicOutflow->setUnitAmount($value2['unitAmount'][$index]);
							$periodicOutflow->setTotalUnits($value2['totalUnits'][$index]);
							$periodicOutflow->setOutstUnits($value2['outstUnits'][$index]);
							$periodicOutflow->setBudgetTypeByValue($value2['budgetType'][$index]);
							$periodicOutflow->setComment($value2['comment'][$index]);
							$periodicOutflow->setStartDate($value2['startDate'][$index]);
							$periodicOutflow->setSpecificDay($value2['specificDay'][$index]);
							$periodicOutflow->setSpecificDate($value2['specificDate'][$index]);
							$periodicOutflow->setPeriod($value2['period'][$index]);
							WRITE($periodicOutflow);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$periodicOutflow = new PeriodicOutflow($ID);
							DELETE($periodicOutflow);
						}
					}
				}
			}
		}
	}
}
?>