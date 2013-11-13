<?php
require_once("header.php");

if (loggedIn()) {
	$manager = $_SESSION['manager'];
	
	process_POST($manager);
	
	$parties = $manager->getParties();
	
	$smarty->assign('arrParties', $parties);
	$smarty->display('parties.tpl');
}
else {
	redirect("index.php");
}
?>

<?php //functions used by this page
function process_POST($argManager) {
	if (isset($_POST)) {
		foreach ($_POST as $index1 => $value1) { 
			if (!is_array($value1)) {
				continue;
			}
			else if ($index1 == "party") {
				foreach ($value1 as $index2 => $value2) { 
					if (!is_array($value2)) {
						continue;
					}
					else if ($index2 == "new" or $index2 == "current") {
						foreach ($value2['index'] as $index) {
							if ($index2 == "current") {
								$party = new Party($index);
								
								if (!TEST($party)) {
									continue;
								}
							}
							else {
								if ($value2['title'][$index] != "") {
									$party = new Party(NULL);
									$party->setManager($argManager);
								}
								else {
									continue;
								}
							}
							
							$party->setTitle($value2['title'][$index]);
							$party->setComment($value2['comment'][$index]);
							$party->setFirstName($value2['firstName'][$index]);
							$party->setLastName($value2['lastName'][$index]);
							WRITE($party);
						}
					}
					else if ($index2 == "delete") {
						foreach ($value2 as $ID) {
							$party = new Party($ID);
							DELETE($party);
						}
					}
				}
			}
		}
	}
}
?>