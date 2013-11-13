<?php
class Group extends Entity { // CANCELLED - owner is used instead
	//private $inflowItems; //array Inflow
	//private $outflowItems; //array Outflow
	private $budgetCycle; //class BudgetCycle
	private $master; //class GroupMaster
	
	//field name of attributes
	const _TABLE = "GRP"; 
	const _budgetCycleID = "BGTCYCLEID"; //class BudgetCycle
	const _masterID = "GRPMASTERID"; //class GroupMaster

	public function getBudgetCycle() {
		if ($this->budgetCycle != NULL) {
			TEST($this->budgetCycle);
			return $this->budgetCycle;
		}
		
		return NULL;
	}
	
	protected function getBudgetCycleID() {
		if ($this->budgetCycle != NULL) {
			return $this->budgetCycle->getID();
		}
		
		return NULL;
	}
	
	public function getInflows() {
		if (parent::isStored()) {
			$array = array(Inflow::_groupID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, Inflow::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$inflows = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$inflow = new Inflow($contentDB['ID']);
					if (TEST($inflow)) {
						$inflows[] = $inflow;
					}
				}
				
				return $inflows;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Inflow::_TABLE." -FIELD:".Inflow::_groupID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getMaster() {
		if ($this->master != NULL) {
			TEST($this->master);
			return $this->master;
		}
		
		return NULL;
	}
	
	protected function getMasterID() {
		if ($this->master != NULL) {
			return $this->master->getID();
		}
		
		return NULL;
	}
	
	public function getOutflows() {
		if (parent::isStored()) {
			$array = array(Outflow::_budgetCycleID => $this->ID);	
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
	
	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			$budgetCycleID = $this->getBudgetCycleID();
			$masterID = $this->getMasterID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_budgetCycleID => $budgetCycleID,
						   $this::_masterID => $masterID
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
		
		if (($result != false) and (mysql_num_rows($result) > 0)){
			$contentDB = mysql_fetch_array($result);
			
			$this->setBudgetCycle(new BudgetCycle($contentDB[$this::_budgetCycleID]));
			$this->setMaster(new GroupMaster($contentDB[$this::_masterID]));
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	protected function setBudgetCycle(BudgetCycle $argBudgetCycle) {
		$this->budgetCycle = $argBudgetCycle;
	}
	
	protected function setMaster(Master $argMaster) {
		$this->master = $argMaster;
	}
	
	public function setValues($argBudgetCycle, $argMaster) {
		$this->setBudgetCycle($argBudgetCycle);
		$this->setMaster($argMaster);
	}
	
	public function updateDB() {
		$budgetCycleID = $this->getBudgetCycleID();
		$masterID = $this->getMasterID();
		
		$array = array($this::_budgetCycleID => $budgetCycleID,
					   $this::_masterID => $masterID
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
