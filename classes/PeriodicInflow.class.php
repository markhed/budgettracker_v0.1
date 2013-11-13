<?php
class PeriodicInflow extends Inflow {
	use isPeriodic;
	const _subTypeValue = "1";
	
	//table fieldnames
	const _TABLE = "PRDINFLOW";
	const _startDate = "STDATE";
	const _specificDay = "SPDAY";
	const _specificDate = "SPDATE";
	const _period = "PERIOD";
	const _managerID = "MANAGERID";
	
	public function deleteDB() {
		if (parent::deleteDB()) {
			$array = array($this::_ID => $this->ID);
			$result = mysql_query(OUT_DELETE_SQL($array, self::_TABLE));
	
			if ($result) {
				return true;
			}
			else {
				echo "<p>-DELETE FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
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
	
	public function insertDB() {
		if (parent::insertDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_startDate => $this->startDate,
						   $this::_specificDay => $this->specificDay,
						   $this::_specificDate => $this->specificDate,
						   $this::_period => $this->period,
						   $this::_managerID => $managerID
						  );
			$result = mysql_query(OUT_INSERT_SQL($array, self::_TABLE));

			if ($result) {
				return true;
			}
			else {
				echo "<p>-INSERT FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
	
	public function loadDB() {
		if (parent::loadDB()) {
			$array = array($this::_ID => $this->ID);
			$result = mysql_query(OUT_SELECT_SQL($array, $this::_TABLE));
			
			if (($result != false) and (mysql_num_rows($result) > 0)) {
				$contentDB = mysql_fetch_array($result);
				
				$this->setStartDate($contentDB[$this::_startDate]);
				$this->setSpecificDay($contentDB[$this::_specificDay]);
				$this->setSpecificDate($contentDB[$this::_specificDate]);
				$this->setPeriod($contentDB[$this::_period]);
				$this->setManager(new BudgetManager($contentDB[$this::_managerID]));
				
				return true;
			}
			else {
				echo "<p>-LOAD FAIL -TABLE:".$self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}

		return false;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function updateDB() {
		if (parent::updateDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_startDate => $this->startDate,
						   $this::_specificDay => $this->specificDay,
						   $this::_specificDate => $this->specificDate,
						   $this::_period => $this->period,
						   $this::_managerID => $managerID
						  );
			$array2 = array($this::_ID => $this->ID);		
			$result = mysql_query(OUT_UPDATE_SQL($array, $array2, $this::_TABLE));
			
			if ($result) {
				return true;
			}
			else {		
				echo "<p>-UPDATE FAIL -TABLE:".$self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
}
?>