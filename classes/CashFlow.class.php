<?php
abstract class CashFlow extends Entity {
	use hasBudgetType;
	use hasFlowType;
	use hasStatus;
	
	protected $budgetCycle; //class BudgetCycle
	protected $periodicMaster; //class moneyflow
	protected $owner; //class Owner
	protected $outstAmount; //int
	protected $title; //string
	protected $comment; //string
	protected $creationDate; //int
	
	//field names of attributes
	const _budgetCycleID = "BGTCYCLEID";
	const _budgetTypeCode = "BGTTYPECD";
	const _periodicMasterID = "PRDMASTERID";
	const _ownerID = "OWNERID";
	const _flowTypeCode = "FTYPECD";
	const _outstAmount = "OUTAMT";
	const _title = "TITLE";
	const _comment = "COMMENT";
	const _creationDate = "CRTNDATE";
	const _statusCode = "STATUSCD";
	const _subType = "SUBTYPE";
	
	const _subTypeValue = "0";
	
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
	
	public function getComment() {
		return $this->comment;
	}
	
	public function getCreationDate() {
		return $this->creationDate;
	}

	public function getCreationDateString() {
		if ($this->creationDate != NULL) {
			return $this->creationDate->formatSQL();
		}
		
		return NULL;
	}
	
	public function getOutstAmount() {
		return $this->outstAmount;
	}
	
	public function getOwner() {
		if ($this->owner != NULL) {
			TEST($this->owner);
			return $this->owner;
		}
		
		return NULL;
	}
	
	public function getOwnerID() {
		if ($this->owner != NULL) {
			return $this->owner->getID();
		}
		
		return NULL;
	}
	
	public function getPeriodicMaster() {
		if ($this->periodicMaster != NULL) {
			TEST($this->periodicMaster);
			return $this->periodicMaster;
		}
		
		return NULL;
	}
	
	protected function getPeriodicMasterID() {
		if ($this->periodicMaster != NULL) {
			return $this->periodicMaster->getID();
		}
		
		return NULL;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function setBudgetCycle(BudgetCycle $argBudgetCycle) {
		$this->budgetCycle = $argBudgetCycle;
	}
	
	public function setComment($argComment) {
		$this->comment = $argComment;
	}
	
	protected function setCreationDate(Date $argCreationDate) {
		$this->creationDate = $argCreationDate;
	}
	
	public function setOutstAmount($argOutstAmount) {
		$this->outstAmount = $argOutstAmount;
	}
	
	public function setOwner(Owner $argOwner) {
		$this->owner = $argOwner;
	}
	
	public function setPeriodicMaster(CashFlow $argPeriodicMaster) {
		$this->periodicMaster = $argPeriodicMaster;
	}
	
	public function setTitle($argTitle) {
		$this->title = $argTitle;
	}
}
?>