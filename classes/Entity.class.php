<?php
abstract class Entity { //abstract class for all classes that will be stored in the db
	protected $ID; //string - object key for db
	const _ID = "ID";
	const _TABLE = "TABLE"; //string - db table name
	private $loaded; //bool - flag to check if values are loaded from the db
	
	function __construct($argID) {
		$this->setID($argID);
	}
	
	function __destruct() {
	}
	
	public function deleteDB() { // this should be overloaded by parent and children classes that are db-linked
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_DELETE_SQL($array, $this::_TABLE));

		if ($result) {
			return true;
		}
		else {
			echo "<p>-DELETE FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}
		
		return false;
	}
	
	public function devSetID($argID) {
		$this->setID($argID);
	}
	
	public function getID() {
		return $this->ID;
	}
	
	public function insertDB() {
		echo "<p>INSERT not implemented<p>";
		return false;
	}
		
	public function isLoaded() {
		return $this->loaded;
	}
	
	public function isStored() {
		return $this->getID() != NULL;
	}
	
	public function isSame(Entity $argObject) {
		return ($this->ID == $argObject->getID());
	}
	
	public function loadDB() {
		echo "<p>LOAD not implemented<p>";
		return false;
	}
	
	protected function setID($argID) {
		$this->ID = $argID;
	}
	
	protected function setLoaded($argLoaded) {
		$this->loaded = $argLoaded;
	}
	
	public function updateDB() {
		echo "<p>UPDATE not implemented<p>";
		return false;
	}
}
?>