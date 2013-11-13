<?php /* Smarty version Smarty-3.1.13, created on 2013-07-03 07:57:02
         compiled from "views\periodic.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1437451d3bd2eb85597-38829314%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1073a2872e667160361dcba47c77c412618e22fc' => 
    array (
      0 => 'views\\periodic.tpl',
      1 => 1372258112,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1437451d3bd2eb85597-38829314',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrPeriodicInflows' => 0,
    'periodicInflow' => 0,
    'arrOwners' => 0,
    'option' => 0,
    'arrBudgetTypeOptions' => 0,
    'arrPeriodicOutflows' => 0,
    'periodicOutflow' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d3bd2f183901_40135114',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d3bd2f183901_40135114')) {function content_51d3bd2f183901_40135114($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3> Periodic </h3><p>
<h4>Income<button onClick="addNewPeriodicInflow()">+</button></h4>

<form  id="periodicInflowsForm"> 
<?php  $_smarty_tpl->tpl_vars['periodicInflow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['periodicInflow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrPeriodicInflows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['periodicInflow']->key => $_smarty_tpl->tpl_vars['periodicInflow']->value){
$_smarty_tpl->tpl_vars['periodicInflow']->_loop = true;
?>
    <input 
    	type="hidden" 
        name="periodicInflow[current][index][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]"  
        id="periodicInflow[current][index][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]"  
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
"/>
    <input 
    	type="text" 
        placeholder="title" 
        name="periodicInflow[current][title][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][title][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getTitle();?>
"/>
    <select 
    	name="periodicInflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]"/>
        <option value="0" disabled>- From -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value->getID()==$_smarty_tpl->tpl_vars['periodicInflow']->value->getOwnerID()){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
"selected><?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
</option>
            <?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
</option>
            <?php }?>
        <?php } ?>
    </select>
    <button 
    	type="submit" 
        formaction="periodic.php" 
        formmethod="post" 
        name="periodicInflow[delete][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]"  
        id="periodicInflow[delete][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="start date" 
        name="periodicInflow[current][startDate][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][startDate][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getStartDate();?>
"/>
    <input 
    	type="text" 
        placeholder="specific day" 
        name="periodicInflow[current][specificDay][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][specificDay][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getSpecificDay();?>
"/>
    <input 
    	type="text" 
        placeholder="specific date" 
        name="periodicInflow[current][specificDate][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][specificDate][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getSpecificDate();?>
"/>
    <input 
    	type="text" 
        placeholder="period" 
        name="periodicInflow[current][period][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][period][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getPeriod();?>
"/>
    <br>
    <input 
    	type="text" 
        placeholder="outstanding amount" 
        name="periodicInflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getOutstAmount();?>
"/>
    <input 
    	type="text" 
        placeholder="received amount" 
        name="periodicInflow[current][receivedAmount][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][receivedAmount][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getReceivedAmount();?>
"/>
    <br>
    <select 
    	name="periodicInflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]"/>
        <option value="0" disabled>- Budget Type -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrBudgetTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['periodicInflow']->value->getBudgetTypeValue()){?>
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
    <input 
    	type="text" 
        placeholder="comment" 
        name="periodicInflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        id="periodicInflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicInflow']->value->getComment();?>
"/>
    <br><br>
    <?php } ?>
    </form>
    <button 
    	formaction="periodic.php" 
        form="periodicInflowsForm" 
        formmethod="post" 
        name="submit" 
        id="submit" 
        value="submit"
        >Submit</button>
    <h4>Expenses<button onClick="addNewPeriodicOutflow()">+</button></h4>
    <form id="periodicOutflowsForm"> 
    <?php  $_smarty_tpl->tpl_vars['periodicOutflow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['periodicOutflow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrPeriodicOutflows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['periodicOutflow']->key => $_smarty_tpl->tpl_vars['periodicOutflow']->value){
$_smarty_tpl->tpl_vars['periodicOutflow']->_loop = true;
?>
    <input 
    	type="hidden" 
        name="periodicOutflow[current][index][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]"  
        id="periodicOutflow[current][index][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]"  
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
"/>
    <input 
    	type="text" 
        placeholder="title" 
        name="periodicOutflow[current][title][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][title][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getTitle();?>
"/>
    <select 
    	name="periodicOutflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]"/>
        <option value="0" disabled>- From -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value->getID()==$_smarty_tpl->tpl_vars['periodicOutflow']->value->getOwnerID()){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
"selected><?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
</option>
            <?php }else{ ?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
"><?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
</option>
            <?php }?>
        <?php } ?>
    </select>
    <button 
    	type="submit" 
        formaction="periodic.php" 
        formmethod="post" 
        name="periodicOutflow[delete][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]"  
        id="periodicOutflow[delete][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="start date" 
        name="periodicOutflow[current][startDate][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][startDate][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getStartDate();?>
"/>
    <input 
    type="text" 
        placeholder="specific day" 
        name="periodicOutflow[current][specificDay][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][specificDay][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getSpecificDay();?>
"/>
    <input 
    	type="text" 
        placeholder="specific date" 
        name="periodicOutflow[current][specificDate][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][specificDate][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getSpecificDate();?>
"/>
    <input 
    	type="text" 
        placeholder="period" 
        name="periodicOutflow[current][period][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][period][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getPeriod();?>
"/>
    <br>
    <input 
    	type="text" 
        placeholder="outstanding amount" 
        name="periodicOutflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getOutstAmount();?>
"/>
    <input 
        type="text" 
        placeholder="unit amount" 
        name="periodicOutflow[current][unitAmount][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][unitAmount][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getUnitAmount();?>
"/>
    <input 
    	type="text" 
        placeholder="total units" 
        name="periodicOutflow[current][totalUnits][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][totalUnits][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getTotalUnits();?>
"/>
    <input 
    	type="text" 
        placeholder="outstanding units" 
        name="periodicOutflow[current][outstUnits][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][outstUnits][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getOutstUnits();?>
"/>
    <br>
    <select 
    	name="periodicOutflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]"/>
        <option value="0" disabled>- Budget Type -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrBudgetTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['periodicOutflow']->value->getBudgetTypeValue()){?>
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
    <input 
    	type="text" 
        placeholder="comment" 
        name="periodicOutflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        id="periodicOutflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['periodicOutflow']->value->getComment();?>
"/>
    <br><br>
<?php } ?>
</form>

<button 
	formaction="periodic.php" 
    form="periodicOutflowsForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
var arrBudgetTypeOptions = ["- Budget Type -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrBudgetTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    "<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
",
<?php } ?>
];

var arrRecipients = ["- For -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    "<?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
",
<?php } ?>
];

var arrRecipientsID = [0,
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    <?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
,
<?php } ?>
];

var arrSources = ["- From -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    "<?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
",
<?php } ?>
];

var arrSourcesID = [0,
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    <?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
,
<?php } ?>
];
</script>

<script>
var countPeriodicInflow=0, countPeriodicOutflow=0;
function addNewPeriodicInflow() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="periodicInflow[new][index][]";
	index.id="periodicInflow[new][index][]";
	index.value=countPeriodicInflow;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="periodicInflow[new][title][]";
	title.id="periodicInflow[new][title][]";
	title.placeholder="title";
	
	var owner=document.createElement("select");
	owner.name="periodicInflow[new][owner][]";
	owner.id="periodicInflow[new][owner][]";
			
	for(var i=0; i < arrSources.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrSourcesID[i];
		option.appendChild(document.createTextNode(arrSources[i]));
		owner.appendChild(option);
	}
	
	var outstAmount=document.createElement("input");
	outstAmount.type="text";
	outstAmount.name="periodicInflow[new][outstAmount][]";
	outstAmount.id="periodicInflow[new][outstAmount][]";
	outstAmount.placeholder="outstanding amount";
	
	var receivedAmount=document.createElement("input");
	receivedAmount.type="text";
	receivedAmount.name="periodicInflow[new][receivedAmount][]";
	receivedAmount.id="periodicInflow[new][receivedAmount][]";
	receivedAmount.placeholder="received amount";
	
	var budgetType=document.createElement("select");
	budgetType.name="periodicInflow[new][budgetType][]";
	budgetType.id="periodicInflow[new][budgetType][]";
	
	for(var i=0; i < arrBudgetTypeOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrBudgetTypeOptions[i];
		option.appendChild(document.createTextNode(arrBudgetTypeOptions[i]));
		budgetType.appendChild(option);
	}
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="periodicInflow[new][comment][]";
	comment.id="periodicInflow[new][comment][]";
	comment.placeholder="comment";
	
	var startDate=document.createElement("input");
	startDate.type="text";
	startDate.name="periodicInflow[new][startDate][]";
	startDate.id="periodicInflow[new][startDate][]";
	startDate.placeholder="start date";
	
	var specificDay=document.createElement("input");
	specificDay.type="text";
	specificDay.name="periodicInflow[new][specificDay][]";
	specificDay.id="periodicInflow[new][specificDay][]";
	specificDay.placeholder="specific day";
	
	var specificDate=document.createElement("input");
	specificDate.type="text";
	specificDate.name="periodicInflow[new][specificDate][]";
	specificDate.id="periodicInflow[new][specificDate][]";
	specificDate.placeholder="specific date";
	
	var period=document.createElement("input");
	period.type="text";
	period.name="periodicInflow[new][period][]";
	period.id="periodicInflow[new][period][]";
	period.placeholder="period";
	
	$("#periodicInflowsForm").append(
		index, title, owner, 
		"<br>",
		startDate, specificDay, specificDate, period, 
		"<br>",
		outstAmount, receivedAmount, 
		"<br>",
		budgetType, comment, 
		"<br>"
	);
	countPeriodicInflow++;
}

function addNewPeriodicOutflow() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="periodicOutflow[new][index][]";
	index.id="periodicOutflow[new][index][]";
	index.value=countPeriodicOutflow;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="periodicOutflow[new][title][]";
	title.id="periodicOutflow[new][title][]";
	title.placeholder="title";
	
	var owner=document.createElement("select");
	owner.name="periodicOutflow[new][owner][]";
	owner.id="periodicOutflow[new][owner][]";
			
	for(var i=0; i < arrSources.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrSourcesID[i];
		option.appendChild(document.createTextNode(arrSources[i]));
		owner.appendChild(option);
	}
	
	var outstAmount=document.createElement("input");
	outstAmount.type="text";
	outstAmount.name="periodicOutflow[new][outstAmount][]";
	outstAmount.id="periodicOutflow[new][outstAmount][]";
	outstAmount.placeholder="outstanding amount";
	
	var budgetType=document.createElement("select");
	budgetType.name="periodicOutflow[new][budgetType][]";
	budgetType.id="periodicOutflow[new][budgetType][]";
	
	for(var i=0; i < arrBudgetTypeOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrBudgetTypeOptions[i];
		option.appendChild(document.createTextNode(arrBudgetTypeOptions[i]));
		budgetType.appendChild(option);
	}
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="periodicOutflow[new][comment][]";
	comment.id="periodicOutflow[new][comment][]";
	comment.placeholder="comment";
	
	var unitAmount=document.createElement("input");
	unitAmount.type="text";
	unitAmount.name="periodicOutflow[new][unitAmount][]";
	unitAmount.id="periodicOutflow[new][unitAmount][]";
	unitAmount.placeholder="unit amount";
	
	var totalUnits=document.createElement("input");
	totalUnits.type="text";
	totalUnits.name="periodicOutflow[new][totalUnits][]";
	totalUnits.id="periodicOutflow[new][totalUnits][]";
	totalUnits.placeholder="total units";
	
	var outstUnits=document.createElement("input");
	outstUnits.type="text";
	outstUnits.name="periodicOutflow[new][outstUnits][]";
	outstUnits.id="periodicOutflow[new][outstUnits][]";
	outstUnits.placeholder="outstanding units";
	
	var startDate=document.createElement("input");
	startDate.type="text";
	startDate.name="periodicOutflow[new][startDate][]";
	startDate.id="periodicOutflow[new][startDate][]";
	startDate.placeholder="start date";
	
	var specificDay=document.createElement("input");
	specificDay.type="text";
	specificDay.name="periodicOutflow[new][specificDay][]";
	specificDay.id="periodicOutflow[new][specificDay][]";
	specificDay.placeholder="specific day";
	
	var specificDate=document.createElement("input");
	specificDate.type="text";
	specificDate.name="periodicOutflow[new][specificDate][]";
	specificDate.id="periodicOutflow[new][specificDate][]";
	specificDate.placeholder="specific date";
	
	var period=document.createElement("input");
	period.type="text";
	period.name="periodicOutflow[new][period][]";
	period.id="periodicOutflow[new][period][]";
	period.placeholder="period";
	
	$("#periodicOutflowsForm").append(
		index, title, owner, 
		"<br>",
		startDate, specificDay, specificDate, period, 
		"<br>",
		outstAmount, unitAmount, totalUnits, outstUnits,
		"<br>",
		budgetType, comment,
		"<br>"
	);
	countPeriodicOutflow++;
}

function submitForms(cycleID) {
	/*var combinedForm=document.createElement("form");
	var combinedForm2=document.getElementById("combinedForm").innerHTML;
	combinedForm2.method="post";
	combinedForm2.action="view_cycle.php?selectedCycleID="+cycleID;
	
	var form1Content=document.getElementById("periodicInflowsForm").innerHTML;
 	var form2Content=document.getElementById("periodicOutflowsForm").innerHTML;
 	combinedForm2.innerHTML=form1Content+form2Content;
 	combinedForm2.submit();
	*/
}
</script>
</body><?php }} ?>