<?php
class Owner extends Entity {
	protected $title; //string
	protected $comment; //string
	protected $manager; //class BudgetManager
	
	//field name of attributes
	const _TABLE = "OWNER";
	const _title = "TITLE";
	const _comment = "COMMENT";
	const _managerID = "MANAGERID";
	const _subType = "SUBTYPE";
		
	const _subTypeValue = "1";
	
	public function deleteDB() {
		if (is_subclass_of($this, 'Owner')) {
			$array = array($this::_ID => $this->ID);
			$result = mysql_query(OUT_DELETE_SQL($array, self::_TABLE));
	
			if ($result) {
				return true;
			}
			else {
				echo "<p>-DELETE FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		
		else {
			echo "<p>-CANNOT DELETE OBJECT OF OWNER-<p>";
		}
		
		return false;
	}
	
	public function getComment() {
		return $this->comment;
	}
	
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
		if (is_subclass_of($this, 'Owner')) {
			if (!parent::isStored()) {
				$this->setID(generateUniqueIDFromTable(self::_TABLE)); //assigns a unique key
				$managerID = $this->getManagerID();
				
				$array = array($this::_ID => $this->ID,
							   $this::_title => $this->title,
							   $this::_comment => $this->comment,
							   $this::_managerID => $managerID,
							   $this::_subType => $this::_subTypeValue
							  );
				
				$result = mysql_query(OUT_INSERT_SQL($array, self::_TABLE));
				
				if ($result) {
					return true;
				}
				else {
					echo "<p>-INSERT FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
				}
			}
		}
		
		else {
			echo "<p>-CANNOT INSERT OBJECT OF OWNER-<p>";
		} 
		
		return false;
	}
	
	public function loadDB() {
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_SELECT_SQL($array, self::_TABLE));
		
		if (($result != false) and (mysql_num_rows($result) > 0)) {
			$contentDB = mysql_fetch_array($result);
			
			$this->setTitle($contentDB[$this::_title]);
			$this->setComment($contentDB[$this::_comment]);
			$this->setManager(new BudgetManager($contentDB[$this::_managerID]));
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
		}

		return false;
	}

	public function setComment($argComment) {
		$this->comment = $argComment;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	public function setTitle($argTitle) {
		$this->title = $argTitle;
	}
	
	public function setValues($argTitle, $argManager) {
		$this->setTitle($argTitle);
		$this->setManager($argManager);
	}
	
	public function updateDB() {
		if (is_subclass_of($this, 'Owner')) {
			$managerID = $this->getManagerID();
			
			$array = array($this::_title => $this->title,
						   $this::_comment => $this->comment,
						   $this::_managerID => $managerID
						  );
			$array2 = array($this::_ID => $this->ID);		
			$result = mysql_query(OUT_UPDATE_SQL($array, $array2, self::_TABLE));
	
			if ($result) {
				return true;
			}
			else {		
				echo "<p>-UPDATE FAIL -TABLE:".self::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
		else {
			echo "<p>-CANNOT UPDATE OBJECT OF OWNER-<p>";
		} 
			return false;
	}
}
?>