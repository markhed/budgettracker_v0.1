<?php
class GroupMaster extends Entity {  // CANCELLED - owner is used instead
	protected $title; //string
	protected $manager; //class BudgetManager
	
	//field name of attributes
	const _TABLE = "GRPMSTR";
	const _title = "TITLE";
	const _manager = "MANAGERID";
	
	public function getManager() {
		if ($this->manager != NULL) {
			TEST($this->manager);
			return $this->manager;
		}
		
		return NULL;
	}
	
	protected function getManagerID() {
		if ($this->manager != NULL) {
			return $this->manager->getID();
		}
		
		return NULL;
	}
	
	public function getTitle() {
		return $this->title;
	}
	
	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			$managerID = $this->getManagerID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_title => $this->title,
						   $this::_manager => $managerID
						  );
			
			$result = mysql_query(OUT_INSERT_SQL($array, $this::_TABLE));
			
			if ($result) {
				return true;
			}
			else {
				echo "<p>-INSERT FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		return false;
	}
	
	public function loadDB() {
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_SELECT_SQL($array, $this::_TABLE));
		
		if (($result != false) and (mysql_num_rows($result) > 0)) {
			$contentDB = mysql_fetch_array($result);
			
			$this->setTitle($contentDB[$this::_title]);
			$this->setManager(new BudgetManager($contentDB[$this::_manager]));
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}
	
	protected function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	protected function setTitle($argTitle) {
		$this->title = $argTitle;
	}
	
	public function setValues($argTitle, $argManager) {
		$this->setTitle($argTitle);
		$this->setManager($argManager);
	}
	
	public function updateDB() {
		$managerID = $this->getManagerID();
		
		$array = array($this::_title => $this->title,
					   $this::_manager => $managerID
					  );
		$array2 = array($this::_ID => $this->ID);		
		$result = mysql_query(OUT_UPDATE_SQL($array, $array2, $this::_TABLE));

		if ($result) {
			return true;
		}
		else {		
			echo "<p>-UPDATE FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}
		
		return false;
	}
}
?>