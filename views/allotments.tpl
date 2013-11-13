<!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Allotments<button onClick="addNewAllotment()">+</button></h3>

<form  id="allotmentsForm"> 
*{foreach from=$arrAllotments item=allotment}*
<input 
	type="hidden" 
    name="allotment[current][index][*{$allotment->getID()}*]"  
    id="allotment[current][index][*{$allotment->getID()}*]"  
    value="*{$allotment->getID()}*"/>
<input 
	type="text" 
    placeholder="title" 
    name="allotment[current][title][*{$allotment->getID()}*]" 
    id="allotment[current][title][*{$allotment->getID()}*]" 
    value="*{$allotment->getTitle()}*"/>
<input 
	type="text" 
    placeholder="comment" 
    name="allotment[current][comment][*{$allotment->getID()}*]" 
    id="allotment[current][comment][*{$allotment->getID()}*]" 
    value="*{$allotment->getComment()}*"/>
<button 
	type="submit" 
    formaction="allotments.php" 
    formmethod="post" 
    name="allotment[delete][*{$allotment->getID()}*]"  
    id="delete[allotment][*{$allotment->getID()}*]" 
    value="*{$allotment->getID()}*"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="current amount" 
    name="allotment[current][currentAmount][*{$allotment->getID()}*]" 
    id="allotment[current][currentAmount][*{$allotment->getID()}*]" 
    value="*{$allotment->getCurrentAmount()}*"/>
<input 
	type="text" 
    placeholder="target amount" 
    name="allotment[current][targetAmount][*{$allotment->getID()}*]" 
    id="allotment[current][targetAmount][*{$allotment->getID()}*]" 
    value="*{$allotment->getTargetAmount()}*"/>
<br>
<input 
	type="text" 
    placeholder="target date" 
    name="allotment[current][targetDate][*{$allotment->getID()}*]" 
    id="allotment[current][targetDate][*{$allotment->getID()}*]" 
    value="*{$allotment->getTargetDate()}*"/>
<br><br>
*{/foreach}*
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
</body>