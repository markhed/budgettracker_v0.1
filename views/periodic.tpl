<!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3> Periodic </h3><p>
<h4>Income<button onClick="addNewPeriodicInflow()">+</button></h4>

<form  id="periodicInflowsForm"> 
*{foreach from=$arrPeriodicInflows item=periodicInflow}*
    <input 
    	type="hidden" 
        name="periodicInflow[current][index][*{$periodicInflow->getID()}*]"  
        id="periodicInflow[current][index][*{$periodicInflow->getID()}*]"  
        value="*{$periodicInflow->getID()}*"/>
    <input 
    	type="text" 
        placeholder="title" 
        name="periodicInflow[current][title][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][title][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getTitle()}*"/>
    <select 
    	name="periodicInflow[current][owner][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][owner][*{$periodicInflow->getID()}*]"/>
        <option value="0" disabled>- From -</option>
        *{foreach from=$arrOwners item=option}*
            *{if $option->getID() == $periodicInflow->getOwnerID()}*
            <option value="*{$option->getID()}*"selected>*{$option->getTitle()}*</option>
            *{else}*
            <option value="*{$option->getID()}*">*{$option->getTitle()}*</option>
            *{/if}*
        *{/foreach}*
    </select>
    <button 
    	type="submit" 
        formaction="periodic.php" 
        formmethod="post" 
        name="periodicInflow[delete][*{$periodicInflow->getID()}*]"  
        id="periodicInflow[delete][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getID()}*"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="start date" 
        name="periodicInflow[current][startDate][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][startDate][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getStartDate()}*"/>
    <input 
    	type="text" 
        placeholder="specific day" 
        name="periodicInflow[current][specificDay][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][specificDay][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getSpecificDay()}*"/>
    <input 
    	type="text" 
        placeholder="specific date" 
        name="periodicInflow[current][specificDate][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][specificDate][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getSpecificDate()}*"/>
    <input 
    	type="text" 
        placeholder="period" 
        name="periodicInflow[current][period][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][period][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getPeriod()}*"/>
    <br>
    <input 
    	type="text" 
        placeholder="outstanding amount" 
        name="periodicInflow[current][outstAmount][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][outstAmount][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getOutstAmount()}*"/>
    <input 
    	type="text" 
        placeholder="received amount" 
        name="periodicInflow[current][receivedAmount][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][receivedAmount][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getReceivedAmount()}*"/>
    <br>
    <select 
    	name="periodicInflow[current][budgetType][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][budgetType][*{$periodicInflow->getID()}*]"/>
        <option value="0" disabled>- Budget Type -</option>
        *{foreach from=$arrBudgetTypeOptions item=option}*
            *{if $option == $periodicInflow->getBudgetTypeValue()}*
            <option value="*{$option}*" selected>*{$option}*</option>
            *{else}*
            <option value="*{$option}*">*{$option}*</option>
            *{/if}*
        *{/foreach}*
    </select>
    <input 
    	type="text" 
        placeholder="comment" 
        name="periodicInflow[current][comment][*{$periodicInflow->getID()}*]" 
        id="periodicInflow[current][comment][*{$periodicInflow->getID()}*]" 
        value="*{$periodicInflow->getComment()}*"/>
    <br><br>
    *{/foreach}*
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
    *{foreach from=$arrPeriodicOutflows item=periodicOutflow}*
    <input 
    	type="hidden" 
        name="periodicOutflow[current][index][*{$periodicOutflow->getID()}*]"  
        id="periodicOutflow[current][index][*{$periodicOutflow->getID()}*]"  
        value="*{$periodicOutflow->getID()}*"/>
    <input 
    	type="text" 
        placeholder="title" 
        name="periodicOutflow[current][title][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][title][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getTitle()}*"/>
    <select 
    	name="periodicOutflow[current][owner][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][owner][*{$periodicOutflow->getID()}*]"/>
        <option value="0" disabled>- From -</option>
        *{foreach from=$arrOwners item=option}*
            *{if $option->getID() == $periodicOutflow->getOwnerID()}*
            <option value="*{$option->getID()}*"selected>*{$option->getTitle()}*</option>
            *{else}*
            <option value="*{$option->getID()}*">*{$option->getTitle()}*</option>
            *{/if}*
        *{/foreach}*
    </select>
    <button 
    	type="submit" 
        formaction="periodic.php" 
        formmethod="post" 
        name="periodicOutflow[delete][*{$periodicOutflow->getID()}*]"  
        id="periodicOutflow[delete][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getID()}*"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="start date" 
        name="periodicOutflow[current][startDate][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][startDate][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getStartDate()}*"/>
    <input 
    type="text" 
        placeholder="specific day" 
        name="periodicOutflow[current][specificDay][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][specificDay][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getSpecificDay()}*"/>
    <input 
    	type="text" 
        placeholder="specific date" 
        name="periodicOutflow[current][specificDate][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][specificDate][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getSpecificDate()}*"/>
    <input 
    	type="text" 
        placeholder="period" 
        name="periodicOutflow[current][period][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][period][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getPeriod()}*"/>
    <br>
    <input 
    	type="text" 
        placeholder="outstanding amount" 
        name="periodicOutflow[current][outstAmount][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][outstAmount][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getOutstAmount()}*"/>
    <input 
        type="text" 
        placeholder="unit amount" 
        name="periodicOutflow[current][unitAmount][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][unitAmount][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getUnitAmount()}*"/>
    <input 
    	type="text" 
        placeholder="total units" 
        name="periodicOutflow[current][totalUnits][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][totalUnits][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getTotalUnits()}*"/>
    <input 
    	type="text" 
        placeholder="outstanding units" 
        name="periodicOutflow[current][outstUnits][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][outstUnits][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getOutstUnits()}*"/>
    <br>
    <select 
    	name="periodicOutflow[current][budgetType][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][budgetType][*{$periodicOutflow->getID()}*]"/>
        <option value="0" disabled>- Budget Type -</option>
        *{foreach from=$arrBudgetTypeOptions item=option}*
            *{if $option == $periodicOutflow->getBudgetTypeValue()}*
            <option value="*{$option}*" selected>*{$option}*</option>
            *{else}*
            <option value="*{$option}*">*{$option}*</option>
            *{/if}*
        *{/foreach}*
    </select>
    <input 
    	type="text" 
        placeholder="comment" 
        name="periodicOutflow[current][comment][*{$periodicOutflow->getID()}*]" 
        id="periodicOutflow[current][comment][*{$periodicOutflow->getID()}*]" 
        value="*{$periodicOutflow->getComment()}*"/>
    <br><br>
*{/foreach}*
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
*{foreach from=$arrBudgetTypeOptions item=option}*
    "*{$option}*",
*{/foreach}*
];

var arrRecipients = ["- For -",
*{foreach from=$arrOwners item=option}*
    "*{$option->getTitle()}*",
*{/foreach}*
];

var arrRecipientsID = [0,
*{foreach from=$arrOwners item=option}*
    *{$option->getID()}*,
*{/foreach}*
];

var arrSources = ["- From -",
*{foreach from=$arrOwners item=option}*
    "*{$option->getTitle()}*",
*{/foreach}*
];

var arrSourcesID = [0,
*{foreach from=$arrOwners item=option}*
    *{$option->getID()}*,
*{/foreach}*
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
</body>