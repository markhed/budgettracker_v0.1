<?php /* Smarty version Smarty-3.1.13, created on 2013-07-03 03:21:19
         compiled from "views\budgetcycles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:319751d37c8f212d58-59836254%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30f14326393131524faa1a4a646483256812506b' => 
    array (
      0 => 'views\\budgetcycles.tpl',
      1 => 1372497677,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '319751d37c8f212d58-59836254',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'arrCycles' => 0,
    'cycle' => 0,
    'arrStatusOptions' => 0,
    'option' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_51d37c8f999821_44996091',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51d37c8f999821_44996091')) {function content_51d37c8f999821_44996091($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3> Budget Cycles <button onClick="addNewCycle()">+</button></h3><p> 
<form action="view_cycle.php" method="get" id="selectedCycleForm"></form>
<form action="budgetcycles.php" method="post" id="cyclesForm">
    <?php  $_smarty_tpl->tpl_vars['cycle'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['cycle']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrCycles']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['cycle']->key => $_smarty_tpl->tpl_vars['cycle']->value){
$_smarty_tpl->tpl_vars['cycle']->_loop = true;
?>
    <input 
    	type="hidden" 
        name="cycle[current][index][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]"  
        id="cycle[current][index][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]"  
        value="<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
"/>
    <button 
    	type="submit" 
        form="selectedCycleForm" 
        name="selectedCycleID"  
        id="selectedCycleID" 
        value="<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
"
        >Visit Cycle</button>
    <br>
    <input 
    	type="text" 
        placeholder="start date" 
        name="cycle[current][startDate][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]" 
        id="cycle[current][startDate][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getStartDateString();?>
"/>
    <button 
    	type="submit" 
        form="cyclesForm" 
        name="cycle[delete][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]"  
        id="cycle[delete][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="end date" 
        name="cycle[current][endDate][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]" 
        id="cycle[current][endDate][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]" 
        value="<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getEndDateString();?>
"/>
    <br>
    <select 
    	name="cycle[current][status][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]" 
        id="cycle[current][status][<?php echo $_smarty_tpl->tpl_vars['cycle']->value->getID();?>
]"/>
        <option value="0" disabled>- Status -</option>
        <?php  $_smarty_tpl->tpl_vars['option'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['option']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['arrStatusOptions']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['option']->key => $_smarty_tpl->tpl_vars['option']->value){
$_smarty_tpl->tpl_vars['option']->_loop = true;
?>
        	<?php if ($_smarty_tpl->tpl_vars['option']->value==$_smarty_tpl->tpl_vars['cycle']->value->getStatusValue()){?>
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
<input 
	name="submit" 
    form="cyclesForm" 
    type="submit" 
    value="Submit"/>

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
var countCycle=0;
function addNewCycle() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="cycle[new][index][]";
	index.id="cycle[new][index][]";
	index.value=countCycle;
	
	var startDate=document.createElement("input");
	startDate.type="text";
	startDate.name="cycle[new][startDate][]";
	startDate.id="cycle[new][startDate][]";
	startDate.placeholder="start date";
	
	var endDate=document.createElement("input");
	endDate.type="text";
	endDate.name="cycle[new][endDate][]";
	endDate.id="cycle[new][endDate][]";
	endDate.placeholder="end date";
	
	var status=document.createElement("select");
	status.name="cycle[new][status][]";
	status.id="cycle[new][status][]";
		
	for(var i=0; i < arrStatusOptions.length; i++) {
		var option=document.createElement("option");
		if (i == 0) {
			option.disabled = true;
		}
		option.value=arrStatusOptions[i];
		option.appendChild(document.createTextNode(arrStatusOptions[i]));
		status.appendChild(option);
	}
	
	$("#cyclesForm").prepend(
		index, 
		startDate, "<br>",
		endDate, "<br>",
		status, "<p>"
	);
	countCycle++;
}
</script>
</body><?php }} ?>