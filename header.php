<?php
$path = $_SERVER['DOCUMENT_ROOT']."/BudgetTracker/";
$lib_path = $path."libs/";
$config_path = $path."config/";
$external_libs_path = $path."libs/external/";

require_once($lib_path."lib_function.php"); //should be arranged in terms of dependency
require_once($lib_path."lib_trait.php"); 
require_once($lib_path."lib_class.php");

require_once($config_path."debug.php");
require_once($config_path."general.php");

require_once($external_libs_path."Smarty-3.1.13/libs/Smarty.class.php");

CONNECT_TO_DATABASE(_DATABASE, _SERVER, _USERNAME, _PASSWORD);

session_start();

$smarty = new Smarty();
$smarty->template_dir = 'views';
$smarty->compile_dir = 'tmp';
$smarty->left_delimiter = '*{';
$smarty->right_delimiter = '}*';

?>