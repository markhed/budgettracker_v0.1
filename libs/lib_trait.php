<?php
$path = $_SERVER['DOCUMENT_ROOT']."/BudgetTracker/";
$class_path = $path."traits/";

require($class_path."isPeriodic.trait.php");
require($class_path."hasBudgetType.trait.php");
require($class_path."hasFlowType.trait.php");
require($class_path."hasStatus.trait.php");

?>