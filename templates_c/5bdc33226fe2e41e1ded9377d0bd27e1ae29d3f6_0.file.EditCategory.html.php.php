<?php
/* Smarty version 3.1.31, created on 2017-12-03 16:21:58
  from "C:\xampp\htdocs\BazaOgloszen\templates\EditCategory.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2416968df920_69225372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bdc33226fe2e41e1ded9377d0bd27e1ae29d3f6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\EditCategory.html.php',
      1 => 1512314514,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a2416968df920_69225372 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Edycja Kategorii</h1>

<?php if (isset($_smarty_tpl->tpl_vars['oneCat']->value) && count($_smarty_tpl->tpl_vars['oneCat']->value) === 1) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['oneCat']->value, 'name', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['name']->value) {
?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
categories/update" method="post">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
    Nazwa kategorii: <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
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
