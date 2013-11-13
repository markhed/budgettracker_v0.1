<?php
trait hasStatus {
	protected $status; //class Status
	
	public function getStatus() {
		return $this->status;
	}
	
	protected function getStatusCode() { //for DB purposes
		if ($this->status != NULL) {
			return $this->status->getCode();
		}
		
		return NULL;
	}
	
	public function getStatusValue() { //for display
		if ($this->status != NULL) {
			return $this->status->getValue();
		}
		
		return NULL;
	}
	
	public function setStatus(Status $argStatus) {
		$this->status = $argStatus;
	}
	
	protected function setStatusByCode($argCode) {  //for DB purposes
		$this->status = new Status($argCode);
	}
	
	public function setStatusByValue($argValue) {
		$status = new Status(NULL);
		$status->setCodeByValue($argValue);
		$this->status = $status;
	}
}

?>