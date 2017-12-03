<?php
/* Smarty version 3.1.31, created on 2017-11-24 19:19:13
  from "C:\xampp\htdocs\BazaOgloszen\templates\AddUser.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a1862a14e2741_64212771',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02cad4bd4305e522a98a6b7a15b50c919e82ee44' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\AddUser.html.php',
      1 => 1511547551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a1862a14e2741_64212771 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h1>Dodaj użytkownika</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
users/insert" method="post">
    Login: <input type="text" name="login" required /><br />
    Hasło: <input type="password" name="password" required /><br />
    Imię: <input type="text" name="name" required /><br />
    Nazwisko: <input type="text" name="surname" required /><br />
    <input type="submit" value="Dodaj" />
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
