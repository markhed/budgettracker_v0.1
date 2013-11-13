<?php
$path = $_SERVER['DOCUMENT_ROOT']."/BudgetTracker/";
$class_path = $path."classes/";

//this should be arranged in terms of class hierarchy - otherwise error is encountered
require($class_path."DataType.class.php"); //abstract
	require($class_path."BudgetType.class.php");
	require($class_path."FlowType.class.php");
	require($class_path."Status.class.php");
	
require($class_path."Entity.class.php"); //abstract
	require($class_path."CashFlow.class.php"); //abstract
		require($class_path."Inflow.class.php");
			require($class_path."PeriodicInflow.class.php");
		require($class_path."Outflow.class.php");
			require($class_path."PeriodicOutflow.class.php");

	require($class_path."BudgetAccount.class.php");
	require($class_path."BudgetCycle.class.php");
	require($class_path."BudgetManager.class.php");
	require($class_path."DailyOutflow.class.php");
	require($class_path."Owner.class.php");
		require($class_path."Allotment.class.php");
		require($class_path."CreditCard.class.php");
		require($class_path."Party.class.php");
	require($class_path."User.class.php");
	
require($class_path."Date.class.php");
?>