<?php
class Date extends DateTime {
	public function formatSQL() {
		return $this->format('Y-m-d');
	}
}
?>
