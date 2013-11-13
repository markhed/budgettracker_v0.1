<?php
class BudgetManager extends Entity {
	//private $users; //array User
	//private $accounts; //array BudgetAccount
	//private $cycles; //array BudgetCycle
	private $cashOnHand; //int
	
	//field name of attributes
	const _TABLE = "BGTMNGR";
	const _cashOnHand = "CASHHAND";
	
	public function getAccounts() {
		if (parent::isStored()) {
			$array = array(BudgetAccount::_managerID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, BudgetAccount::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$accounts = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$account = new BudgetAccount($contentDB['ID']);
					if (TEST($account)) {
						$accounts[] = $account;
					}
				}
				
				return $accounts;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".BudgetAccount::_TABLE." -FIELD:".BudgetAccount::_managerID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}

	public function getAllotments() {
		if (parent::isStored()) {
			$array = array(Owner::_TABLE.".".Owner::_ID  => Allotment::_TABLE.".".Allotment::_ID);
			$array2 = array(Owner::_TABLE.".".Owner::_subType => Allotment::_subTypeValue,
							Owner::_TABLE.".".Owner::_managerID => $this->ID
						   );	
			$result = mysql_query(OUT_SELECT_JOIN_SQL($array, $array2, Owner::_TABLE, Allotment::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$allotments = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$allotment = new Allotment($contentDB['ID']);
					if (TEST($allotment)) {
						$allotments[] = $allotment;
					}
				}
				
				return $allotments;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Allotment::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getCashOnHand() {
		return $this->cashOnHand;
	}
	
	public function getCreditCards() {
		if (parent::isStored()) {
			$array = array(Owner::_TABLE.".".Owner::_ID  => CreditCard::_TABLE.".".CreditCard::_ID);
			$array2 = array(Owner::_TABLE.".".Owner::_subType => CreditCard::_subTypeValue,
							Owner::_TABLE.".".Owner::_managerID => $this->ID
						   );	
			$result = mysql_query(OUT_SELECT_JOIN_SQL($array, $array2, Owner::_TABLE, CreditCard::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$creditCards = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$creditCard = new CreditCard($contentDB['ID']);
					if (TEST($creditCard)) {
						$creditCards[] = $creditCard;
					}
				}
				
				return $creditCards;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".CreditCard::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getCycles() {
		if (parent::isStored()) {
			$array = array(User::_managerID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, BudgetCycle::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$cycles = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$cycle = new BudgetCycle($contentDB['ID']);
					if (TEST($cycle)) {
						$cycles[] = $cycle;
					}
				}
				
				return $cycles;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".BudgetCycle::_TABLE." -FIELD:".BudgetCycle::_managerID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getDailyOutflows() {
		if (parent::isStored()) {
			$array = array(User::_managerID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, DailyOutflow::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$dailyOutflows = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$dailyOutflow = new DailyOutflow($contentDB['ID']);
					if (TEST($dailyOutflow)) {
						$dailyOutflows[] = $dailyOutflow;
					}
				}
				
				return $dailyOutflows;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".DailyOutflow::_TABLE." -FIELD:".DailyOutflow::_managerID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getOwners() {
		if (parent::isStored()) {
			$array = array(Owner::_managerID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, Owner::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$owners = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$owner = new Owner($contentDB['ID']);
					if (TEST($owner)) {
						$owners[] = $owner;
					}
				}
				
				return $owners;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Owner::_TABLE." -FIELD:".Owner::_managerID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getParties() {
		if (parent::isStored()) {
			$array = array(Owner::_TABLE.".".Owner::_ID  => Party::_TABLE.".".Party::_ID);
			$array2 = array(Owner::_TABLE.".".Owner::_subType => Party::_subTypeValue,
							Owner::_TABLE.".".Owner::_managerID => $this->ID
						   );	
			$result = mysql_query(OUT_SELECT_JOIN_SQL($array, $array2, Owner::_TABLE, Party::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$parties = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$party = new Party($contentDB['ID']);
					if (TEST($party)) {
						$parties[] = $party;
					}
				}
				
				return $parties;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".Party::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getPeriodicInflows() {
		if (parent::isStored()) {
			$array = array(Inflow::_TABLE.".".Inflow::_ID  => PeriodicInflow::_TABLE.".".PeriodicInflow::_ID);
			$array2 = array(Inflow::_TABLE.".".Inflow::_subType => PeriodicInflow::_subTypeValue,
							PeriodicInflow::_TABLE.".".PeriodicInflow::_managerID => $this->ID
						   );	
			$result = mysql_query(OUT_SELECT_JOIN_SQL($array, $array2, Inflow::_TABLE, PeriodicInflow::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$periodicInflows = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$periodicInflow = new PeriodicInflow($contentDB['ID']);
					if (TEST($periodicInflow)) {
						$periodicInflows[] = $periodicInflow;
					}
				}
				
				return $periodicInflows;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".PeriodicInflow::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getPeriodicOutflows() {
		if (parent::isStored()) {
			$array = array(Outflow::_TABLE.".".Outflow::_ID  => PeriodicOutflow::_TABLE.".".PeriodicOutflow::_ID);
			$array2 = array(Outflow::_TABLE.".".Outflow::_subType => PeriodicOutflow::_subTypeValue,
							PeriodicOutflow::_TABLE.".".PeriodicOutflow::_managerID => $this->ID
						   );	
			$result = mysql_query(OUT_SELECT_JOIN_SQL($array, $array2, Outflow::_TABLE, PeriodicOutflow::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$periodicOutflows = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$periodicOutflow = new PeriodicOutflow($contentDB['ID']);
					if (TEST($periodicOutflow)) {
						$periodicOutflows[] = $periodicOutflow;
					}
				}
				
				return $periodicOutflows;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".PeriodicOutflow::_TABLE." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}
	
	public function getUsers() {
		if (parent::isStored()) {
			$array = array(User::_managerID => $this->ID);	
			$result = mysql_query(OUT_SELECT_SQL($array, User::_TABLE));
	
			if ($result != false) {
				$numOfItems = mysql_num_rows($result);
				$users = array();
				
				for($i = 0; $i < $numOfItems; $i++)
				{	$contentDB = mysql_fetch_array($result);
					$user = new User($contentDB['ID']);
					if (TEST($user)) {
						$users[] = $user;
					}
				}
				
				return $users;
			}	
			else {
				echo "<p>-FETCH FAIL -TABLE:".User::_TABLE." -FIELD:".User::_managerID." -ID:".$this->getID()."<p>";
			}
		}
	
		return NULL;
	}

	public function insertDB() {
		if (!parent::isStored()) {
			$this->setID(generateUniqueIDFromTable($this::_TABLE)); //assigns a unique key
			
			$array = array($this::_ID => $this->ID,
						   $this::_cashOnHand => $this->cashOnHand
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
		
		if (($result != false) and (mysql_num_rows($result) > 0)){
			$contentDB = mysql_fetch_array($result);
			
			$this->setCashOnHand($contentDB[$this::_cashOnHand]);
			
			parent::setLoaded(true);
			return true;
		}
		else {
			echo "<p>-LOAD FAIL -TABLE:".$this::_TABLE." -ID:".$this->getID()."<p>";
		}
		
		return false;
	}
	
	public function updateDB() {
		$array = array($this::_cashOnHand => $this->cashOnHand);
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
	
	public function setCashOnHand($argCashOnHand) {
		$this->cashOnHand = $argCashOnHand;
	}
}
?>
