<?php /* Smarty version Smarty-3.1.13, created on 2013-07-03 07:56:56
         compiled from "views\accounts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1216151d3bd28647082-29331395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '35b2a4df03fa1116d90e2937b42d784f4755aa4a' => 
    array (
      0 => 'views\\accounts.tpl',
      1 => 1372336305,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1216151d3bd28647082-29331395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cashOnHand' => 0,
    'arrAccounts' => 0,
    'account' => 0,
    'arrStatusOptions' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d3bd288ee480_72390729',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d3bd288ee480_72390729')) {function content_51d3bd288ee480_72390729($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3> Cash-On-Hand </h3><p>
<input 
	type="text" 
    form="accountsForm" 
    placeholder="amount" 
    name="cashOnHand" 
    id="cashOnHand" 
    value="<?php echo $_smarty_tpl->tpl_vars['cashOnHand']->value;?>
"/>
<h3> Accounts <button onClick="addNewAccount()">+</button></h3><p> 
<form 
	action="accounts.php" 
    method="post" 
    id="accountsForm">
<?php  $_smarty_tpl->tpl_vars['account'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['account']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrAccounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['account']->key => $_smarty_tpl->tpl_vars['account']->value){
$_smarty_tpl->tpl_vars['account']->_loop = true;
?>
    <input 
    	type="hidden" 
        name="account[current][index][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]"  
        id="account[current][index][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]"  
        value="<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
"/>
    <input 
    	type="text" 
        placeholder="title" 
        name="account[current][title][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        id="account[current][title][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['account']->value->getTitle();?>
"/>
    <button 
    	type="submit" 
        form="accountsForm" 
        name="account[delete][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]"  
        id="account[delete][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
"
        >X
    </button>
    <br>
    <input 
    	type="text" 
        placeholder="account number (last 4)" 
        name="account[current][accountNum][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        id="account[current][accountNum][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['account']->value->getAccountNum();?>
"/> 
    <br>
    <input 
    	type="text" 
        placeholder="amount" 
        name="account[current][currentAmount][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        id="account[current][currentAmount][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['account']->value->getCurrentAmount();?>
"/>
    <br>
    <select 
    	name="account[current][status][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
        id="account[current][status][<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]"/>
        <option value="0" disabled>- Status -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['account']->value->getStatusValue()){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
            <?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value;?>
</option>
            <?php }?>
        <?php } ?>
    </select>
    <br><br>
<?php } ?>
<input 
	name="submit" 
    form="accountsForm" 
    type="submit" 
    value="Submit"/>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
var arrStatusOptions = ["- Status -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    "<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
",
<?php } ?>
];
</script>

<script>
var countAccount=0;
function addNewAccount() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="account[new][index][]";
	index.id="account[new][index][]";
	index.value=countAccount;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="account[new][title][]";
	title.id="account[new][title][]";
	title.placeholder="title";
	
	var accountNum=document.createElement("input");
	accountNum.type="text";
	accountNum.name="account[new][accountNum][]";
	accountNum.id="account[new][accountNum][]";
	accountNum.placeholder="account number (last 4)";
	
	var currentAmount=document.createElement("input");
	currentAmount.type="text";
	currentAmount.name="account[new][currentAmount][]";
	currentAmount.id="account[new][currentAmount][]";
	currentAmount.placeholder="amount";
	
	var status=document.createElement("select");
	status.name="account[new][status][]";
	status.id="account[new][status][]";
	
	for(var i=0; i < arrStatusOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrStatusOptions[i];
		option.appendChild(document.createTextNode(arrStatusOptions[i]));
		status.appendChild(option);
	}
	
	$("#accountsForm").prepend(
		index,
		title, "<br>",
		accountNum, "<br>",
		currentAmount, "<br>",
		status, "<p>"
	);
	countAccount++;
}
</script>
</body><?php }} ?>