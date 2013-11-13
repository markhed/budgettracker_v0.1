<?php /* Smarty version Smarty-3.1.13, created on 2013-07-02 14:32:52
         compiled from "views\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2120451d2c8745e9826-39231425%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20520d574d838c8d3439e5f30844e78aae7426c6' => 
    array (
      0 => 'views\\main.tpl',
      1 => 1372255659,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2120451d2c8745e9826-39231425',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'firstName' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d2c8746882a9_91167391',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d2c8746882a9_91167391')) {function content_51d2c8746882a9_91167391($_smarty_tpl) {?>Welcome, <?php echo $_smarty_tpl->tpl_vars['firstName']->value;?>
! <p>
<button 
    onclick="direct('budgetcycles.php');"
    >Budget Cycles</button>
<br>
<button 
    onclick="direct('accounts.php');"
    >Accounts</button>
<br>
<button 
    onclick="direct('periodic.php');"
    >Periodic Income and Expenses</button>
<br>
<button 
    onclick="direct('dailyexpenses.php');"
    >Daily Expenses</button>
<br>
<button 
    onclick="direct('allotments.php');"
    >Allotments</button>
<br>
<button 
    onclick="direct('creditcards.php');"
    >Credit Cards</button>
<br>
<button 
    onclick="direct('parties.php');"
    >Parties</button>
<br><br>
<button 
    onclick="direct('logout.php');"
    >Logout</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function direct(argLocation) {
	location.href = argLocation;
}
</script><?php }} ?>