<?php
class Party extends Owner {
	protected $firstName; //int
	protected $lastName; //int
	//future enhancement - link to other users
	
	//field name of attributes
	const _TABLE = "PARTY";
	const _firstName = "FNAME";
	const _lastName = "LNAME";
	
	const _subTypeValue = "1";
	
	public function deleteDB() {
		if (parent::deleteDB()) {
			$array = array($this::_ID => $this->ID);
			$result = mysql_query(OUT_DELETE_SQL($array, self::_TABLE));
	
			if ($result) {
				return true;
			}
			else {
				echo "<p>-DELETE FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function getLastName() {
		return $this->lastName;
	}
	
	public function setFirstName($argFirstName) {
		$this->firstName = $argFirstName;
	}
	
	public function setLastName($argLastName) {
		$this->lastName = $argLastName;
	}

	public function insertDB() {
		if (parent::insertDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_firstName => $this->firstName,
						   $this::_lastName => $this->lastName
						  );
			$result = mysql_query(OUT_INSERT_SQL($array, self::_TABLE));

			if ($result) {
				return true;
			}
			else {
				echo "<p>-INSERT FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
	
	public function loadDB() {
		if (parent::loadDB()) {
			$array = array($this::_ID => $this->ID);
			$result = mysql_query(OUT_SELECT_SQL($array, $this::_TABLE));
			
			if (($result != false) and (mysql_num_rows($result) > 0)) {
				$contentDB = mysql_fetch_array($result);
				
				$this->setFirstName($contentDB[$this::_firstName]);
				$this->setLastName($contentDB[$this::_lastName]);
				
				return true;
			}
			else {
				echo "<p>-LOAD FAIL -TABLE:".$self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}

		return false;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function updateDB() {
		if (parent::updateDB()) {
			$managerID = $this::getManagerID();
			
			$array = array($this::_firstName => $this->firstName,
						   $this::_lastName => $this->lastName
						  );
			$array2 = array($this::_ID => $this->ID);		
			$result = mysql_query(OUT_UPDATE_SQL($array, $array2, $this::_TABLE));
			
			if ($result) {
				return true;
			}
			else {		
				echo "<p>-UPDATE FAIL -TABLE:".$self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
}
?>
