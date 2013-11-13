<?php
trait hasFlowType {
	protected $flowType; //class FlowType
	
	public function getFlowType() {
		return $this->flowType;
	}
	
	protected function getFlowTypeCode() { //for DB purposes
		if ($this->flowType != NULL) {
			return $this->flowType->getCode();
		}
		
		return NULL;
	}
	
	public function getFlowTypeValue() { //for display
		if ($this->flowType != NULL) {
			return $this->flowType->getValue();
		}
		
		return NULL;
	}
	
	public function setFlowType(FlowType $argFlowType) {
		$this->flowType = $argFlowType;
	}
	
	protected function setFlowTypeByCode($argCode) {
		$this->flowType = new FlowType($argCode);
	}
	
	public function setFlowTypeByValue($argValue) {
		$flowType = new FlowType(NULL);
		$flowType->setCodeByValue($argValue);
		$this->flowType = $flowType;
	}
}

?>