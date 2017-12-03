<?php
/* Smarty version 3.1.31, created on 2017-11-24 19:29:10
  from "C:\xampp\htdocs\BazaOgloszen\templates\EditUser.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a1864f601e377_48971014',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9160878bcaa7f7a401ad228700db4404c563838' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\EditUser.html.php',
      1 => 1511548148,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a1864f601e377_48971014 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Edycja Użytkownika</h1>

<?php if (isset($_smarty_tpl->tpl_vars['oneUser']->value) && count($_smarty_tpl->tpl_vars['oneUser']->value) === 1) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['oneUser']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
users/update" method="post">
    <input type="hidden" id="id" name="id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">
    Login: <input type="text" name="login" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
" required /><br />
    Hasło: <input type="password" name="password" /><br />
    Imię: <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
" required /><br />
    Nazwisko: <input type="text" name="surname" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
" required /><br />
    <input type="submit" value="Aktualizuj" />
</form>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
