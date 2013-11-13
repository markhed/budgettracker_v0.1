<!DOCTYPE html>
<html>
<head>
</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Credit Cards<button onClick="addNewCreditCard()">+</button></h3>

<form  id="creditCardsForm"> 
*{foreach from=$arrCreditCards item=creditCard}*
<input 
	type="hidden" 
    name="creditCard[current][index][*{$creditCard->getID()}*]"  
    id="creditCard[current][index][*{$creditCard->getID()}*]"  
    value="*{$creditCard->getID()}*"/>
<input 
	type="text" 
    placeholder="title" 
    name="creditCard[current][title][*{$creditCard->getID()}*]" 
    id="creditCard[current][title][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getTitle()}*"/>
<input 
	type="text" 
    placeholder="comment" 
    name="creditCard[current][comment][*{$creditCard->getID()}*]" 
    id="creditCard[current][comment][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getComment()}*"/>
<input 
	type="text" 
    placeholder="bank" 
    name="creditCard[current][bank][*{$creditCard->getID()}*]" 
    id="creditCard[current][bank][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getBank()}*"/>
<button 
	type="submit" 
    formaction="creditcards.php" 
    formmethod="post" 
    name="creditCard[delete][*{$creditCard->getID()}*]"  
    id="delete[creditCard][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getID()}*"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="cutoff date" 
    name="creditCard[current][cutOffDate][*{$creditCard->getID()}*]" 
    id="creditCard[current][cutOffDate][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getCutOffDate()}*"/>
<input 
	type="text" 
	placeholder="due date" 
    name="creditCard[current][dueDate][*{$creditCard->getID()}*]" 
    id="creditCard[current][dueDate][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getDueDate()}*"/>
<input 
	type="text" 
    placeholder="account number" 
    name="creditCard[current][accountNum][*{$creditCard->getID()}*]" 
    id="creditCard[current][accountNum][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getAccountNum()}*"/>
<br>
<input 
	type="text" 
    placeholder="credit limit" 
    name="creditCard[current][creditLimit][*{$creditCard->getID()}*]" 
    id="creditCard[current][creditLimit][*{$creditCard->getID()}*]" 
    value="*{$creditCard->getCreditLimit()}*"/>
<br><br>
*{/foreach}*
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
</body>