<?php
require_once("header.php");

if (loggedIn()) {
	if (isset($_GET['selectedCycleID'])) {
		$manager = $_SESSION['manager'];
		$cycle = new BudgetCycle($_GET['selectedCycleID']);
		
		if (TEST($cycle) and ($manager->isSame($cycle->getManager()))) {
			if (isSubmitted('submit') or isSubmitted('delete')) {
				process_POST($cycle, $manager);
			}
			$inflows = $cycle->getInflows();
			$outflows = $cycle->getOutflows();
			$startDate = $cycle->getStartDate();
			$endDate = $cycle->getEndDate();
			$dailyOutflows = $manager->getDailyOutflows();
			$dailyOutflowSum = 0;
			
			foreach ($dailyOutflows as $dailyOutflow) {
				$dailyOutflowSum += $dailyOutflow->getUnitAmount() * $dailyOutflow->getTotalUnits();
			}
			
			$today = new Date();
	
			if ($today->getTimestamp() >= $startDate->getTimestamp() 
				&& $today->getTimestamp() <= $endDate->getTimestamp()) { // this comparison is invalid - make a new method that compares the two objects
				$differenceInterval = $today->diff($endDate); //parameter is the subtrahend
			}
			else {
				$differenceInterval = $startDate->diff($endDate);
			}
			
			if ($differenceInterval->invert == 1) {
				$remainingDays = 0;
			}
			else {
				$remainingDays = $differenceInterval->format('%d') + 1;
			}
			
			$owners =  $manager->getOwners();
			$accounts = $manager->getAccounts();
			$cashOnHand = $manager->getCashOnHand();
			
			$budgetTypeOptions = BudgetType::getOptions();
			$flowTypeOptions = FlowType::getOptions();
			$statusOptionsIn = Status::getOptions("inflow");
			$statusOptionsOut = Status::getOptions("outflow");

			$smartyVariables = array('arrInflows' => $inflows,
									 'arrOutflows' => $outflows,
									 'arrOwners' => $owners,
									 'arrAccounts' => $accounts,
									 'cashOnHand' => $cashOnHand,
									 'arrBudgetTypeOptions' => $budgetTypeOptions,
									 'arrFlowTypeOptions' => $flowTypeOptions,
									 'arrStatusOptionsIn' => $statusOptionsIn,
									 'arrStatusOptionsOut' => $statusOptionsOut,
									 'cycle' => $cycle,
									 'startDate' => $startDate,
									 'endDate' => $endDate,
									 'remainingDays' => $remainingDays,
									 'dailyOutflowSum' => $dailyOutflowSum
									);
									 
			foreach ($smartyVariables as $smartyVariable => $variable) {
				$smarty->assign($smartyVariable, $variable);
			}
			$smarty->display('view_cycle.tpl');
		}
		else {
			redirect("main.php");
		}
	}
	else {
		redirect("main.php");
	}
}
else {
	redirect("index.php");
}
?>

<?php //functions used by this page
function process_POST($argCycle, $argManager) {
	foreach ($_POST as $index1 => $value1) {
		if (!is_array($value1)) {
		}
		else if ($index1 == "inflow") {
			foreach ($value1 as $index2 => $value2) {
				if (!is_array($value2)) {
					continue;
				}
				else if ($index2 == "new" or $index2 == "current")  {
					foreach ($value2['index'] as $ID) {
						if ($index2 == "current") {
							$inflow = new Inflow($ID);
							if (!TEST($inflow)) {
								continue;
							}
						}
						else {
							if ($value2['title'][$ID] != "") {
								$inflow = new Inflow(NULL);
								$inflow->setBudgetCycle($argCycle);
							}
							else {
								continue;
							}
						}
						
						$inflow->setTitle($value2['title'][$ID]);
						$inflow->setOwner(new Owner($value2['owner'][$ID]));
						$inflow->setOutstAmount($value2['outstAmount'][$ID]);
						$inflow->setReceivedAmount($value2['receivedAmount'][$ID]);
						$inflow->setBudgetTypeByValue($value2['budgetType'][$ID]);
						$inflow->setFlowTypeByValue($value2['flowType'][$ID]);
						$inflow->setStatusByValue($value2['status'][$ID]);
						$inflow->setComment($value2['comment'][$ID]);
						WRITE($inflow);
					}
				}
				else if ($index2 == "delete")  {
					foreach ($value2 as $ID) {
						$inflow = new Inflow($ID);
						DELETE($inflow);
					}
				}
			}
		}
		else if ($index1 == "outflow") {
			foreach ($value1 as $index2 => $value2) {
				if (!is_array($value2)) {
					continue;
				}
				else if ($index2 == "new" or $index2 == "current")  {
					foreach ($value2['index'] as $ID) {
						if ($index2 == "current") {
							$outflow = new Outflow($ID);
							if (!TEST($outflow)) {
								continue;
							}
						}
						else {
							if ($value2['title'][$ID] != "") {
								$outflow = new Outflow(NULL);
								$outflow->setBudgetCycle($argCycle);
							}
							else {
								continue;
							}
						}
						
						$outflow->setTitle($value2['title'][$ID]);
						$outflow->setOwner(new Owner($value2['owner'][$ID]));
						$outflow->setOutstAmount($value2['outstAmount'][$ID]);
						$outflow->setUnitAmount($value2['unitAmount'][$ID]);
						$outflow->setTotalUnits($value2['totalUnits'][$ID]);
						$outflow->setOutstUnits($value2['outstUnits'][$ID]);
						$outflow->setBudgetTypeByValue($value2['budgetType'][$ID]);
						$outflow->setFlowTypeByValue($value2['flowType'][$ID]);
						$outflow->setStatusByValue($value2['status'][$ID]);
						$outflow->setComment($value2['comment'][$ID]);
						WRITE($outflow);
					}
				}
				else if ($index2 == "delete")  {
					foreach ($value2 as $ID) {
						$outflow = new Outflow($ID);
						DELETE($outflow);
					}
				}
			}
		}
		else if ($index1 == 'account') {
			foreach ($value1 as $ID => $amount) {
				$account = new BudgetAccount($ID);
				
				if (!TEST($account)) {
					continue;
				}
				
				$account->setCurrentAmount($amount);
				WRITE($account);
			}
		}
		else if ($index1 == 'cashOnHand') {
			$argManager->setCashOnHand($value1);
			WRITE($argManager);
		}					
	}
}
?>