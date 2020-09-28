<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 17:32:13
  from 'D:\Users\Usuario\AppData\Local\Programs\xampp\htdocs\web2-2020\templates\register.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f70b07d206ca7_82312374',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c0650e0d791cbbba3fc3c980914a0c16851de0d' => 
    array (
      0 => 'D:\\Users\\Usuario\\AppData\\Local\\Programs\\xampp\\htdocs\\web2-2020\\templates\\register.tpl',
      1 => 1601220457,
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
function content_5f70b07d206ca7_82312374 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender("file:navbar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="login">
    
        <form class="FormContent register" method="post" action="verificarLogin">
        <h1>NUEVO USUARIO</h1>

            <label for="usuario">Usuario:</label>
            <input type="text" class="inputLogin" name="usuario" value="" placeholder="Ingrese su usuario"/>
            <pre></pre>
            <label for="email">Email:</label>
            <input type="text" class="inputLogin" name="email" value="" placeholder="user@email.com"/>
            <pre></pre>
            <label for="pass">Contraseña:</label>
            <input type="password" class="inputLogin" name="password" value="" placeholder="********"/>
            <button class="botonEnviar" type="submit"><h1>REGISTRARSE</h1></button>
            

        </form>

        
    </div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
