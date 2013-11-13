<?php
trait isPeriodic {
	protected $startDate; //int
	protected $specificDay; //int
	protected $specificDate; //int
	protected $period; //string
	protected $manager; //class BudgetManager
	
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
	
	public function getPeriod() {
		return $this->period;
	}
	
	public function getSpecificDay() {
		return $this->specificDay;
	}
	
	public function getSpecificDate() {
		return $this->specificDate;
	}
	
	public function getStartDate() {
		return $this->startDate;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function setPeriod($argPeriod) {
		$this->period = $argPeriod;
	}
	public function setSpecificDate($argSpecificDate) {
		$this->specificDate = $argSpecificDate;
	}
	
	public function setSpecificDay($argSpecificDay) {
		$this-> specificDay = $argSpecificDay;
	}
	
	public function setStartDate($argStartDate) {
		$this->startDate = $argStartDate;
	}
}
?>