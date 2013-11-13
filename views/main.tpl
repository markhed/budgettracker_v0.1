Welcome, *{$firstName}*! <p>
<button 
    onclick="direct('budgetcycles.php');"
    >Budget Cycles</button>
<br>
<button 
    onclick="direct('accounts.php');"
    >Accounts</button>
<br>
<button 
    onclick="direct('periodic.php');"
    >Periodic Income and Expenses</button>
<br>
<button 
    onclick="direct('dailyexpenses.php');"
    >Daily Expenses</button>
<br>
<button 
    onclick="direct('allotments.php');"
    >Allotments</button>
<br>
<button 
    onclick="direct('creditcards.php');"
    >Credit Cards</button>
<br>
<button 
    onclick="direct('parties.php');"
    >Parties</button>
<br><br>
<button 
    onclick="direct('logout.php');"
    >Logout</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function direct(argLocation) {
	location.href = argLocation;
}
</script>