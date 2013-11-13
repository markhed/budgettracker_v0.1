<?php /* Smarty version Smarty-3.1.13, created on 2013-08-10 09:42:16
         compiled from "views\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:26505205eed7c73ff6-74692449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb3fd37e6f529e330906b3654bbe2b19ae9511a7' => 
    array (
      0 => 'views\\index.tpl',
      1 => 1372259600,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '26505205eed7c73ff6-74692449',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5205eed8e7ac77_49790200',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5205eed8e7ac77_49790200')) {function content_5205eed8e7ac77_49790200($_smarty_tpl) {?><form 
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
</script><?php }} ?>