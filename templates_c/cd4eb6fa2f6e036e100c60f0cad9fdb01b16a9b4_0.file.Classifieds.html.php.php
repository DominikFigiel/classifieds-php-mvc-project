<?php
/* Smarty version 3.1.31, created on 2017-12-03 17:05:56
  from "C:\xampp\htdocs\BazaOgloszen\templates\Classifieds.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2420e4f163e7_24280282',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd4eb6fa2f6e036e100c60f0cad9fdb01b16a9b4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\Classifieds.html.php',
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
function content_5a2420e4f163e7_24280282 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Lista ogłoszeń</h1>
<?php if (isset($_smarty_tpl->tpl_vars['allClassifieds']->value)) {
if (count($_smarty_tpl->tpl_vars['allClassifieds']->value) === 0) {?>
<b>Brak ogłoszeń w bazie!</b><br/><br/>
<?php } else { ?>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allClassifieds']->value, 'classified');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['classified']->value) {
?>
    <li>
        <strong><?php echo $_smarty_tpl->tpl_vars['classified']->value['name'];?>
</strong><br/>
        <?php echo $_smarty_tpl->tpl_vars['classified']->value['login'];?>
<br/>
        <?php echo $_smarty_tpl->tpl_vars['classified']->value['title'];?>
<br/>
        <?php echo $_smarty_tpl->tpl_vars['classified']->value['content'];?>
<br/>
        <?php echo $_smarty_tpl->tpl_vars['classified']->value['price'];?>
 <?php echo $_smarty_tpl->tpl_vars['classified']->value['date'];?>

        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
classifieds/edit/<?php echo $_smarty_tpl->tpl_vars['classified']->value['id'];?>
">edycja</a>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
classifieds/delete/<?php echo $_smarty_tpl->tpl_vars['classified']->value['id'];?>
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
classifieds/add">Dodaj ogłoszenie</a>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
