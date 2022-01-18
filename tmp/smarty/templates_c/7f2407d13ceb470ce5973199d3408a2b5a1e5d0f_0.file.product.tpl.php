<?php
/* Smarty version 3.1.39, created on 2022-01-18 13:11:58
  from 'C:\xampp\htdocs\myshop.local\views\default\product.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61e6ae8ebe3397_61888197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f2407d13ceb470ce5973199d3408a2b5a1e5d0f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\product.tpl',
      1 => 1642507877,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61e6ae8ebe3397_61888197 (Smarty_Internal_Template $_smarty_tpl) {
?><h3><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
</h3>

<img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
" width="575px">
Стоимость: <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>


<a href="#" alt="Добавить в корзину">Добавить в корзину</a>
<p>Описание <br/><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p><?php }
}
