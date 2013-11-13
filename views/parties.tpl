<!DOCTYPE html>
<html>
<head>

</head>

<body>
<a href="main.php"> Return to Main </a>
<h3>Parties<button onClick="addNewParty()">+</button></h3>

<form  id="partiesForm"> 
*{foreach from=$arrParties item=party}*
<input 
	type="hidden" 
    name="party[current][index][*{$party->getID()}*]"  
    id="party[current][index][*{$party->getID()}*]"  
    value="*{$party->getID()}*"/>
<input 
	type="text" 
    placeholder="title" 
    name="party[current][title][*{$party->getID()}*]" 
    id="party[current][title][*{$party->getID()}*]" 
    value="*{$party->getTitle()}*"/>
<input 
	type="text" 
    placeholder="comment" 
    name="party[current][comment][*{$party->getID()}*]" 
    id="party[current][comment][*{$party->getID()}*]" 
    value="*{$party->getComment()}*"/>
<button 
	type="submit" 
    formaction="parties.php" 
    formmethod="post" 
    name="party[delete][*{$party->getID()}*]"  
    id="delete[party][*{$party->getID()}*]" 
    value="*{$party->getID()}*"
    >X</button>
<br>
<input 
	type="text" 
    placeholder="first name" 
    name="party[current][firstName][*{$party->getID()}*]" 
    id="party[current][firstName][*{$party->getID()}*]" 
    value="*{$party->getFirstName()}*"/>
<input 
	type="text" 
    placeholder="last name" 
    name="party[current][lastName][*{$party->getID()}*]" 
    id="party[current][lastName][*{$party->getID()}*]" 
    value="*{$party->getLastName()}*"/>
<br><br>
*{/foreach}*
</form>
<button 
	formaction="parties.php" 
    form="partiesForm" 
    formmethod="post" 
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
var countParty=0;
function addNewParty() {
	var index=document.createElement("input");
	index.type="hidden";
	index.name="party[new][index][]";
	index.id="party[new][index][]";
	index.value=countParty;
	
	var title=document.createElement("input");
	title.type="text";
	title.name="party[new][title][]";
	title.id="party[new][title][]";
	title.placeholder="title";
	
	var comment=document.createElement("input");
	comment.type="text";
	comment.name="party[new][comment][]";
	comment.id="party[new][comment][]";
	comment.placeholder="comment";
	
	var firstName=document.createElement("input");
	firstName.type="text";
	firstName.name="party[new][firstName][]";
	firstName.id="party[new][firstName][]";
	firstName.placeholder="first name";
	
	var lastName=document.createElement("input");
	lastName.type="text";
	lastName.name="party[new][lastName][]";
	lastName.id="party[new][lastName][]";
	lastName.placeholder="last name";
	
	$("#partiesForm").append(
		index, title, comment,
		"<br>",
		firstName, lastName,
		"<br><br>"
		);
	countParty++;
}
</script>
</body>