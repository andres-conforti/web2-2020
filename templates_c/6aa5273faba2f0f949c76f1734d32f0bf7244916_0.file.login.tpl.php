<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 01:29:51
  from 'C:\TUDAI\PROGRAMAS\xampp\htdocs\web2\tpe\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fceef6417d0_76703499',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6aa5273faba2f0f949c76f1734d32f0bf7244916' => 
    array (
      0 => 'C:\\TUDAI\\PROGRAMAS\\xampp\\htdocs\\web2\\tpe\\templates\\login.tpl',
      1 => 1601162512,
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
function content_5f6fceef6417d0_76703499 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="login">
    
        <form class="FormContent" method="post" action="verificarLogin">
        <h1>INGRESE SUS DATOS</h1>

            <label for="usuario">Usuario:</label>
            <input type="text" class="inputLogin" name="usuario" value="" placeholder="Ingrese su usuario"/>
            <pre></pre>
            <label for="pass">Contraseña:</label>
            <input type="password" class="inputLogin" name="password" value="" placeholder="********"/>
            <button class="botonEnviar" type="submit"><h1>INGRESAR</h1></button>

        </form>

        
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
