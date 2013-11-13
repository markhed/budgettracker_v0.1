<?php
class Cash extends Entity {// CANCELLED - made as an attribute of BudgetManager instead
	private $manager; //class BudgetManager
	private $outstAmount; //int
	private $title = "Cash-on-Hand";
	private $status; //string - active or inactive
	
	function __construct() {
	}
	
	protected function setManager(Manager $argManager) {
		$this->manager = $argManager;
	}
	
	public function getManager() {
		return $this->manager;
	}
	
	protected function setTitle($argTitle) {
		$this->title = $argTitle;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	protected function setOutstAmount($argOutstAmount) {
		$this->outstAmount = $argOutstAmount;
	}
	
	public function getOutstAmount() {
		return $this->outstAmount;
	}
	
	protected function setStatus($argStatus) {
		$this->status = $argStatus;
	}
	
	public function getStatus() {
		return $this->status;
	}
}
?>