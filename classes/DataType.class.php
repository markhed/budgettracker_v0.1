<?php
abstract class DataType {
	protected $code;
	
	function __construct($argCode) {
		$this->setCode($argCode);
	}
	
	function __destruct() {
	}
		
	public function getCode() {
		return $this->code;
	}

	public function getValue() {
		echo "<p>NOT IMPLEMENTED<p>";
	}
	
	protected function setCode($argCode) {
		$this->code = $argCode;
	}
	
	public function setCodeByValue($argValue) {
		echo "<p>NOT IMPLEMENTED<p>";
	}
}
?>
