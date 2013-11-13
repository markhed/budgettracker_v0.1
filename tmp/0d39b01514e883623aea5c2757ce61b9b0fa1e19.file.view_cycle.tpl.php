<?php /* Smarty version Smarty-3.1.13, created on 2013-10-29 16:58:01
         compiled from "views\view_cycle.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2387351d13bd5c1a4c5-62032236%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0d39b01514e883623aea5c2757ce61b9b0fa1e19' => 
    array (
      0 => 'views\\view_cycle.tpl',
      1 => 1383062274,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2387351d13bd5c1a4c5-62032236',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d13bd621ebb1_36500452',
  'variables' => 
  array (
    'startDate' => 0,
    'endDate' => 0,
    'remainingDays' => 0,
    'dailyOutflowSum' => 0,
    'cashOnHand' => 0,
    'arrAccounts' => 0,
    'account' => 0,
    'cycle' => 0,
    'arrInflows' => 0,
    'inflow' => 0,
    'arrOwners' => 0,
    'option' => 0,
    'arrBudgetTypeOptions' => 0,
    'arrFlowTypeOptions' => 0,
    'arrStatusOptionsIn' => 0,
    'arrOutflows' => 0,
    'outflow' => 0,
    'arrStatusOptionsOut' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d13bd621ebb1_36500452')) {function content_51d13bd621ebb1_36500452($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>
<title>Project BT: View Cycle</title>
<body>
<a href="main.php"> Return to Main </a>
<h3> Budget Cycle </h3><p>
<label>Start: <?php echo $_smarty_tpl->tpl_vars['startDate']->value->format('F j, Y');?>
</label>
<br>
<label>End: <?php echo $_smarty_tpl->tpl_vars['endDate']->value->format('F j, Y');?>
</label>
<br>
<input
    type="text" 
    name="remainingDays" 
    id="remainingDays" 
    value="<?php echo $_smarty_tpl->tpl_vars['remainingDays']->value;?>
"
    onKeyUp="calculateTotalDailyOutflow();"/>
<label>Days left</label>

<h4>Summary</h4>   
<input 
	disabled 
    type="text"
    name="totalOutstInflow" 
    id="totalOutstInflow" 
    value="0.00"/>
<label>Total Awaiting Inflow</label>
<br>
<input 
	disabled 
    type="text"
    name="totalReceivedInflow" 
    id="totalReceivedInflow" 
    value="0.00"/>
<label>Total Received Inflow</label>
<br>
<input 
	disabled 
    type="text" 
    name="totalOutstOutflow" 
    id="totalOutstOutflow" 
    value="0.00"/>
<label>Total Outstanding Outflow</label>
<br>
<input 
	disabled 
    type="text" 
    name="totalDailyOutflow" 
    id="totalDailyOutflow" 
    value="0.00"/>
<label>Total Daily Expenses @ P<?php echo $_smarty_tpl->tpl_vars['dailyOutflowSum']->value;?>
 per day</label>
<br>
<input 
	disabled 
    type="text" 
    name="difference" 
    id="difference" 
    value="0.00"/>
<label id="differenceLabel">Difference</label>
<h4>Cash Available</h4>
<form  id="cashForm"> 
<input 
	disabled 
    type="text"
    name="totalCash" 
    id="totalCash" 
    value="0.00"/>
<label>Total</label>
<br>
<input
	type="text"
    class="cash"
    name="cashOnHand" 
    id="cashOnHand" 
    value="<?php echo $_smarty_tpl->tpl_vars['cashOnHand']->value;?>
"
    onkeyup="calculateTotalCash();"/>
<label>Cash-on-Hand:</label>
<?php  $_smarty_tpl->tpl_vars['account'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['account']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrAccounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['account']->key => $_smarty_tpl->tpl_vars['account']->value){
$_smarty_tpl->tpl_vars['account']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['account']->value->getStatusValue()=="Active"){?>
<br>
<input
	type="text"
    class="cash"
    name="account[<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
    id="account[<?php echo $_smarty_tpl->tpl_vars['account']->value->getID();?>
]" 
    value="<?php echo $_smarty_tpl->tpl_vars['account']->value->getCurrentAmount();?>
"
    onkeyup="calculateTotalCash();"/>
<label><?php echo $_smarty_tpl->tpl_vars['account']->value->getTitle();?>
</label>
<?php }?>
<?php } ?>
</form>
<button 
	onClick="view_cycle.php?selectedCycleID=<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
" 
    form="cashForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>
    
<h4>Inflow<button onClick="addNewInflow()">+</button></h4>
<form  id="inflowsForm"> 
<?php  $_smarty_tpl->tpl_vars['inflow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['inflow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrInflows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['inflow']->key => $_smarty_tpl->tpl_vars['inflow']->value){
$_smarty_tpl->tpl_vars['inflow']->_loop = true;
?>
    <input 
    	type="hidden" 
    	name="inflow[current][index][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"  
        id="inflow[current][index][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"  
        value="<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
"/>
    <input 
    	type="text" 
    	placeholder="title" 
    	class="inflow[current][title]"
        name="inflow[current][title][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
    	id="inflow[current][title][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"
        value="<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getTitle();?>
"/>
    <select  
    	class="inflow[current][owner]" 
        name="inflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"/>
        <option value="0" disabled>- From -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value->getID()==$_smarty_tpl->tpl_vars['inflow']->value->getOwnerID()){?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
" selected><?php echo $_smarty_tpl->tpl_vars['option']->value->getTitle();?>
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
        formaction="view_cycle.php?selectedCycleID=<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
" 
        formmethod="post" 
        name="inflow[delete][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"  
        id="inflow[delete][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="outstanding amount" 
        class="inflow[current][outstAmount] money" 
        name="inflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getOutstAmount();?>
" 
        onkeyup="calculateTotalOutstInflow();"/>
    <input 
    	type="text" 
        placeholder="received amount" 
        class="inflow[current][receivedAmount] money" 
        name="inflow[current][receivedAmount][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][receivedAmount][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getReceivedAmount();?>
"
        onkeyup="calculateTotalReceivedInflow();"/>
    <br>
    <select  
    	class="inflow[current][budgetType]" 
        name="inflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"/>
        <option value="Budget Type" disabled>- Budget Type -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrBudgetTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['inflow']->value->getBudgetTypeValue()){?>
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
    <select  
    	class="inflow[current][flowType]" 
        name="inflow[current][flowType][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][flowType][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"/>
        <option value="Type" disabled>- Type -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrFlowTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['inflow']->value->getFlowTypeValue()){?>
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
        class="inflow[current][comment]" 
        name="inflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getComment();?>
"/>
    <select 
 	   	class="inflow[current][status]" 
    	name="inflow[current][status][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]" 
        id="inflow[current][status][<?php echo $_smarty_tpl->tpl_vars['inflow']->value->getID();?>
]"
        onchange="calculateTotalOutstInflow(); calculateTotalReceivedInflow();"/>
        <option value="Status" disabled>- Status -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptionsIn']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['inflow']->value->getStatusValue()){?>
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

</form>
<button 
	onClick="view_cycle.php?selectedCycleID=<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
" 
    form="inflowsForm" 
    formmethod="post"
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>
<h4>Outflow<button onClick="addNewOutflow()">+</button></h4>
<form id="outflowsForm"> 
<?php  $_smarty_tpl->tpl_vars['outflow'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['outflow']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOutflows']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['outflow']->key => $_smarty_tpl->tpl_vars['outflow']->value){
$_smarty_tpl->tpl_vars['outflow']->_loop = true;
?>
    <input type="hidden" 
    name="outflow[current][index][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"  
    id="outflow[current][index][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"  
    value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
"/>
    <input
    	type="text" 
        placeholder="title" 
        class="outflow[current][title]"
       	name="outflow[current][title][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][title][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getTitle();?>
"/>
    <select 
    	class="outflow[current][owner]" 
    	name="outflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][owner][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"/>
        <option value="0" disabled>- For -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value->getID()==$_smarty_tpl->tpl_vars['outflow']->value->getOwnerID()){?>
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
    <input 
    	type="text" 
   		readonly
        placeholder="outstanding amount" 
        class="outflow[current][outstAmount] money" 
        name="outflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][outstAmount][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getOutstAmount();?>
"
        onkeyup="calculateTotalOutstOutflow();"/>
    <button 
    	type="submit" 
        formaction="view_cycle.php?selectedCycleID=<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
" 
        formmethod="post" 
        name="outflow[delete][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"  
        id="outflow[delete][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="unit amount" 
        class="outflow[current][unitAmount] money" 
        name="outflow[current][unitAmount][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][unitAmount][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getUnitAmount();?>
"
        onKeyUp="calculateOutsAmount(<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
)"/>
    <input 
    	type="text" 
        placeholder="total units" 
        class="outflow[current][totalUnits]" 
        name="outflow[current][totalUnits][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][totalUnits][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getTotalUnits();?>
"/>
    <input 
    	type="text" 
        placeholder="outstanding units" 
        class="outflow[current][outstUnits]" 
        name="outflow[current][outstUnits][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][outstUnits][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getOutstUnits();?>
"
        onKeyUp="calculateOutsAmount(<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
)"/>
    <br>
    <select 
    	class="outflow[current][budgetType]" 
        name="outflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][budgetType][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"/>
        <option value="Budget Type" disabled>- Budget Type -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrBudgetTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['outflow']->value->getBudgetTypeValue()){?>
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
    <select 
    	class="outflow[current][flowType]" 
        name="outflow[current][flowType][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][flowType][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"/>
        <option value="Type" disabled>- Type -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrFlowTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['outflow']->value->getFlowTypeValue()){?>
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
        class="outflow[current][comment]" 
        name="outflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        id="outflow[current][comment][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getComment();?>
"/>
    <select 
    	class="outflow[current][status]" 
        name="outflow[current][status][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]" 
    	id="outflow[current][status][<?php echo $_smarty_tpl->tpl_vars['outflow']->value->getID();?>
]"
        onchange="calculateTotalOutstOutflow();"/>
        <option value="Status" disabled>- Status -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptionsOut']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
            <?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['outflow']->value->getStatusValue()){?>
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
</form>

<button 
	onClick="view_cycle.php?selectedCycleID=<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
" 
    form="outflowsForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
var arrStatusOptionsIn = ["- Status -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptionsIn']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    "<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
",
<?php } ?>
];

var arrStatusOptionsOut = ["- Status -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptionsOut']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    "<?php echo $_smarty_tpl->tpl_vars['option']->value;?>
",
<?php } ?>
];

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

var arrFlowTypeOptions = ["- Type -",
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrFlowTypeOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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

var arrRecipientsID = [null,
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

var arrSourcesID = [null,
<?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrOwners']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
    <?php echo $_smarty_tpl->tpl_vars['option']->value->getID();?>
,
<?php } ?>
];

var dailyOutflowSum = <?php echo $_smarty_tpl->tpl_vars['dailyOutflowSum']->value;?>
;
</script>

<script>
var countInflow=0, countOutflow=0;

function addNewInflow() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="inflow[new][index][]";
	index.id="inflow[new][index][]";
	index.value=countInflow;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="inflow[new][title][]";
	title.id="inflow[new][title][]";
	title.placeholder="title";
	
	var owner=document.createElement("select");
	owner.name="inflow[new][owner][]";
	owner.id="inflow[new][owner][]";
			
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
	outstAmount.name="inflow[new][outstAmount][]";
	outstAmount.id="inflow[new][outstAmount][]";
	outstAmount.class="inflow[new][outstAmount]";
	outstAmount.placeholder="outstanding amount";
	//outstAmount.onchange="calculateTotalOutstInflow();";
	
	var receivedAmount=document.createElement("input");
	receivedAmount.type="text";
	receivedAmount.name="inflow[new][receivedAmount][]";
	receivedAmount.id="inflow[new][receivedAmount][]";
	receivedAmount.placeholder="received amount";
	
	var budgetType=document.createElement("select");
	budgetType.name="inflow[new][budgetType][]";
	budgetType.id="inflow[new][budgetType][]";
	
	for(var i=0; i < arrBudgetTypeOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrBudgetTypeOptions[i];
		option.appendChild(document.createTextNode(arrBudgetTypeOptions[i]));
		budgetType.appendChild(option);
	}
	
	var flowType=document.createElement("select");
	flowType.name="inflow[new][flowType][]";
	flowType.id="inflow[new][flowType][]";
	
	for(var i=0; i < arrFlowTypeOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrFlowTypeOptions[i];
		option.appendChild(document.createTextNode(arrFlowTypeOptions[i]));
		flowType.appendChild(option);
	}
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="inflow[new][comment][]";
	comment.id="inflow[new][comment][]";
	comment.placeholder="comment";
	
	var status=document.createElement("select");
	status.name="inflow[new][status][]";
	status.id="inflow[new][status][]";
	
	for(var i=0; i < arrStatusOptionsIn.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrStatusOptionsIn[i];
		option.appendChild(document.createTextNode(arrStatusOptionsIn[i]));
		status.appendChild(option);
	}
	
	$("#inflowsForm").append(
		index, title, owner, 
		"<br>",
		outstAmount, receivedAmount,
		"<br>",
		budgetType, flowType, comment, status,
		"<br><br>"
		);
	countInflow++;
}

function addNewOutflow() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="outflow[new][index][]";
	index.id="outflow[new][index][]";
	index.value=countOutflow;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="outflow[new][title][]";
	title.id="outflow[new][title][]";
	title.placeholder="title";
	
	var owner=document.createElement("select");
	owner.name="outflow[new][owner][]";
	owner.id="outflow[new][owner][]";
	
	for(var i=0; i < arrRecipients.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrRecipientsID[i];
		option.appendChild(document.createTextNode(arrRecipients[i]));
		owner.appendChild(option);
	}
	
	var outstAmount=document.createElement("input");
	outstAmount.type="text";
	outstAmount.name="outflow[new][outstAmount][]";
	outstAmount.id="outflow[new][outstAmount][]";
	outstAmount.placeholder="outstanding amount";
	
	var budgetType=document.createElement("select");
	budgetType.name="outflow[new][budgetType][]";
	budgetType.id="outflow[new][budgetType][]";
	
	for(var i=0; i < arrBudgetTypeOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrBudgetTypeOptions[i];
		option.appendChild(document.createTextNode(arrBudgetTypeOptions[i]));
		budgetType.appendChild(option);
	}
	
	var flowType=document.createElement("select");
	flowType.name="outflow[new][flowType][]";
	flowType.id="outflow[new][flowType][]";
	
	for(var i=0; i < arrFlowTypeOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrFlowTypeOptions[i];
		option.appendChild(document.createTextNode(arrFlowTypeOptions[i]));
		flowType.appendChild(option);
	}
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="outflow[new][comment][]";
	comment.id="outflow[new][comment][]";
	comment.placeholder="comment";
	
	var unitAmount=document.createElement("input");
	unitAmount.type="text";
	unitAmount.name="outflow[new][unitAmount][]";
	unitAmount.id="outflow[new][unitAmount][]";
	unitAmount.placeholder="unit amount";
	
	var totalUnits=document.createElement("input");
	totalUnits.type="text";
	totalUnits.name="outflow[new][totalUnits][]";
	totalUnits.id="outflow[new][totalUnits][]";
	totalUnits.placeholder="total units";
	
	var outstUnits=document.createElement("input");
	outstUnits.type="text";
	outstUnits.name="outflow[new][outstUnits][]";
	outstUnits.id="outflow[new][outstUnits][]";
	outstUnits.placeholder="outstanding units";
	
	var status=document.createElement("select");
	status.name="outflow[new][status][]";
	status.id="outflow[new][status][]";
	
	for(var i=0; i < arrStatusOptionsOut.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrStatusOptionsOut[i];
		option.appendChild(document.createTextNode(arrStatusOptionsOut[i]));
		status.appendChild(option);
	}
	
	$("#outflowsForm").append(
		index, title, owner, outstAmount,
		"<br>",
		unitAmount, outstUnits, totalUnits,
		"<br>",
		budgetType, flowType, comment, status,
		"<br><br>"
		);
	countOutflow++;
}

function calculateDifference() {
	var totalOutstInflow = parseFloat((document.getElementById('totalOutstInflow').value).replace(/[^0-9-.]/g, ''));
	var totalCash = parseFloat((document.getElementById('totalCash').value).replace(/[^0-9-.]/g, ''));
	var totalOutstOutflow  = parseFloat((document.getElementById('totalOutstOutflow').value).replace(/[^0-9-.]/g, ''));
	var totalDailyOutflow  = parseFloat((document.getElementById('totalDailyOutflow').value).replace(/[^0-9-.]/g, ''));

	var difference = totalOutstInflow + totalCash - totalOutstOutflow - totalDailyOutflow;

	if (difference > 0) {
		document.getElementById('differenceLabel').innerHTML = "Surplus";
		document.getElementById('difference').value = difference.formatMoney(2, 'P', ',', '.');
	}
	else {
		document.getElementById('differenceLabel').innerHTML = "Deficit";
		document.getElementById('difference').value = (Math.abs(difference)).formatMoney(2, 'P', ',', '.');
	}
}

function calculateOutsAmount(argID) {
	var outstUnits = parseFloat(document.getElementById("outflow[current][outstUnits]["+argID+"]").value);
	var unitAmount = parseFloat(document.getElementById("outflow[current][unitAmount]["+argID+"]").value);

	var outstAmount = outstUnits * unitAmount;
	
	if (outstAmount > 0) {
		document.getElementById("outflow[current][outstAmount]["+argID+"]").value = outstAmount;
	}
	else {
		document.getElementById("outflow[current][outstAmount]["+argID+"]").value = "P0.00";
	}
}

function calculateTotalCash() {
	var cashArr = document.getElementsByClassName('cash');
	var total=0;
	var value=0;
	
	for(var i=0; i < cashArr.length; i++) { 
		value = parseFloat(cashArr[i].value);
		if (!isNaN(value)) {
			total += value;
		}
	}
	
	if (total > 0) {
		document.getElementById('totalCash').value = total.formatMoney(2, 'P', ',', '.');
	}
	else {
		document.getElementById('totalCash').value = "P0.00";
	}
	
	calculateDifference();
}

function calculateTotalOutstInflow() {
	var currentOutstAmountArr = document.getElementsByClassName('inflow[current][outstAmount]');
	var currentStatusArr = document.getElementsByClassName('inflow[current][status]');
	
	var newOutstAmountArr = document.getElementsByClassName('inflow[new][outstAmount]');
	var total=0;
	var value=0;
	
	for(var i=0; i < currentOutstAmountArr.length; i++) {
		if (currentStatusArr[i].value == "Awaiting" || currentStatusArr[i].value == "Received") {
			value = parseFloat(currentOutstAmountArr[i].value);
			if (!isNaN(value)) {
				total += value;
			}
		}
	}
	
	for(var i=0; i < newOutstAmountArr.length; i++) { 
		if (currentStatusArr[i].value == "Awaiting" || currentStatusArr[i].value == "Received") {
			value = parseFloat(newOutstAmountArr[i].value);
			if (!isNaN(value)) {
				total += value;
			}
		}
	}
	
	if (total > 0) {
		document.getElementById('totalOutstInflow').value = total.formatMoney(2, 'P', ',', '.');
	}
	else {
		document.getElementById('totalOutstInflow').value = "P0.00";
	}
	
	calculateDifference();
}

function calculateTotalReceivedInflow() {
	var currentReceivedAmountArr = document.getElementsByClassName('inflow[current][receivedAmount]');
	var currentStatusArr = document.getElementsByClassName('inflow[current][status]');
		
	var newReceivedAmountArr = document.getElementsByClassName('inflow[new][receivedAmount]');
	var newStatusArr = document.getElementsByClassName('inflow[new][status]');
	
	var total=0;
	var value=0;
	
	for(var i=0; i < currentReceivedAmountArr.length; i++) {
		if (currentStatusArr[i].value == "Awaiting" || currentStatusArr[i].value == "Received") {
			value = parseFloat(currentReceivedAmountArr[i].value);
			if (!isNaN(value)) {
				total += value;
			}
		}
	}
	
	for(var i=0; i < newReceivedAmountArr.length; i++) {
		if (newStatusArr[i].value == "Awaiting" || newStatusArr[i].value == "Received") {
			value = parseFloat(newReceivedAmountArr[i].value);
			if (!isNaN(value)) {
				total += value;
			}
		}
	}
	
	if (total > 0) {
		document.getElementById('totalReceivedInflow').value = total.formatMoney(2, 'P', ',', '.');
	}
	else {
		document.getElementById('totalReceivedInflow').value = "P0.00";
	}
}

function calculateTotalOutstOutflow() {
	var currentOutstAmountArr = document.getElementsByClassName('outflow[current][outstAmount]');
	var currentStatusArr = document.getElementsByClassName('outflow[current][status]');
	
	var newOutstAmountArr = document.getElementsByClassName('outflow[new][outstAmount]');
	var newStatusArr = document.getElementsByClassName('outflow[new][status]');
	
	var total=0;
	var value=0;
	
	for(var i=0; i < currentOutstAmountArr.length; i++) { 
		if (currentStatusArr[i].value == "Outstanding") {
			value = parseFloat(currentOutstAmountArr[i].value);
			if (!isNaN(value)) {
				total += value;
			}
		}
	}
	
	for(var i=0; i < newOutstAmountArr.length; i++) { 
		if (newStatusArr[i].value == "Outstanding") {
			value = parseFloat(newOutstAmountArr[i].value);
			if (!isNaN(value)) {
				total += value;
			}
		}
	}

	if (total > 0) {
		document.getElementById('totalOutstOutflow').value = total.formatMoney(2, 'P', ',', '.');
	}
	else {
		document.getElementById('totalOutstOutflow').value = "P0.00";
	}
	
	calculateDifference();
}

function calculateTotalDailyOutflow() {
	var remainingDays = parseInt(document.getElementById('remainingDays').value);
	if (isNaN(remainingDays)) {
		remainingDays = 0;
	}
	
	var total = dailyOutflowSum * remainingDays;
	
	document.getElementById('totalDailyOutflow').value = total.formatMoney(2, 'P', ',', '.');
	
	calculateDifference();
}


Number.prototype.formatMoney = function(places, symbol, thousand, decimal) {
	places = !isNaN(places = Math.abs(places)) ? places : 2;
	symbol = symbol !== undefined ? symbol : "$";
	thousand = thousand || ",";
	decimal = decimal || ".";
	var number = this, 
	    negative = number < 0 ? "-" : "",
	    i = parseInt(number = Math.abs(+number || 0).toFixed(places), 10) + "",
	    j = (j = i.length) > 3 ? j % 3 : 0;
	return symbol + negative + (j ? i.substr(0, j) + thousand : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thousand) + (places ? decimal + Math.abs(number - i).toFixed(places).slice(2) : "");
};

$( document ).ready(function() {
	calculateTotalCash(); 
	calculateTotalOutstInflow(); 
	calculateTotalOutstOutflow(); 
	calculateTotalReceivedInflow();
    calculateTotalDailyOutflow();
    calculateDifference();
});

</script>
</body><?php }} ?>