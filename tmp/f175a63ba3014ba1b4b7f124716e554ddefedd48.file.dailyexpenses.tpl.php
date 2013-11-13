<?php /* Smarty version Smarty-3.1.13, created on 2013-07-03 07:57:08
         compiled from "views\dailyexpenses.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1136751d3bd345e4670-00262970%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f175a63ba3014ba1b4b7f124716e554ddefedd48' => 
    array (
      0 => 'views\\dailyexpenses.tpl',
      1 => 1372253802,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1136751d3bd345e4670-00262970',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrDailyOutflows' => 0,
    'dailyOutflow' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d3bd3471d1c9_19424726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d3bd3471d1c9_19424726')) {function content_51d3bd3471d1c9_19424726($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Daily Expenses<button onClick="addNewDailyOutflow()">+</button></h3>

<form  id="dailyOutflowsForm"> 
<?php  $_smarty_tpl->tpl_vars['dailyOutflow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['dailyOutflow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrDailyOutflows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['dailyOutflow']->key => $_smarty_tpl->tpl_vars['dailyOutflow']->value){
$_smarty_tpl->tpl_vars['dailyOutflow']->_loop = true;
?>
<input 
	type="hidden" 
    name="dailyOutflow[current][index][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]"  
    id="dailyOutflow[current][index][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]"  
    value="<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
"/>
<input 
	type="text" 
    placeholder="title" 
    name="dailyOutflow[current][title][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    id="dailyOutflow[current][title][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getTitle();?>
"/>
<input 
	type="text" 
    placeholder="comment" 
    name="dailyOutflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    id="dailyOutflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getComment();?>
"/>
<button 
	type="submit" 
    formaction="dailyexpenses.php" 
    formmethod="post" 
    name="dailyOutflow[delete][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]"  
    id="delete[dailyOutflow][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="unit amount" 
    name="dailyOutflow[current][unitAmount][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    id="dailyOutflow[current][unitAmount][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getUnitAmount();?>
"/>
<input 
	type="text" 
    placeholder="total units" 
    name="dailyOutflow[current][totalUnits][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    id="dailyOutflow[current][totalUnits][<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['dailyOutflow']->value->getTotalUnits();?>
"/>
<br><br>
<?php } ?>
</form>
<button 
	formaction="dailyexpenses.php" 
    form="dailyOutflowsForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var countDailyOutflow=0;
function addNewDailyOutflow() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="dailyOutflow[new][index][]";
	index.id="dailyOutflow[new][index][]";
	index.value=countDailyOutflow;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="dailyOutflow[new][title][]";
	title.id="dailyOutflow[new][title][]";
	title.placeholder="title";
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="dailyOutflow[new][comment][]";
	comment.id="dailyOutflow[new][comment][]";
	comment.placeholder="comment";
	
	var unitAmount=document.createElement("input");
	unitAmount.type="text";
	unitAmount.name="dailyOutflow[new][unitAmount][]";
	unitAmount.id="dailyOutflow[new][unitAmount][]";
	unitAmount.placeholder="unit amount";
	
	var totalUnits=document.createElement("input");
	totalUnits.type="text";
	totalUnits.name="dailyOutflow[new][totalUnits][]";
	totalUnits.id="dailyOutflow[new][totalUnits][]";
	totalUnits.placeholder="total units";

	$("#dailyOutflowsForm").append(
		index, title, comment,
		"<br>",
		unitAmount, totalUnits,
		"<br><br>"
		);
	countDailyOutflow++;
}
</script>
</body><?php }} ?>