<?php
class Outflow extends CashFlow {
//These are items that reduce the cash available. They are either (a) fixed or planned, (b) to be paid by the user or by another party (which will automatically create an equivalent Inflow item), (c) periodic or one-off, (d) ownered or not. 
	private $unitAmount; //int
	private $totalUnits; //int
	private $outstUnits; //int
	
	//field name of attributes
	const _TABLE = "OUTFLOW";
	const _unitAmount = "UNITAMT";
	const _totalUnits = "TTLUNIT";
	const _outstUnits = "OUTUNIT";
	
	public function deleteDB() {
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_DELETE_SQL($array, self::_TABLE));

		if ($result) {
			return true;
		}
		else {
			echo "<p>-DELETE FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
		}
		
		return false;
	}
	
	public function getOutstUnits() {
		return $this->outstUnits;
	}

	public function getTotalUnits() {
		return $this->totalUnits;
	}
	
	public function getUnitAmount() {
		return $this->unitAmount;
	}
		
	public function insertDB() {
		if (!$this->isStored()) {
			$this->setID(generateUniqueIDFromTable(self::_TABLE)); //assigns a unique key
			$this->setCreationDate(new Date(getCurrentDateString()));
			$budgetCycleID = $this->getBudgetCycleID();
			$ownerID = $this->getOwnerID();
			$budgetTypeCode = $this->getBudgetTypeCode();
			$flowTypeCode = $this->getFlowTypeCode();
			$statusCode = $this->getStatusCode();
			$creationDateString = $this->getCreationDateString();
			
			$array = array($this::_ID => $this->ID,
						   $this::_title => $this->title,
						   $this::_outstAmount => $this->outstAmount,
						   $this::_unitAmount => $this->unitAmount,
						   $this::_totalUnits => $this->totalUnits,
						   $this::_outstUnits => $this->outstUnits,
						   $this::_budgetCycleID => $budgetCycleID, 
						   $this::_budgetTypeCode => $budgetTypeCode,
						   $this::_flowTypeCode => $flowTypeCode,
						   $this::_statusCode => $statusCode,
						   $this::_comment => $this->comment,
						   $this::_creationDate => $creationDateString,
						   $this::_ownerID => $ownerID,
						   $this::_subType => $this::_subTypeValue
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
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_SELECT_SQL($array, self::_TABLE));
	
		if (($result != false) and (mysql_num_rows($result) > 0)) {
			$contentDB = mysql_fetch_array($result);
			
			$this->setBudgetTypeByCode($contentDB[$this::_budgetTypeCode]);
			$this->setComment($contentDB[$this::_comment]);
			$this->setCreationDate(new Date($contentDB[$this::_creationDate]));
			$this->setOutstAmount($contentDB[$this::_outstAmount]);
			$this->setTitle($contentDB[$this::_title]);
			$this->setFlowTypeByCode($contentDB[$this::_flowTypeCode]);
			$this->setStatusByCode($contentDB[$this::_statusCode]);
			$this->setOutstUnits($contentDB[$this::_outstUnits]);
			$this->setTotalUnits($contentDB[$this::_totalUnits]);
			$this->setUnitAmount($contentDB[$this::_unitAmount]);
			
			//keys
			$this->setBudgetCycle(new BudgetCycle($contentDB[$this::_budgetCycleID]));
			$this->setOwner(new Owner($contentDB[$this::_ownerID]));
			
			$this->setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	public function setOutstUnits($argOutstUnits) {
		$this->outstUnits = $argOutstUnits;
	}
	
	public function setTotalUnits($argTotalUnits) {
		$this->totalUnits = $argTotalUnits;
	}
	
	public function setUnitAmount($argUnitAmount) {
		$this->unitAmount = $argUnitAmount;
	}
	
	public function setValues($argBudgetCycle, $argBudgetType, $argOwner,
							  $argOutflowType, $argUnitAmount, $argTotalUnits,
							  $argTitle, $argComment) {
		$this->setBudgetCycle($argBudgetCycle);
		$this->setBudgetType($argBudgetType);
		$this->setOwner($argOwner);
		$this->setOutflowType($argOutflowType);
		$this->setUnitAmount($argUnitAmount);
		$this->setTotalUnits($argTotalUnits);
		$this->setTitle($argTitle);
		$this->setComment($argComment);
		$this->setCreationDate(date("y.m.d"));
	}
	
	public function updateDB() {
		$budgetCycleID = $this->getBudgetCycleID();
		$ownerID = $this->getOwnerID();
		$budgetTypeCode = $this->getBudgetTypeCode();
		$flowTypeCode = $this->getFlowTypeCode();
		$statusCode = $this->getStatusCode();
		
		$array = array($this::_title => $this->title,
					   $this::_outstAmount => $this->outstAmount,
					   $this::_unitAmount => $this->unitAmount,
					   $this::_totalUnits => $this->totalUnits,
					   $this::_outstUnits => $this->outstUnits,
					   $this::_budgetCycleID => $budgetCycleID,
					   $this::_budgetTypeCode => $budgetTypeCode,
					   $this::_flowTypeCode => $flowTypeCode,
					   $this::_statusCode => $statusCode,
					   $this::_comment => $this->comment,
					   $this::_ownerID => $ownerID
					  );
		$array2 = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_UPDATE_SQL($array, $array2, self::_TABLE));

		if ($result) {
			return true;
		}
		else {		
			echo "<p>-UPDATE FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
		}
		
		return false;
	}
}
?>