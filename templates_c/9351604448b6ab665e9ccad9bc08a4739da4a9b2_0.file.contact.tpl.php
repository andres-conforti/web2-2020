<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 03:34:25
  from 'C:\TUDAI\PROGRAMAS\xampp\htdocs\web2\tpe\templates\contact.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fec21501748_89185829',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9351604448b6ab665e9ccad9bc08a4739da4a9b2' => 
    array (
      0 => 'C:\\TUDAI\\PROGRAMAS\\xampp\\htdocs\\web2\\tpe\\templates\\contact.tpl',
      1 => 1601170460,
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
function content_5f6fec21501748_89185829 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="redes">

    <div class="info">
        <h2>ESTUDIO CONTABLE</h2>
        <p><span>Dirección:</span> Av. Espora 989 | Tandil | Bs. As</p>
        <p><span>Teléfono:</span> +54 9 249 447 1234</p>
        <p><span>Mail:</span> info@estudiocontable.com.ar</p>
    </div>

            <div>
                <img src="img/redes/facebook.png" alt="Facebook">
                <p>@EstudioContable</p>
                <img src="img/redes/twitter.png" alt="Twitter">
                <p>@EstudioContable</p>
            </div>

            <div>
                <img src="img/redes/instagram.png" alt="Instagram">
                <p>@EstudioContable</p>
                <img src="img/redes/whatsapp.png" alt="Whatsapp">
                <p> +54 9 249 447 1234</p>
            </div>

        </div>



<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
