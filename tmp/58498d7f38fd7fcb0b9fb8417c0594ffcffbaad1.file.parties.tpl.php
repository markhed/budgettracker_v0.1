<?php /* Smarty version Smarty-3.1.13, created on 2013-09-12 09:29:07
         compiled from "views\parties.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2733452316d43b83fa0-69830053%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58498d7f38fd7fcb0b9fb8417c0594ffcffbaad1' => 
    array (
      0 => 'views\\parties.tpl',
      1 => 1372257425,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2733452316d43b83fa0-69830053',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrParties' => 0,
    'party' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_52316d43e222f0_99525479',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_52316d43e222f0_99525479')) {function content_52316d43e222f0_99525479($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>

</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Parties<button onClick="addNewParty()">+</button></h3>

<form  id="partiesForm"> 
<?php  $_smarty_tpl->tpl_vars['party'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['party']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrParties']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['party']->key => $_smarty_tpl->tpl_vars['party']->value){
$_smarty_tpl->tpl_vars['party']->_loop = true;
?>
<input 
	type="hidden" 
    name="party[current][index][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]"  
    id="party[current][index][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]"  
    value="<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
"/>
<input 
	type="text" 
    placeholder="title" 
    name="party[current][title][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    id="party[current][title][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['party']->value->getTitle();?>
"/>
<input 
	type="text" 
    placeholder="comment" 
    name="party[current][comment][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    id="party[current][comment][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['party']->value->getComment();?>
"/>
<button 
	type="submit" 
    formaction="parties.php" 
    formmethod="post" 
    name="party[delete][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]"  
    id="delete[party][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="first name" 
    name="party[current][firstName][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    id="party[current][firstName][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['party']->value->getFirstName();?>
"/>
<input 
	type="text" 
    placeholder="last name" 
    name="party[current][lastName][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    id="party[current][lastName][<?php echo $_smarty_tpl->tpl_vars['party']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['party']->value->getLastName();?>
"/>
<br><br>
<?php } ?>
</form>
<button 
	formaction="parties.php" 
    form="partiesForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var countParty=0;
function addNewParty() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="party[new][index][]";
	index.id="party[new][index][]";
	index.value=countParty;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="party[new][title][]";
	title.id="party[new][title][]";
	title.placeholder="title";
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="party[new][comment][]";
	comment.id="party[new][comment][]";
	comment.placeholder="comment";
	
	var firstName=document.createElement("input");
	firstName.type="text";
	firstName.name="party[new][firstName][]";
	firstName.id="party[new][firstName][]";
	firstName.placeholder="first name";
	
	var lastName=document.createElement("input");
	lastName.type="text";
	lastName.name="party[new][lastName][]";
	lastName.id="party[new][lastName][]";
	lastName.placeholder="last name";
	
	$("#partiesForm").append(
		index, title, comment,
		"<br>",
		firstName, lastName,
		"<br><br>"
		);
	countParty++;
}
</script>
</body><?php }} ?>