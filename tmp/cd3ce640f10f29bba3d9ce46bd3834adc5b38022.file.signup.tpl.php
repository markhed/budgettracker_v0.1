<?php /* Smarty version Smarty-3.1.13, created on 2013-10-29 16:50:56
         compiled from "views\signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25268526fd960e8a1d1-55097732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd3ce640f10f29bba3d9ce46bd3834adc5b38022' => 
    array (
      0 => 'views\\signup.tpl',
      1 => 1372258672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25268526fd960e8a1d1-55097732',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_526fd96114fe48_10842701',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_526fd96114fe48_10842701')) {function content_526fd96114fe48_10842701($_smarty_tpl) {?> USER INFORMATION
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
<?php }} ?>