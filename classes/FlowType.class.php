<?php
class FlowType extends DataType{
	static function getOptions() {
		$options = array('One-off', 'Periodic');
		
		return $options;
	}
	
	public function getValue() {
		switch ($this->code) {
			case 'P':
				return "Periodic";
			case 'O':
				return "One-off";
			default:
				return "none";
		}	
	}
	
	public function setCodeByValue($argValue) {
		switch ($argValue) {
			case 'Periodic':
				$this->setCode('P');
				break;
			case 'One-off':
				$this->setCode('O');
				break;
			default:
				$this->setCode('X');
				break;
		}
	}
}

?>
