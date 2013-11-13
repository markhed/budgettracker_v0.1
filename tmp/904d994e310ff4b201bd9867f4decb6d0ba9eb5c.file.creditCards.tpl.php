<?php /* Smarty version Smarty-3.1.13, created on 2013-07-03 07:57:29
         compiled from "views\creditCards.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1708551d3bd49423b72-57119855%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '904d994e310ff4b201bd9867f4decb6d0ba9eb5c' => 
    array (
      0 => 'views\\creditCards.tpl',
      1 => 1372253641,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1708551d3bd49423b72-57119855',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrCreditCards' => 0,
    'creditCard' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d3bd495d63e5_58831364',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d3bd495d63e5_58831364')) {function content_51d3bd495d63e5_58831364($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Credit Cards<button onClick="addNewCreditCard()">+</button></h3>

<form  id="creditCardsForm"> 
<?php  $_smarty_tpl->tpl_vars['creditCard'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['creditCard']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrCreditCards']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['creditCard']->key => $_smarty_tpl->tpl_vars['creditCard']->value){
$_smarty_tpl->tpl_vars['creditCard']->_loop = true;
?>
<input 
	type="hidden" 
    name="creditCard[current][index][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]"  
    id="creditCard[current][index][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]"  
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
"/>
<input 
	type="text" 
    placeholder="title" 
    name="creditCard[current][title][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][title][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getTitle();?>
"/>
<input 
	type="text" 
    placeholder="comment" 
    name="creditCard[current][comment][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][comment][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getComment();?>
"/>
<input 
	type="text" 
    placeholder="bank" 
    name="creditCard[current][bank][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][bank][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getBank();?>
"/>
<button 
	type="submit" 
    formaction="creditcards.php" 
    formmethod="post" 
    name="creditCard[delete][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]"  
    id="delete[creditCard][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="cutoff date" 
    name="creditCard[current][cutOffDate][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][cutOffDate][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getCutOffDate();?>
"/>
<input 
	type="text" 
	placeholder="due date" 
    name="creditCard[current][dueDate][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][dueDate][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getDueDate();?>
"/>
<input 
	type="text" 
    placeholder="account number" 
    name="creditCard[current][accountNum][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][accountNum][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getAccountNum();?>
"/>
<br>
<input 
	type="text" 
    placeholder="credit limit" 
    name="creditCard[current][creditLimit][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    id="creditCard[current][creditLimit][<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['creditCard']->value->getCreditLimit();?>
"/>
<br><br>
<?php } ?>
</form>
<button 
	formaction="creditCards.php" 
    form="creditCardsForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var countCreditCard=0;
function addNewCreditCard() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="creditCard[new][index][]";
	index.id="creditCard[new][index][]";
	index.value=countCreditCard;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="creditCard[new][title][]";
	title.id="creditCard[new][title][]";
	title.placeholder="title";
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="creditCard[new][comment][]";
	comment.id="creditCard[new][comment][]";
	comment.placeholder="comment";
	
	var bank=document.createElement("input");
	bank.type="text";
	bank.name="creditCard[new][bank][]";
	bank.id="creditCard[new][bank][]";
	bank.placeholder="bank";
	
	var cutOffDate=document.createElement("input");
	cutOffDate.type="text";
	cutOffDate.name="creditCard[new][cutOffDate][]";
	cutOffDate.id="creditCard[new][cutOffDate][]";
	cutOffDate.placeholder="cutoff date";

	var dueDate=document.createElement("input");
	dueDate.type="text";
	dueDate.name="creditCard[new][dueDate][]";
	dueDate.id="creditCard[new][dueDate][]";
	dueDate.placeholder="due date";
	
	var accountNum=document.createElement("input");
	accountNum.type="text";
	accountNum.name="creditCard[new][accountNum][]";
	accountNum.id="creditCard[new][accountNum][]";
	accountNum.placeholder="account number";

	var creditLimit=document.createElement("input");
	creditLimit.type="text";
	creditLimit.name="creditCard[new][creditLimit][]";
	creditLimit.id="creditCard[new][creditLimit][]";
	creditLimit.placeholder="credit limit";
	
	$("#creditCardsForm").append(
		index, title, comment, bank,
		"<br>",
		cutOffDate, dueDate, accountNum,
		"<br>",
		creditLimit,
		"<br><br>"
		);
	countCreditCard++;
}
</script>
</body><?php }} ?>