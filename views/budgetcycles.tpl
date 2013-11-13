<!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3> Budget Cycles <button onClick="addNewCycle()">+</button></h3><p> 
<form action="view_cycle.php" method="get" id="selectedCycleForm"></form>
<form action="budgetcycles.php" method="post" id="cyclesForm">
    *{foreach from=$arrCycles item=cycle}*
    <input 
    	type="hidden" 
        name="cycle[current][index][*{$cycle->getID()}*]"  
        id="cycle[current][index][*{$cycle->getID()}*]"  
        value="*{$cycle->getID()}*"/>
    <button 
    	type="submit" 
        form="selectedCycleForm" 
        name="selectedCycleID"  
        id="selectedCycleID" 
        value="*{$cycle->getID()}*"
        >Visit Cycle</button>
    <br>
    <input 
    	type="text" 
        placeholder="start date" 
        name="cycle[current][startDate][*{$cycle->getID()}*]" 
        id="cycle[current][startDate][*{$cycle->getID()}*]" 
        value="*{$cycle->getStartDateString()}*"/>
    <button 
    	type="submit" 
        form="cyclesForm" 
        name="cycle[delete][*{$cycle->getID()}*]"  
        id="cycle[delete][*{$cycle->getID()}*]" 
        value="*{$cycle->getID()}*"
        >X</button>
    <br>
    <input 
    	type="text" 
        placeholder="end date" 
        name="cycle[current][endDate][*{$cycle->getID()}*]" 
        id="cycle[current][endDate][*{$cycle->getID()}*]" 
        value="*{$cycle->getEndDateString()}*"/>
    <br>
    <select 
    	name="cycle[current][status][*{$cycle->getID()}*]" 
        id="cycle[current][status][*{$cycle->getID()}*]"/>
        <option value="0" disabled>- Status -</option>
        *{foreach from=$arrStatusOptions item=option}*
        	*{if $option == $cycle->getStatusValue()}*
            <option value="*{$option}*" selected>*{$option}*</option>
        	*{else}*
            <option value="*{$option}*">*{$option}*</option>
            *{/if}*
        *{/foreach}*
    </select>
    <br><br>
    *{/foreach}*
</form>
<input 
	name="submit" 
    form="cyclesForm" 
    type="submit" 
    value="Submit"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
var arrStatusOptions = ["- Status -",
*{foreach from=$arrStatusOptions item=option}*
    "*{$option}*",
*{/foreach}*
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
</body>