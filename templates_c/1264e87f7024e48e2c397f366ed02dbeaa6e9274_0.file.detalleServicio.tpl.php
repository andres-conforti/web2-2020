<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-29 00:28:48
  from 'C:\TUDAI\PROGRAMAS\xampp\htdocs\web2\tpe\templates\detalleServicio.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7263a035acd8_86860089',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1264e87f7024e48e2c397f366ed02dbeaa6e9274' => 
    array (
      0 => 'C:\\TUDAI\\PROGRAMAS\\xampp\\htdocs\\web2\\tpe\\templates\\detalleServicio.tpl',
      1 => 1601332126,
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
function content_5f7263a035acd8_86860089 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:headerFix.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div>
  <div>
    <div>


      <ul class="detalleServicio">

        <li class="list-group-item">
          <h3><?php echo $_smarty_tpl->tpl_vars['servicio']->value['nombre'];?>
 - $<?php echo $_smarty_tpl->tpl_vars['servicio']->value['honorarios'];?>
 - <?php echo $_smarty_tpl->tpl_vars['categoria']->value['nombre'];?>
<h3>
        </li>
        <li class="list-group-item"><?php echo $_smarty_tpl->tpl_vars['servicio']->value['descripcion'];?>
</li>
      </ul>
    </div>
  </div>
  <br>
  <br>
</div>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
