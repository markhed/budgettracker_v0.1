<?php
class BudgetAccount extends Entity {
//These are the places where the user’s money is stored. All created accounts are shown in the budget cycle unless otherwise set. 
	use hasStatus;
	
	private $manager; //class BudgetManager
	private $currentAmount; //int
	private $title; //string
	private $accountNum; //int
	
	//field name of attributes
	const _TABLE = "BGTACCNT"; 
	const _managerID = "MANAGERID";
	const _currentAmount = "CURAMT";
	const _title = "TITLE";
	const _accountNum = "ACCNUM";
	const _statusCode = "STATUSCD";
	
	public function getAccountNum() {
		return $this->accountNum;
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
	
	public function getCurrentAmount() {
		return $this->currentAmount;
	}
	
	public function getStatus() {
		return $this->status;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			$managerID = $this->getManagerID();
			$statusCode = $this->getStatusCode();
			
			$array = array($this::_ID => $this->ID,
						   $this::_managerID => $managerID,
						   $this::_currentAmount => $this->currentAmount,
						   $this::_title => $this->title,
						   $this::_accountNum => $this->accountNum,
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
			$this->setCurrentAmount($contentDB[$this::_currentAmount]);
			$this->setTitle($contentDB[$this::_title]);
			$this->setAccountNum($contentDB[$this::_accountNum]);
			$this->setStatusByCode($contentDB[$this::_statusCode]);
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	public function setAccountNum($argAccountNum) {
		$this->accountNum = $argAccountNum;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function setCurrentAmount($argCurrentAmount) {
		$this->currentAmount = $argCurrentAmount;
	}
		
	public function setStatus($argStatus) {
		$this->status = $argStatus;
	}
	
	public function setTitle($argTitle) {
		$this->title = $argTitle;
	}
	
	public function setValues(BudgetManager $argManager, $argCurrentAmount, $argTitle, $argAccountNum, $argStatus) {
		$this->setManager($argManager);
		$this->setCurrentAmount($argCurrentAmount);
		$this->setTitle($argTitle);
		$this->setAccountNum($argAccountNum);
		$this->setStatus($argStatus);
	}
	
	public function updateDB() {
		$managerID = $this->getManagerID();
		$statusCode = $this->getStatusCode();
		
		$array = array($this::_managerID => $managerID, 
					   $this::_currentAmount => $this->currentAmount,
					   $this::_title => $this->title,
					   $this::_accountNum => $this->accountNum,
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
