<?php
class Inflow extends CashFlow {
//These are items that increase the cash available. They are either (a)awaiting or received.
	private $receivedAmount; //int
	
	//field name of attributes
	const _TABLE = "INFLOW";
	const _receivedAmount = "RECAMT";
	
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
	
	public function getReceivedAmount() {
		return $this->receivedAmount;
	}
	
	public function insertDB() {
		if (!$this->isStored()) {
			$this->setID(generateUniqueIDFromTable(self::_TABLE)); //assigns a unique key
			$this->setCreationDate(new Date(getCurrentDateString()));
			$budgetCycleID = $this->getBudgetCycleID();
			$ownerID = $this->getOwnerID();
			$periodicMasterID = $this->getPeriodicMasterID();
			$budgetTypeCode = $this->getBudgetTypeCode();
			$flowTypeCode = $this->getFlowTypeCode();
			$statusCode = $this->getStatusCode();
			$creationDateString = $this->getCreationDateString();
			
			$array = array($this::_ID => $this->ID,
						   $this::_budgetCycleID => $budgetCycleID,
						   $this::_budgetTypeCode => $budgetTypeCode,
						   $this::_ownerID => $ownerID,
						   $this::_outstAmount => $this->outstAmount,
						   $this::_title => $this->title,
						   $this::_comment => $this->comment,
						   $this::_creationDate => $creationDateString,
						   $this::_flowTypeCode => $flowTypeCode,
						   $this::_statusCode => $statusCode,
						   $this::_receivedAmount => $this->receivedAmount,
						   $this::_subType => $this::_subTypeValue,
						   $this::_periodicMasterID => $periodicMasterID
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
			$this->setReceivedAmount($contentDB[$this::_receivedAmount]);
		
			//keys
			$this->setBudgetCycle(new BudgetCycle($contentDB[$this::_budgetCycleID]));
			$this->setOwner(new Owner($contentDB[$this::_ownerID]));
			$this->setPeriodicMaster(new PeriodicInflow($contentDB[$this::_periodicMasterID]));
			
			$this->setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	public function setReceivedAmount($argReceivedAmount) {
		$this->receivedAmount = $argReceivedAmount;
	}
	
	public function setValues($argBudgetCycle, $argBudgetType, $argOwner,
							  $argFlowType, $argStatus, $argReceivedAmount,
							  $argTitle, $argComment) { //add type hinting later on, use the setter methods too
		$this->setBudgetCycle($argBudgetCycle);
		$this->setBudgetType($argBudgetType);
		$this->setOwner($argOwner);
		$this->setFlowType($argFlowType);
		$this->setReceivedAmount($argReceivedAmount);
		$this->setStatus($argStatus);
		$this->setTitle($argTitle);
		$this->setComment($argComment);
		$this->setCreationDate(date("y.m.d"));
	}
	
	public function updateDB() {
		$budgetCycleID = $this->getBudgetCycleID();
		$ownerID = $this->getOwnerID();
		$periodicMasterID = $this->getPeriodicMasterID();
		$budgetTypeCode = $this->getBudgetTypeCode();
		$flowTypeCode = $this->getFlowTypeCode();
		$statusCode = $this->getStatusCode();
		
		$array = array($this::_title => $this->title,
					   $this::_outstAmount => $this->outstAmount,
					   $this::_budgetCycleID => $budgetCycleID,
					   $this::_budgetTypeCode => $budgetTypeCode,
					   $this::_comment => $this->comment,
					   $this::_ownerID => $ownerID,
					   $this::_flowTypeCode => $flowTypeCode,
					   $this::_statusCode => $statusCode,
					   $this::_receivedAmount => $this->receivedAmount,
					   $this::_periodicMasterID => $periodicMasterID
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