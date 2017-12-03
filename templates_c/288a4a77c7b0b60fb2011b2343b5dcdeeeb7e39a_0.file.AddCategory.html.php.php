<?php
/* Smarty version 3.1.31, created on 2017-11-23 20:05:40
  from "C:\xampp\htdocs\BazaOgloszen\templates\AddCategory.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a171c045b0b97_74362224',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '288a4a77c7b0b60fb2011b2343b5dcdeeeb7e39a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\AddCategory.html.php',
      1 => 1511463939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a171c045b0b97_74362224 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h1>Dodaj kategorię</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
categories/insert" method="post">
    Nazwa kategorii: <input type="text" name="name" /><br />
    <input type="submit" value="Dodaj" />
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
