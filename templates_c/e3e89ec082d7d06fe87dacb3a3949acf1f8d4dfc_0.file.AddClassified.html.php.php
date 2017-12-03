<?php
/* Smarty version 3.1.31, created on 2017-12-03 16:33:00
  from "C:\xampp\htdocs\BazaOgloszen\templates\AddClassified.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a24192ca7b3f2_95400409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3e89ec082d7d06fe87dacb3a3949acf1f8d4dfc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\AddClassified.html.php',
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
function content_5a24192ca7b3f2_95400409 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<h1>Dodaj ogłoszenie</h1>
<form action="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
classifieds/insert" method="post">
    ID Użytkownika: <input type="text" name="user_id" value="1" readonly/><br/>
    Kategoria:
    <select name="category_id">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['allCats']->value, 'name', false, 'id');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['id']->value => $_smarty_tpl->tpl_vars['name']->value) {
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
?>

    </select>
    <br/>
    Tytuł: <input type="text" name="title" required/><br/>
    Cena: <input type="number" step="0.01" name="price" required/><br/>
    Treść: <textarea name="content" rows="7" cols="50" required></textarea><br/>
    <input type="submit" value="Dodaj"/>
</form>

<?php $_smarty_tpl->_subTemplateRender("file:footer.html.php", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
