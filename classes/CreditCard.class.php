<?php
class CreditCard extends Owner {
	protected $bank; //string
	protected $cutOffDate; //date
	protected $dueDate; //date
	protected $accountNum; //int
	protected $creditLimit; //int
	
	//field name of attributes
	const _TABLE = "CCARD";
	const _bank = "BANK";
	const _cutOffDate = "CUTDATE";
	const _dueDate = "DUEDATE";
	const _accountNum = "ACCNT";
	const _creditLimit = "CLIMIT";
	
	const _subTypeValue = "2";
	
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
	
	public function getAccountNum() {
		return $this->accountNum;
	}
	
	public function getBank() {
		return $this->bank;
	}
		
	public function getCreditLimit() {
		return $this->creditLimit;
	}
	
	public function getCutOffDate() {
		return $this->cutOffDate;
	}
	
	public function getDueDate() {
		return $this->dueDate;
	}
	
	public function insertDB() {
		if (parent::insertDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_bank => $this->bank,
						   $this::_cutOffDate => $this->cutOffDate,
						   $this::_dueDate => $this->dueDate,
						   $this::_accountNum => $this->accountNum,
						   $this::_creditLimit =>  $this->creditLimit
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
				
				$this->setBank($contentDB[$this::_bank]);
				$this->setCutOffDate($contentDB[$this::_cutOffDate]);
				$this->setDueDate($contentDB[$this::_dueDate]);
				$this->setAccountNum($contentDB[$this::_accountNum]);
				$this->setCreditLimit($contentDB[$this::_creditLimit]);
				
				return true;
			}
			else {
				echo "<p>-LOAD FAIL -TABLE:".$self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}

		return false;
	}
	
	public function setAccountNum($argAccountNum) {
		$this->accountNum = $argAccountNum;
	}
	
	public function setBank($argBank) {
		$this->bank = $argBank;
	}
	
	public function setCreditLimit($argCreditLimit) {
		$this->creditLimit = $argCreditLimit;
	}
	
	public function setCutOffDate($argCutOffDate) {
		$this->cutOffDate = $argCutOffDate;
	}
	
	public function setDueDate($argDueDate) {
		$this->dueDate = $argDueDate;
	}

	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function updateDB() {
		if (parent::updateDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_bank => $this->bank,
						   $this::_cutOffDate => $this->cutOffDate,
						   $this::_dueDate => $this->dueDate,
						   $this::_accountNum => $this->accountNum,
						   $this::_creditLimit => $this->creditLimit
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
