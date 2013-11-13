<?php /* Smarty version Smarty-3.1.13, created on 2013-07-03 07:57:22
         compiled from "views\allotments.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3125251d3bd4291ce50-95866283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60b9fd2f72f08491b3e5a5c17e297a5edfa80f6c' => 
    array (
      0 => 'views\\allotments.tpl',
      1 => 1372253303,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3125251d3bd4291ce50-95866283',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrAllotments' => 0,
    'allotment' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d3bd42a5dad9_37560726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d3bd42a5dad9_37560726')) {function content_51d3bd42a5dad9_37560726($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Allotments<button onClick="addNewAllotment()">+</button></h3>

<form  id="allotmentsForm"> 
<?php  $_smarty_tpl->tpl_vars['allotment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['allotment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrAllotments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['allotment']->key => $_smarty_tpl->tpl_vars['allotment']->value){
$_smarty_tpl->tpl_vars['allotment']->_loop = true;
?>
<input 
	type="hidden" 
    name="allotment[current][index][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]"  
    id="allotment[current][index][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]"  
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
"/>
<input 
	type="text" 
    placeholder="title" 
    name="allotment[current][title][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    id="allotment[current][title][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getTitle();?>
"/>
<input 
	type="text" 
    placeholder="comment" 
    name="allotment[current][comment][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    id="allotment[current][comment][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getComment();?>
"/>
<button 
	type="submit" 
    formaction="allotments.php" 
    formmethod="post" 
    name="allotment[delete][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]"  
    id="delete[allotment][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="current amount" 
    name="allotment[current][currentAmount][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    id="allotment[current][currentAmount][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getCurrentAmount();?>
"/>
<input 
	type="text" 
    placeholder="target amount" 
    name="allotment[current][targetAmount][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    id="allotment[current][targetAmount][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getTargetAmount();?>
"/>
<br>
<input 
	type="text" 
    placeholder="target date" 
    name="allotment[current][targetDate][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    id="allotment[current][targetDate][<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['allotment']->value->getTargetDate();?>
"/>
<br><br>
<?php } ?>
</form>
<button 
	formaction="allotments.php" 
    form="allotmentsForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var countAllotment=0;
function addNewAllotment() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="allotment[new][index][]";
	index.id="allotment[new][index][]";
	index.value=countAllotment;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="allotment[new][title][]";
	title.id="allotment[new][title][]";
	title.placeholder="title";
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="allotment[new][comment][]";
	comment.id="allotment[new][comment][]";
	comment.placeholder="comment";
	
	var currentAmount=document.createElement("input");
	currentAmount.type="text";
	currentAmount.name="allotment[new][currentAmount][]";
	currentAmount.id="allotment[new][currentAmount][]";
	currentAmount.placeholder="current amount";
	
	var targetAmount=document.createElement("input");
	targetAmount.type="text";
	targetAmount.name="allotment[new][targetAmount][]";
	targetAmount.id="allotment[new][targetAmount][]";
	targetAmount.placeholder="target amount";

	var targetDate=document.createElement("input");
	targetDate.type="text";
	targetDate.name="allotment[new][targetDate][]";
	targetDate.id="allotment[new][targetDate][]";
	targetDate.placeholder="target date";
	
	$("#allotmentsForm").append(
		index, title, comment,
		"<br>",
		currentAmount, targetAmount,
		"<br>",
		targetDate,
		"<br><br>"
		);
	countAllotment++;
}
</script>
</body><?php }} ?>