<?php
trait hasBudgetType {
	protected $budgetType; //class BudgetType
	
	public function getBudgetType() {
		return $this->budgetType;
	}
	
	protected function getBudgetTypeCode() { //for DB purposes
		if ($this->budgetType != NULL) {
			return $this->budgetType->getCode();
		}
		
		return NULL;
	}
	
	public function getBudgetTypeValue() { //for display
		if ($this->budgetType != NULL) {
			return $this->budgetType->getValue();
		}
		
		return NULL;
	}
	
	public function setBudgetType(BudgetType $argBudgetType) {
		$this->budgetType = $argBudgetType;
	}
	
	protected function setBudgetTypeByCode($argCode) {
		$this->budgetType = new BudgetType($argCode);
	}
	
	public function setBudgetTypeByValue($argValue) {
		$budgetType = new BudgetType(NULL);
		$budgetType->setCodeByValue($argValue);
		$this->budgetType = $budgetType;
	}
}

?>