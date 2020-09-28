<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 16:16:52
  from 'D:\Users\Usuario\AppData\Local\Programs\xampp\htdocs\web2-2020\templates\detalleServicio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f71f054e14950_78338914',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c78bbb6587ad3d160ee815f245389902579a98cd' => 
    array (
      0 => 'D:\\Users\\Usuario\\AppData\\Local\\Programs\\xampp\\htdocs\\web2-2020\\templates\\detalleServicio.tpl',
      1 => 1601302609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:headerFix.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f71f054e14950_78338914 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:headerFix.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<h3>Hola</h3>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servicio']->value, 'nombre');
$_smarty_tpl->tpl_vars['nombre']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['nombre']->value) {
$_smarty_tpl->tpl_vars['nombre']->do_else = false;
?>
<h3><?php echo $_smarty_tpl->tpl_vars['nombre']->value->nombre;?>
</h3>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
