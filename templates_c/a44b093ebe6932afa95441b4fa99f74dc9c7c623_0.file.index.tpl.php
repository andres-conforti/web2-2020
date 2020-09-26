<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 03:31:00
  from 'C:\TUDAI\PROGRAMAS\xampp\htdocs\web2\tpe\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6e99d4330eb9_85753103',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a44b093ebe6932afa95441b4fa99f74dc9c7c623' => 
    array (
      0 => 'C:\\TUDAI\\PROGRAMAS\\xampp\\htdocs\\web2\\tpe\\templates\\index.tpl',
      1 => 1601083858,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6e99d4330eb9_85753103 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="contenido">
    <figure class="imgcontenido">
        <img src="img/aboutus.jpg" alt="trabajo en equipo">
    </figure>
    <div class="textcontenido">
        <h2>SOBRE NOSOTROS</h2>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sequi at doloribus dolore eaque.
            Perferendis
            harum provident quas perspiciatis quis nam deserunt! Ea veritatis, placeat nam enim rem aspernatur
            rerum
            cumque sapiente amet accusantium quo quod laborum repellat molestiae laboriosam praesentium. Rerum
            iste
            ipsum reprehenderit fuga obcaecati esse voluptates odio quam vitae maxime voluptas omnis doloribus
            eligendi delectus minima rem aliquam pariatur ullam voluptatum nam, natus reiciendis exercitationem
            quisquam consequatur! Ipsam eius consequatur, unde dolor explicabo ducimus minima amet nihil illum!
        </p>
    </div>
</section>
<section class="vencimientos">
    <div class="tblvencimientos">
        <h2>VENCIMIENTOS</h2>
        <h2 class="mes">- 07/2020 -</h2>
        <table>
            <thead>
                <tr>
                    <th>IMPUESTO</th>
                    <th colspan="3">FECHA</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="tblCUIT">
                    <th>CUIT</th>
                    <th>0 a 3</th>
                    <th>4 a 6</th>
                    <th>7 a 9</th>
                    <th></th>
                    <th></th>
                </tr>
                <tr class="tblCUIT Filtro">
                    <th>Filtrar Fecha</th>
                    <th><select name="filtro" class="filtro1">
                        <option value="0">...</option>
                        <option value="10">1 - 10</option>
                        <option value="20">11 - 20</option>
                        <option value="31">21 - 31</option>
                    </select></th>
                    <th><select name="filtro" class="filtro2">
                        <option value="0">...</option>
                        <option value="10">1 - 10</option>
                        <option value="20">11 - 20</option>
                        <option value="31">21 - 30</option>
                    </select></th>
                    <th><select name="filtro" class="filtro3">
                        <option value="0">...</option>
                        <option value="10">1 - 10</option>
                        <option value="20">11 - 20</option>
                        <option value="31">21 - 30</option>
                    </select></th>
                    <th></th>
                    <th></th>
                </tr>                
            </thead>
            <tbody id="tabla">
            </tbody>
        </table>
    </div>
    <div class="formvencimientos">
        <label for="impuesto">Impuesto</label>
        <input class="impuesto" type="text" name="impuesto">
        <label for="primercuit">Vencimiento CUIT 0 a 3: </label>
        <input class="primercuit" type="number" name="primercuit">
        <label for="segundocuit">Vencimiento CUIT 4 a 6: </label>
        <input class="segundocuit" type="number" name="segundocuit">
        <label for="tercercuit">Vencimiento CUIT 7 a 9: </label>
        <input class="tercercuit" type="number" name="tercercuit">
        <div class="btnvencimientos">
            <button id="agregar">AGREGAR</button>
            <button id="auto">AGREGAR VARIOS</button>
            <button id="eliminar">VACIAR TABLA</button>
            <button id ="edit" class="btnOculto">EDITAR</button>
        </div>
    </div>
</section>
<hr>
<section class="contacto">
    <a name="LinkContacto" id="linkcontacto"></a>
    <div>
        <h2>ESTUDIO CONTABLE</h2>
        <p><span>Dirección:</span> Av. Espora 989 | Tandil | Bs. As</p>
        <p><span>Teléfono:</span> +54 9 249 447 1234</p>
        <p><span>Mail:</span> info@estudiocontable.com.ar</p>
        <div class="redes">
            <div>
                <img src="img/facebook.png" alt="Facebook">
                <p>@EstudioContable</p>
                <img src="img/twitter.png" alt="Twitter">
                <p>@EstudioContable</p>
            </div>
            <div>
                <img src="img/instagram.png" alt="Instagram">
                <p>@EstudioContable</p>
                <img src="img/whatsapp.png" alt="Whatsapp">
                <p> +54 9 249 447 1234</p>
            </div>
        </div>
    </div>
    <div class="Formulario">
        <h2>DEJANOS TU CONSULTA...</h2>
        <form class="FormContent">
            <label for="Nombre">Nombre y Apellido</label>
            <input type="text" id="inputNombre" name="Nombre" value="" />
            <label for="Teléfono">Teléfono</label>
            <input type="number" id="inputTelefono" name="Teléfono" value="" />
            <label for="Mail">Correo Electronico: </label>
            <input type="email" id="inputMail" name="Mail" value="" />
            <label for="Mensaje">Mensaje:</label>
            <textarea name="comentario" rows="4" cols="60"></textarea>
            <div class="verify">
                <div class="captcha">
                    <img id="imagenCaptcha1" src="img/nro1.jpg" alt="">
                    <img id="imagenCaptcha2" src="img/op1.jpg" alt="">
                    <img id="imagenCaptcha3" src="img/nro2.jpg" alt="">
                </div>
                <button type="button" id="btnActualizarCaptcha">Actualizar</button>
            </div>
            <input type="number" id="resultadoCaptcha" name="Resultado Captcha" value="" />
            <input class="deshabilitado" id="btnContacto" type="submit" value="Enviar" />
        </form>
    </div>
</section><?php }
}
