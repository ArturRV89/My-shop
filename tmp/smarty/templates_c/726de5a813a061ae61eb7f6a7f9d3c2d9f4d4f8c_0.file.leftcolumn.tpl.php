<?php
/* Smarty version 3.1.39, created on 2021-12-29 15:49:50
  from 'C:\xampp\htdocs\myshop.local\views\default\leftcolumn.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_61cc758e1e2984_64615685',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '726de5a813a061ae61eb7f6a7f9d3c2d9f4d4f8c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\leftcolumn.tpl',
      1 => 1640789387,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_61cc758e1e2984_64615685 (Smarty_Internal_Template $_smarty_tpl) {
?>
        
        <div id="leftColumn">
            <div id="leftMenu">
                <div class="menuCaption">Меню: </div>
                   <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <a href="#"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br/>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
        </div>
<?php }
}
