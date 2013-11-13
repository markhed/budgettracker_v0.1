<!DOCTYPE html>
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
    value="*{$cashOnHand}*"/>
<h3> Accounts <button onClick="addNewAccount()">+</button></h3><p> 
<form 
	action="accounts.php" 
    method="post" 
    id="accountsForm">
*{foreach from=$arrAccounts item=account}*
    <input 
    	type="hidden" 
        name="account[current][index][*{$account->getID()}*]"  
        id="account[current][index][*{$account->getID()}*]"  
        value="*{$account->getID()}*"/>
    <input 
    	type="text" 
        placeholder="title" 
        name="account[current][title][*{$account->getID()}*]" 
        id="account[current][title][*{$account->getID()}*]" 
        value="*{$account->getTitle()}*"/>
    <button 
    	type="submit" 
        form="accountsForm" 
        name="account[delete][*{$account->getID()}*]"  
        id="account[delete][*{$account->getID()}*]" 
        value="*{$account->getID()}*"
        >X
    </button>
    <br>
    <input 
    	type="text" 
        placeholder="account number (last 4)" 
        name="account[current][accountNum][*{$account->getID()}*]" 
        id="account[current][accountNum][*{$account->getID()}*]" 
        value="*{$account->getAccountNum()}*"/> 
    <br>
    <input 
    	type="text" 
        placeholder="amount" 
        name="account[current][currentAmount][*{$account->getID()}*]" 
        id="account[current][currentAmount][*{$account->getID()}*]" 
        value="*{$account->getCurrentAmount()}*"/>
    <br>
    <select 
    	name="account[current][status][*{$account->getID()}*]" 
        id="account[current][status][*{$account->getID()}*]"/>
        <option value="0" disabled>- Status -</option>
        *{foreach from=$arrStatusOptions item=option}*
            *{if $option == $account->getStatusValue()}*
            <option value="*{$option}*" selected>*{$option}*</option>
            *{else}*
            <option value="*{$option}*">*{$option}*</option>
            *{/if}*
        *{/foreach}*
    </select>
    <br><br>
*{/foreach}*
<input 
	name="submit" 
    form="accountsForm" 
    type="submit" 
    value="Submit"/>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript">
var arrStatusOptions = ["- Status -",
*{foreach from=$arrStatusOptions item=option}*
    "*{$option}*",
*{/foreach}*
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
</body>