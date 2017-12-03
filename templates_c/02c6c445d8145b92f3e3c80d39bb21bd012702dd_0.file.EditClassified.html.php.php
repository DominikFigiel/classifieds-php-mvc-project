<?php
/* Smarty version 3.1.31, created on 2017-12-03 16:32:53
  from "C:\xampp\htdocs\BazaOgloszen\templates\EditClassified.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a241925e94f60_38790504',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '02c6c445d8145b92f3e3c80d39bb21bd012702dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\EditClassified.html.php',
      1 => 1512314952,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.html.php' => 1,
    'file:footer.html.php' => 1,
  ),
),false)) {
function content_5a241925e94f60_38790504 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h1>Edycja Ogłoszenia</h1>

<?php if (isset($_smarty_tpl->tpl_vars['oneClassified']->value) && count($_smarty_tpl->tpl_vars['oneClassified']->value) === 1) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['oneClassified']->value, 'classified');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['classified']->value) {
?>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
classifieds/update" method="post">
    <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['classified']->value['id'];?>
"/>
    ID Użytkownika: <input type="text" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['classified']->value['user_id'];?>
" readonly/><br/>
    Kategoria:
    <select name="category_id">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'name', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['name']->value) {
?>
        <?php if ($_smarty_tpl->tpl_vars['id']->value == $_smarty_tpl->tpl_vars['classified']->value['category_id']) {?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" selected><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
        <?php } else { ?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
        <?php }?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </select>
    <br/>
    Tytuł: <input type="text" name="title" value="<?php echo $_smarty_tpl->tpl_vars['classified']->value['title'];?>
" required/><br/>
    Cena: <input type="number" step="0.01" name="price" value="<?php echo $_smarty_tpl->tpl_vars['classified']->value['price'];?>
" required/><br/>
    Treść: <textarea name="content" rows="7" cols="50" required><?php echo $_smarty_tpl->tpl_vars['classified']->value['content'];?>
</textarea><br/>
    <input type="submit" value="Aktualizuj"/>
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
