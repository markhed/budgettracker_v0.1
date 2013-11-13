<?php
class Status extends DataType {
	static function getOptions($argType) {
		$options = array();
		
		if ($argType == "cycle") {
			$options[] = 'Incoming';
		}
		
		if ($argType == "inflow") {
			$options[] = 'Awaiting';
		}
		
		if ($argType == "inflow") {
			$options[] = 'Received';
		}
		
		if ($argType == "outflow") {
			$options[] = 'Outstanding';
		}
		
		if ($argType == "outflow") {
			$options[] = 'Incurred';
		}		
		
		if ($argType == "account" or $argType == "cycle") {
			$options[] = 'Active';
		}
		
		if ($argType == "account") {
			$options[] = 'Inactive';
		}
		
		if ($argType == "cycle") {
			$options[] = 'Archived';
		}
		
		if ($argType == "inflow" or $argType == "outflow") {
			$options[] = 'Deferred';
		}
		
		if ($argType == "inflow" or $argType == "outflow") {
			$options[] = 'Cancelled';
		}
		return $options;
	}
	
	public function getValue() {
		switch ($this->code) {
			case 'A':
				return "Awaiting";
			case 'B':
				return "Incurred";
			case 'C':
				return "Active";
			case 'D':
				return "Cancelled";
			case 'F':
				return "Deferred";
			case 'H':
				return "Archived";
			case 'I':
				return "Inactive";
			case 'N':
				return "Incoming";
			case 'O':
				return "Outstanding";
			case 'R':
				return "Received";
			default:
				return "NONE";
		}	
	}
	
	public function setCodeByValue($argValue) {
		switch ($argValue) {
			case 'Active':
				$this->setCode('C');
				break;
			case 'Archived':
				$this->setCode('H');
				break;
			case 'Awaiting':
				$this->setCode('A');
				break;
			case 'Cancelled':
				$this->setCode('D');
				break;
			case 'Deferred':
				$this->setCode('F');
				break;
			case 'Inactive':
				$this->setCode('I');
				break;
			case 'Incoming':
				$this->setCode('N');
				break;
			case 'Incurred':
				$this->setCode('B');
				break;
			case 'Outstanding':
				$this->setCode('O');
				break;
			case 'Received':
				$this->setCode('R');
				break;
			default:
				$this->setCode('X');
				break;
		}
	}
}

?>
