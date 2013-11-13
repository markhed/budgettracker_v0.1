<?php
function CHECK_IF_NUM_UNIQUE($argNum, $argTable) {
	$result = mysql_query("SELECT * FROM '$argTable' WHERE ID = '$argNum'");
	if (($result == false) or (mysql_num_rows($result) == 0)) {
		return true;
	}
	
	return false;
}

function CONNECT_TO_DATABASE($argDatabase, $argServer, $argUsername, $argPassword) {
	$link = mysql_connect($argServer, $argUsername, $argPassword); //no password
	mysql_select_db($argDatabase, $link);
	
	return $link;
}

function DELETE(Entity $argEntity) { //deletes object from the db
	return $argEntity->deleteDB();
}

function displayArray(array $argArray) { //displays up to 5th level of array
		foreach($argArray as $index => $value) {
			if (is_array($value)) {
				foreach($value as $index2 => $value2) {
					if (is_array($value2)) {
						foreach($value2 as $index3 => $value3) {
							if (is_array($value3)) {
								foreach($value3 as $index4 => $value4) {
									echo "<br>[$index][$index2][$index3][$index4] => $value4<br>";
								}
							}
							else {
								echo "<br>[$index][$index2][$index3] => $value3<br>";
							}
						}
					}
					else {
						echo "<br>[$index][$index2] => $value2<br>";
					}
				}
			}
			else {
				echo "<br>[$index] => $value<br>";
			}
		}
}

function displayArrayObject(array $argArray) { //displays array of objects
		foreach($argArray as $index => $value) {
			if ($value instanceof Entity) {
				echo "[$index] => ".$value->getID()."<br>";
			}
			else {
				echo "[$index] => NON-ENTITY<br>";
			}
		}
}

function generateUniqueIDFromTable($argTable) {
	do {
		$number = rand(1, 99999999990);
	} while (!CHECK_IF_NUM_UNIQUE($number, $argTable));
	
	return $number;
}

function getCurrentDateString() {
	$date = new Date('NOW');
	
	return $date->formatSQL(); //SQl format, ISO-8601 (example: 2005-08-15T15:52:01+0000)
}

function isSubmitted() {
	if (isset($_POST)) {
		return true;
	}
	
	return false;
}

function LOAD(Entity $argEntity) { //loads object whether loaded already or not
	return $argEntity->loadDB();
}

function loggedIn() {
	if (isset($_SESSION['user']) and isset($_SESSION['manager'])) {
		if ($GLOBALS['show_POST'] and $_SERVER['REQUEST_METHOD'] == 'POST') {
			displayArray($_POST);
		}
		return true;
	}
	
	return false;
}

function OUT_DELETE_SQL(array $argArrayWHERE, $argTable) {
	$count = count($argArrayWHERE);
	$i = 1;
	$script = "DELETE FROM $argTable WHERE ";
	
	foreach ($argArrayWHERE as $field => $value) {
		if ($i < $count) {
			$script .= "$field = '$value' AND ";
		}
		else {
			$script .= "$field = '$value'";
		}
		$i++;
	}
	
	if ($GLOBALS['showScripts']) {
		echo "<p>$script<p>";
	}
	
	return $script;
}

function OUT_INSERT_SQL(array $argArray, $argTable) {
	$count = count($argArray);
	$i = 1;
	$script = "INSERT INTO $argTable (";
	$script2 = "";
	
	foreach ($argArray as $field => $value) {
		if ($i < $count) {
			$script .= "$field, ";
			$script2 .= "'$value', ";
		}
		else {
			$script .= "$field) VALUES (";
			$script2 .= "'$value')";
		}
		$i++;
	}
	
	$script .= $script2;
	
	if ($GLOBALS['showScripts']) {
		echo "<p>$script<p>";
	}
	
	return $script;
}

function OUT_SELECT_JOIN_SQL(array $argArrayJOIN, array $argArrayWHERE, $argTable, $argTable2) {
	$count = count($argArrayJOIN);
	$i = 1;
	$script = "SELECT * FROM $argTable INNER JOIN $argTable2 ON ";
	
	foreach ($argArrayJOIN as $field => $field2) {
		if ($i < $count) {
			$script .= "$field = $field2 AND ";
		}
		else {
			$script .= "$field = $field2 WHERE ";
		}
		$i++;
	}
	
	$count = count($argArrayWHERE);
	$i = 1;
	
	foreach ($argArrayWHERE as $field => $value) {
		if ($i < $count) {
			$script .= "$field = '$value' AND ";
		}
		else {
			$script .= "$field = '$value'";
		}
		$i++;
	}
	
	if ($GLOBALS['showScripts']) {
		echo "<p>$script<p>";
	}
	
	return $script;
}

function OUT_SELECT_SQL(array $argArrayWHERE, $argTable) {
	$count = count($argArrayWHERE);
	$i = 1;
	$script = "SELECT * FROM $argTable WHERE ";
	
	foreach ($argArrayWHERE as $field => $value) {
		if ($i < $count) {
			$script .= "$field = '$value' AND ";
		}
		else {
			$script .= "$field = '$value'";
		}
		$i++;
	}
	
	if ($GLOBALS['showScripts']) {
		echo "<p>$script<p>";
	}
	
	return $script;
}

function OUT_UPDATE_SQL(array $argArraySET, array $argArrayWHERE, $argTable) {
	$count = count($argArraySET);
	$i = 1;
	$script = "UPDATE $argTable SET ";
	
	foreach ($argArraySET as $field => $value) {
		if ($i < $count) {
			$script .= "$field = '$value', ";
		}
		else {
			$script .= "$field = '$value' WHERE ";
		}
		$i++;
	}
	
	$count = count($argArrayWHERE);
	$i = 1;
	
	foreach ($argArrayWHERE as $field => $value) {
		if ($i < $count) {
			$script .= "$field = '$value' AND ";
		}
		else {
			$script .= "$field = '$value'";
		}
		$i++;
	}
	
	if ($GLOBALS['showScripts']) {
		echo "<p>$script<p>";
	}
	
	return $script;
}


function redirect($argLocation) {
	printf("<script>location.href='$argLocation'</script>");
	exit;
}

function redirectMeta($argLocation, $argTime) {
	printf("<meta http-equiv='Refresh' content='$argTime;url=$argLocation'>");
	exit;
}

function TEST(Entity $argEntity) { //checks if object is loaded from the DB, and loads if not
	if ($argEntity->isLoaded()) {
		return true;
	}
	else {
		return $argEntity->loadDB();
	}
}

function WRITE(Entity $argEntity) { //saves in the database
	if ($argEntity->isStored()) {
		return $argEntity->updateDB();
	}
	else {
		return $argEntity->insertDB();
	}
}
?>
