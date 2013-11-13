<?php
class BudgetCycle extends Entity {
	use hasStatus;
	
	//private $outflowItems; //array Outflow
	//private $inflowItems; //array Inflow
	//private $groups; //array Group
	private $manager; //class BudgetManager
	private $dailyOutflow; //class DailyOutflow
	private $dispensableAmount; //int
	private $totalRemOutflow; //int
	private $totalIncurredOutflow; //int
	private $totalActualInflow; //int
	private $startDate; //Date
	private $endDate; //Date
	
	//field name of attributes
	const _TABLE = "BGTCYCLE"; 
	const _managerID = "MANAGERID";
	const _dailyOutflowID = "DAILYOUTID";
	const _dispensableAmount = "DISPAMT";
	const _totalRemOutflow = "TTLREMOUT";
	const _totalIncurredOutflow = "TTLINCOUT";
	const _totalActualInflow = "TTLACTIN";
	const _startDate = "STRTDATE";
	const _endDate = "ENDDATE";
	const _statusCode = "STATUSCD";
	
	public function deleteDB() {
		if (parent::deleteDB()) {
			$array = array(Inflow::_budgetCycleID => $this->ID);	//delete linked inflows
			$result = mysql_query(OUT_DELETE_SQL($array, Inflow::_TABLE));
	
			if ($result) {
				$array = array(Outflow::_budgetCycleID => $this->ID); 	//delete linked outflows
				$result = mysql_query(OUT_DELETE_SQL($array, Outflow::_TABLE));
				
				if ($result) {
					return true;
				}
				else {
					echo "<p>-DELETE FAIL -OUTFLOWS OF CYLE -ID:".$this->getID()."<p>";
				}
			}
			else {
				echo "<p>-DELETE FAIL -INFLOWS OF CYLE -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
	
	public function getDailyOutflow() {
		if ($this->dailyOutflow != NULL) {
			TEST($this->dailyOutflow);
			return $this->dailyOutflow;
		}
		
		return NULL;
	}
	
	protected function getDailyOutflowID() {
		if ($this->dailyOutflow != NULL) {
			return $this->dailyOutflow->getID();
		}
		
		return NULL;
	}
	
	public function getDispensableAmount() {
		return $this->dispensableAmount;
	}

	public function getEndDate() {
		return $this->endDate;
	}
	
	public function getEndDateString() {
		if ($this->endDate != NULL) {
			return $this->endDate->formatSQL();
		}
		
		return NULL;
	}
	
	public function getGroups() {
		if (parent::isStored()) {
			$array = array(Group::_budgetCycleID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, Group::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$groups = array();
				
				for($i = 0; $i < $numOfItems; $i++) {
					$contentDB = mysql_fetch_array($result);
					$group = new Group($contentDB['ID']);
					if (TEST($group)) {
						$groups[] = $group;
					}
				}
				
				return $groups;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Group::_TABLE." -FIELD:".Group::_budgetCycleID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getInflows() {
		if (parent::isStored()) {
			$array = array(Inflow::_budgetCycleID => $this->ID,
						   Inflow::_subType => Inflow::_subTypeValue);	
			$result = mysql_query(OUT_SELECT_SQL($array, Inflow::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$inflows = array();
				
				for($i = 0; $i < $numOfItems; $i++) {
					$contentDB = mysql_fetch_array($result);
					$inflow = new Inflow($contentDB['ID']);
					if (TEST($inflow)) {
						$inflows[] = $inflow;
					}
				}
				
				return $inflows;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Inflow::_TABLE." -FIELD:".Inflow::_budgetCycleID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}

	public function getManager() {
		if ($this->manager != NULL) {
			TEST($this->manager);
			return $this->manager;
		}
		
		return NULL;
	}
	
	protected function getManagerID() {
		if ($this->manager != NULL) {
			return $this->manager->getID();
		}
		
		return NULL;
	}
	
	public function getOutflows() {
		if (parent::isStored()) {
			$array = array(Outflow::_budgetCycleID => $this->ID,
						   Outflow::_subType => Outflow::_subTypeValue);	
			$result = mysql_query(OUT_SELECT_SQL($array, Outflow::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$outflows = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$outflow = new Outflow($contentDB['ID']);
					if (TEST($outflow)) {
						$outflows[] = $outflow;
					}
				}
				
				return $outflows;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Outflow::_TABLE." -FIELD:".Outflow::_budgetCycleID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}

	public function getStartDate() {
		return $this->startDate;
	}
	
	public function getStartDateString() {
		if ($this->startDate != NULL) {
			return $this->startDate->formatSQL();
		}
		
		return NULL;
	}
	
	public function getTotalActualInflow() {
		return $this->totalActualInflow;
	}
	
	public function getTotalIncurredOutflow() {
		return $this->totalIncurredOutflow;
	}
	
	public function getTotalRemOutflow() {
		return $this->totalRemOutflow;
	}

	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			$managerID = $this->getManagerID();
			$dailyOutflowID = $this->getDailyOutflowID();
			$statusCode = $this->getStatusCode();
			$startDateString = $this->getStartDateString();
			$endDateString = $this->getEndDateString();
			$array = array($this::_ID => $this->ID,
						   $this::_managerID => $managerID,
						   $this::_dailyOutflowID => $dailyOutflowID,
						   $this::_dispensableAmount => $this->dispensableAmount,
						   $this::_totalRemOutflow => $this->totalRemOutflow,
						   $this::_totalIncurredOutflow => $this->totalIncurredOutflow,
						   $this::_totalActualInflow => $this->totalActualInflow,
						   $this::_startDate => startDateString,
						   $this::_endDate => endDateString,
						   $this::_statusCode => $statusCode
						  );
			$result = mysql_query(OUT_INSERT_SQL($array, $this::_TABLE));
			
			if ($result) {
				return true;
			}
			else {
				echo "<p>-INSERT FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
			
		return false;
	}
	
	public function loadDB() {
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_SELECT_SQL($array, $this::_TABLE));
		
		if (($result != false) and (mysql_num_rows($result) > 0)) {
			$contentDB = mysql_fetch_array($result);
			
			$this->setManager(new BudgetManager($contentDB[$this::_managerID]));
			$this->setDailyOutflow(new DailyOutflow($contentDB[$this::_dailyOutflowID]));
			$this->setDispensableAmount($contentDB[$this::_dispensableAmount]);
			$this->setTotalRemOutflow($contentDB[$this::_totalRemOutflow]);
			$this->setTotalIncurredOutflow($contentDB[$this::_totalIncurredOutflow]);
			$this->setTotalActualInflow($contentDB[$this::_totalActualInflow]);
			$this->setStartDate(new Date($contentDB[$this::_startDate]));
			$this->setEndDate(new Date($contentDB[$this::_endDate]));
			$this->setStatusByCode($contentDB[$this::_statusCode]);
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	public function setDailyOutflow(DailyOutflow $argDailyOutflow) {
		$this->dailyOutflow = $argDailyOutflow;
	}
	
	public function setDispensableAmount($argDispensableAmount) {
		$this->dispensableAmount = $argDispensableAmount;
	}
	
	public function setEndDate(Date $argEndDate) {
		$this->endDate = $argEndDate;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function setStartDate(Date $argStartDate) {
		$this->startDate = $argStartDate;
	}
	public function setTotalActualInflow($argTotalActualInflow) {
		$this->totalActualInflow = $argTotalActualInflow;
	}	
	
	public function setTotalIncurredOutflow($argTotalIncurredOutflow) {
		$this->totalIncurredOutflow = $argTotalIncurredOutflow;
	}
	
	public function setTotalRemOutflow($argTotalRemOutflow) {
		$this->totalRemOutflow = $argTotalRemOutflow;
	}
	
	public function updateDB() {
		$managerID = $this->getManagerID();
		$dailyOutflowID = $this->getDailyOutflowID();
		$statusCode = $this->getStatusCode();
		$startDateString = $this->getStartDateString();
		$endDateString = $this->getEndDateString();
			
		$array = array($this::_managerID => $managerID, 
					   $this::_dailyOutflowID => $dailyOutflowID, 
					   $this::_dispensableAmount => $this->dispensableAmount, 
					   $this::_totalRemOutflow => $this->totalRemOutflow, 
					   $this::_totalIncurredOutflow => $this->totalIncurredOutflow, 
					   $this::_totalActualInflow => $this->totalActualInflow, 
					   $this::_startDate => $startDateString, 
					   $this::_endDate => $endDateString,
					   $this::_statusCode => $statusCode
					  );
		$array2 = array($this::_ID => $this->ID);		
		$result = mysql_query(OUT_UPDATE_SQL($array, $array2, $this::_TABLE));
				
		if ($result) {
			return true;
		}
		else {		
			echo "<p>-UPDATE FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}
		
		return false;
	}
}

?>
