<?php
class DailyOutflow extends Entity {
	private $manager; //class BudgetManager
	private $title; //string
	private $comment; //string
	private $creationDate; //int
	private $unitAmount; //int
	private $totalUnits; //int
	
	//field name of attributes
	const _TABLE = "DOUTFLW";
	const _managerID = "MANAGERID";
	const _title = "TITLE";
	const _comment = "COMMENT";
	const _creationDate = "CRTNDATE";
	const _unitAmount = "UNITAMT";
	const _totalUnits = "TTLUNIT";
	
	public function getComment() {
		return $this->comment;
	}
	
	public function getCreationDate() {
		return $this->creationDate;
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
	
	public function getTitle() {
		return $this->title;
	}
	
	public function getTotalUnits() {
		return $this->totalUnits;
	}
	
	public function getUnitAmount() {
		return $this->unitAmount;
	}
	
	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			$managerID = $this->getManagerID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_managerID => $managerID,
						   $this::_title => $this->title,
						   $this::_comment => $this->comment,
						   $this::_creationDate => $this->creationDate,
						   $this::_unitAmount => $this->unitAmount,
						   $this::_totalUnits => $this->totalUnits
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
			$this->setTitle($contentDB[$this::_title]);
			$this->setComment($contentDB[$this::_comment]);
			$this->setCreationDate($contentDB[$this::_creationDate]);
			$this->setUnitAmount($contentDB[$this::_unitAmount]);
			$this->setTotalUnits($contentDB[$this::_totalUnits]);
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	public function setComment($argComment) {
		$this->comment = $argComment;
	}
	
	protected function setCreationDate($argCreationDate) {
		$this->creationDate = $argCreationDate;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function setTitle($argTitle) {
		$this->title = $argTitle;
	}
	
	public function setTotalUnits($argTotalUnits) {
		$this->totalUnits = $argTotalUnits;
	}
	
	public function setUnitAmount($argUnitAmount) {
		$this->unitAmount = $argUnitAmount;
	}
	
	public function updateDB() {
		$managerID = $this->getManagerID();
		
		$array = array($this::_managerID => $managerID,
					   $this::_title => $this->title,
					   $this::_comment => $this->comment,
					   $this::_creationDate => $this->creationDate,
					   $this::_unitAmount => $this->unitAmount,
					   $this::_totalUnits => $this->totalUnits
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