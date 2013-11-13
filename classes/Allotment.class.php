<?php
class Allotment extends Owner {
	protected $currentAmount; //int
	protected $targetAmount; //int
	protected $targetDate; //date
	
	//field name of attributes
	const _TABLE = "ALLTMNT";
	const _currentAmount = "CURAMT";
	const _targetAmount = "TGTAMT";
	const _targetDate = "TGTDATE";
	
	const _subTypeValue = "3";
	
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
	
	public function getCurrentAmount() {
		return $this->currentAmount;
	}
	
	public function getTargetAmount() {
		return $this->targetAmount;
	}
		
	public function getTargetDate() {
		return $this->targetDate;
	}
	
	public function setCurrentAmount($argCurrentAmount) {
		$this->currentAmount = $argCurrentAmount;
	}
	
	public function setTargetAmount($argTargetAmount) {
		$this->targetAmount = $argTargetAmount;
	}
	
	public function setTargetDate($argTargetDate) {
		$this->targetDate = $argTargetDate;
	}

	public function insertDB() {
		if (parent::insertDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_currentAmount => $this->currentAmount,
						   $this::_targetAmount => $this->targetAmount,
						   $this::_targetDate => $this->targetDate
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
				
				$this->setCurrentAmount($contentDB[$this::_currentAmount]);
				$this->setTargetAmount($contentDB[$this::_targetAmount]);
				$this->setTargetDate($contentDB[$this::_targetDate]);
				
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
			
			$array = array($this::_currentAmount => $this->currentAmount,
						   $this::_targetAmount => $this->targetAmount,
						   $this::_targetDate => $this->targetDate
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
