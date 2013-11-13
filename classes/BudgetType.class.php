<?php
class BudgetType extends DataType {
	static function getOptions() {
		$options = array('Actual', 'Planned');
		
		return $options;
	}
	
	public function getValue() {
		switch ($this->code) {
			case 'A':
				return "Actual";
			case 'P':
				return "Planned";
			default:
				return "none";
		}	
	}
	
	public function setCodeByValue($argValue) {
		switch ($argValue) {
			case 'Actual':
				$this->setCode('A');
				break;
			case 'Planned':
				$this->setCode('P');
				break;
			default:
				$this->setCode('X');
				break;
		}
	}
}

?>
