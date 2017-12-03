<?php
/* Smarty version 3.1.31, created on 2017-12-03 17:16:24
  from "C:\xampp\htdocs\BazaOgloszen\templates\Categories.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a242358812f96_99415094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0ec83e063ff06bc58bd65d66b285e6fbd8b44450' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\Categories.html.php',
      1 => 1512317077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a242358812f96_99415094 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Lista kategorii</h1>
<?php if (isset($_smarty_tpl->tpl_vars['allCats']->value)) {
if (count($_smarty_tpl->tpl_vars['allCats']->value) === 0) {?>
<b>Brak kategorii w bazie!</b><br/><br/>
<?php } else { ?>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'name', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['name']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['name']->value;?>

        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
categories/edit/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">edycja</a>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
categories/delete/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">usuń</a>
    </li>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

</ul>
<?php }
}
if (isset($_smarty_tpl->tpl_vars['error']->value)) {?>
<strong><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</strong>
<?php }?>
<a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
categories/add">Dodaj kategorię</a>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
