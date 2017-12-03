<?php
/* Smarty version 3.1.31, created on 2017-12-03 17:16:27
  from "C:\xampp\htdocs\BazaOgloszen\templates\Users.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a24235b714cf9_09590843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '127b5017db6966854613ed0bdbca0967a98799c0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\Users.html.php',
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
function content_5a24235b714cf9_09590843 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Lista użytkowników</h1>
<?php if (isset($_smarty_tpl->tpl_vars['allUsers']->value)) {
if (count($_smarty_tpl->tpl_vars['allUsers']->value) === 0) {?>
<b>Brak użytkowników w bazie!</b><br/><br/>
<?php } else { ?>
<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allUsers']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
    <li><?php echo $_smarty_tpl->tpl_vars['user']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['user']->value['surname'];?>
 (<?php echo $_smarty_tpl->tpl_vars['user']->value['login'];?>
)
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
users/edit/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
">edycja</a>
        <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
users/delete/<?php echo $_smarty_tpl->tpl_vars['user']->value['id'];?>
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
users/add">Dodaj użytkownika</a>
<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
