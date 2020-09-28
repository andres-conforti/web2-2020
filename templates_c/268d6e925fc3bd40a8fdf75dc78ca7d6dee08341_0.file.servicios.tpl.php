<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 23:49:45
  from 'C:\TUDAI\PROGRAMAS\xampp\htdocs\web2\tpe\templates\servicios.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f725a79d6a197_18329801',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '268d6e925fc3bd40a8fdf75dc78ca7d6dee08341' => 
    array (
      0 => 'C:\\TUDAI\\PROGRAMAS\\xampp\\htdocs\\web2\\tpe\\templates\\servicios.tpl',
      1 => 1601329783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:navbar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f725a79d6a197_18329801 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<section class="servicios">
        
<div class="filtrar">
<form>
<button type="button">Filtrar por categoria</button>
    <select name="filtro" class="filtroCategoria">
    <option value=" "> </option>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>
        <option value="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</option>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </select>
    </form>
</div>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categorias']->value, 'categoria');
$_smarty_tpl->tpl_vars['categoria']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['categoria']->value) {
$_smarty_tpl->tpl_vars['categoria']->do_else = false;
?>



<div class="primero">
        <div>
            <img src="img/servicios/<?php echo $_smarty_tpl->tpl_vars['categoria']->value->img;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
">
        </div>

        <h3><?php echo $_smarty_tpl->tpl_vars['categoria']->value->nombre;?>
</h3>
        
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['servicios']->value, 'servicio');
$_smarty_tpl->tpl_vars['servicio']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['servicio']->value) {
$_smarty_tpl->tpl_vars['servicio']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['categoria']->value->id == $_smarty_tpl->tpl_vars['servicio']->value->id_categoria_fk) {?>
        <ul>
            <li><a href='infoServicio/<?php echo $_smarty_tpl->tpl_vars['servicio']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['servicio']->value->nombre;?>
</a></li>
        </ul>
        <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>


        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>



    
</section>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
