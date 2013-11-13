<?php
class User extends Entity{
	protected $accountLogin; //string
	protected $password; //string
	protected $firstName; //string
	protected $lastName; //string
	protected $email; //string
	protected $manager; //class BudgetManager
	
	//field name of attributes
	const _TABLE = "USR"; 
	const _accountLogin = "ACCLOGIN";
	const _password = "PASSWORD";
	const _firstName = "FNAME";
	const _lastName = "LNAME";
	const _email = "EMAIL";
	const _managerID = "MANAGERID";
	
	public function getAccountLogin() {
		return $this->accountLogin;
	}
	
	public function getEmail() {
		return $this->email;
	}
	
	public function getFirstName() {
		return $this->firstName;
	}
	
	public function getLastName() {
		return $this->lastName;
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
	
	public function getPassword() {
		return $this->password;
	}
	
	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			$managerID = $this->getManager()->getID();
			
			$array = array($this::_ID => $this->ID,
						   $this::_accountLogin => $this->accountLogin,
						   $this::_password => $this->password,
						   $this::_firstName => $this->firstName,
						   $this::_lastName => $this->lastName,
						   $this::_email => $this->email,
						   $this::_managerID => $managerID
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
	
	public function loadByAccountAndPassword($argAccountLogin, $argAccountPassword) {
		$array = array($this::_accountLogin => $argAccountLogin,
					   $this::_password => $argAccountPassword
					  );
		$result = mysql_query(OUT_SELECT_SQL($array, $this::_TABLE));
	
		if ($result == false) {
			echo "<p>-LOAD USER BY ACCOUNT-PASSSWORD FAIL -ACCOUNT:".$this->getAccountLogin()."<p>";
		}
		
		else if (mysql_num_rows($result) > 0) {
			$contentDB = mysql_fetch_array($result);
			
			$this->setAccountLogin($contentDB[$this::_accountLogin]);
			$this->setPassword($contentDB[$this::_password]);
			$this->setFirstName($contentDB[$this::_firstName]);
			$this->setLastName($contentDB[$this::_lastName]);
			$this->setEmail($contentDB[$this::_email]);
			$this->setManager(new BudgetManager($contentDB[$this::_managerID]));
			
			parent::setID($contentDB[$this::_ID]);
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-NO MATCHED USER -ACCOUNT:".$this->getAccountLogin()."<p>";
		}

		return false;
	} 

	public function loadDB() {
		$array = array($this::_ID => $this->ID);
		$result = mysql_query(OUT_SELECT_SQL($array, $this::_TABLE));
		
		if (($result != false) and (mysql_num_rows($result) > 0)) {
			$contentDB = mysql_fetch_array($result);
			
			$this->setAccountLogin($contentDB[$this::_accountLogin]);
			$this->setPassword($contentDB[$this::_password]);
			$this->setFirstName($contentDB[$this::_firstName]);
			$this->setLastName($contentDB[$this::_lastName]);
			$this->setEmail($contentDB[$this::_email]);
			$this->setManager(new BudgetManager($contentDB[$this::_managerID]));
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}
			
		return false;
	}
	
	protected function setAccountLogin($argAccountLogin) {
		$this->accountLogin = $argAccountLogin;
	}

	public function setEmail($argEmail) {
		$this->email = $argEmail;
	}

	public function setFirstName($argFirstName) {
		$this->firstName = $argFirstName;
	}
	
	public function setLastName($argLastName) {
		$this->lastName = $argLastName;
	}
	
	public function setManager(BudgetManager $argManager) {
		$this->manager = $argManager;
	}
	
	protected function setPassword($argPassword) {
		$this->password = $argPassword;
	}
	
	public function setValues($argAccountLogin, $argPassword, $argFirstName,
							  $argLastName, $argEmail, $argManager) {
		$this->setAccountLogin($argAccountLogin);
		$this->setPassword($argPassword);
		$this->setFirstName($argFirstName);
		$this->setLastName($argLastName);
		$this->setEmail($argEmail);
		$this->setManager($argManager);
	}
	
	public function updateDB() {
		$array = array($this::_accountLogin => $this->accountLogin,
					   $this::_password => $this->password,
					   $this::_firstName => $this->firstName,
					   $this::_lastName => $this->lastName,
					   $this::_email => $this->email,
					   $this::_managerID => $this->managerID
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