<!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Daily Expenses<button onClick="addNewDailyOutflow()">+</button></h3>

<form  id="dailyOutflowsForm"> 
*{foreach from=$arrDailyOutflows item=dailyOutflow}*
<input 
	type="hidden" 
    name="dailyOutflow[current][index][*{$dailyOutflow->getID()}*]"  
    id="dailyOutflow[current][index][*{$dailyOutflow->getID()}*]"  
    value="*{$dailyOutflow->getID()}*"/>
<input 
	type="text" 
    placeholder="title" 
    name="dailyOutflow[current][title][*{$dailyOutflow->getID()}*]" 
    id="dailyOutflow[current][title][*{$dailyOutflow->getID()}*]" 
    value="*{$dailyOutflow->getTitle()}*"/>
<input 
	type="text" 
    placeholder="comment" 
    name="dailyOutflow[current][comment][*{$dailyOutflow->getID()}*]" 
    id="dailyOutflow[current][comment][*{$dailyOutflow->getID()}*]" 
    value="*{$dailyOutflow->getComment()}*"/>
<button 
	type="submit" 
    formaction="dailyexpenses.php" 
    formmethod="post" 
    name="dailyOutflow[delete][*{$dailyOutflow->getID()}*]"  
    id="delete[dailyOutflow][*{$dailyOutflow->getID()}*]" 
    value="*{$dailyOutflow->getID()}*"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="unit amount" 
    name="dailyOutflow[current][unitAmount][*{$dailyOutflow->getID()}*]" 
    id="dailyOutflow[current][unitAmount][*{$dailyOutflow->getID()}*]" 
    value="*{$dailyOutflow->getUnitAmount()}*"/>
<input 
	type="text" 
    placeholder="total units" 
    name="dailyOutflow[current][totalUnits][*{$dailyOutflow->getID()}*]" 
    id="dailyOutflow[current][totalUnits][*{$dailyOutflow->getID()}*]" 
    value="*{$dailyOutflow->getTotalUnits()}*"/>
<br><br>
*{/foreach}*
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
</body>