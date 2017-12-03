<?php
/* Smarty version 3.1.31, created on 2017-12-03 17:05:57
  from "C:\xampp\htdocs\BazaOgloszen\templates\header.html.php" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_5a2420e51eb0b0_03471136',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43c508abb42941cb7010c3a4184a2343bf1edc41' => 
    array (
      0 => 'C:\\xampp\\htdocs\\BazaOgloszen\\templates\\header.html.php',
      1 => 1512317077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a2420e51eb0b0_03471136 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<html>
<head>
    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_149225a2420e51db3f3_56423442', 'title');
?>
</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- <link href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
css/style.css" rel="stylesheet" type="text/css" /> -->
</head>
<body>
<nav>
    <ul>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
users">Lista użytkowników</a>
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
categories">Lista kategorii</a>
        </li>
        <li>
            <a href="http://<?php echo $_SERVER['HTTP_HOST'];
echo $_smarty_tpl->tpl_vars['subdir']->value;?>
classifieds">Lista ogłoszeń</a>
        </li>
    </ul>
</nav><?php }
/* {block 'title'} */
class Block_149225a2420e51db3f3_56423442 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_149225a2420e51db3f3_56423442',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Baza Ogłoszeń<?php
}
}
/* {/block 'title'} */
}
