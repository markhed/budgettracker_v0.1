<form 
	id="loginForm" 
	method="post" 
    action="login.php">
SIGN IN
<br>
<input 
	type="text" 
    placeholder="account"
    name="accountLogin" 
    id="accountLogin">
<br>
<input 
	type="password" 
    placeholder="password"
	name="password" 
	id="password">
</form>
<button 
    form="loginForm" 
    formmethod="post"
    name="submit" 
    id="submit" 
    value="submit"
    >Submit</button>
<button 
    onclick="direct('signup.php');"
    >Sign Up</button>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
function direct(argLocation) {
	location.href = argLocation;
}
</script>