 USER INFORMATION
<br>
<form id="createUserForm" action="create_user.php" method="post">
<input 
	type="text" 
    placeholder="first name"
    name="firstName" 
    id="firstName"/> 
<br>
<input 
    type="text" 
    placeholder="last name"
    name="lastName" 
    id="lastName"/>
<br>
<input 
	type="text" 
    placeholder="email address"
    name="email" 
    id="email"/> 
<br>
<input 
	type="text" 
    placeholder="account"
    name="accountLogin" 
    id="accountLogin"/>
<br>
<input 
	name="password" 
    placeholder="password"
    type="password" 
    maxlength="15"/>
</form>
<button  
    form="createUserForm" 
    formmethod="post"
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>
<button 
    onclick="direct('index.php');"
    >Cancel</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function direct(argLocation) {
	location.href = argLocation;
}
</script>
