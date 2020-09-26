{include file="header.tpl"}
{include file="navbar.tpl"}

{*<div class="login-form">

    <form method="post" action="verificarLogin">
              
        <div class="form-group">
            <label for="exampleInputPassword1">Usuario</label> 
            <input type="input" name="usuario" id="usuario" placeholder="Usuario">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="password" name="pass" id="pass" placeholder="********">
        </div>
        <div class="form-group">
            <button type="submit">Login</button>
        </div>      
    </form>
</div>*}

    <div class="login">
        <form class="FormContent">

            <pre for="usuario">Usuario:</pre>
            <input type="text" id="inputUsuario" name="usuario" value="" />

            <pre for="pass">Contraseña:</pre>
            <input type="password" id="inputPass" name="password" value="" />


            {*<div class="verify">
                <div class="captcha">
                    <img id="imagenCaptcha1" src="img/nro1.jpg" alt="">
                    <img id="imagenCaptcha2" src="img/op1.jpg" alt="">
                    <img id="imagenCaptcha3" src="img/nro2.jpg" alt="">
                </div>
                <button type="button" id="btnActualizarCaptcha">Actualizar</button>
            </div>

            <input type="number" id="resultadoCaptcha" name="Resultado Captcha" value="" />
            <input class="deshabilitado" id="btnContacto" type="submit" value="Enviar" />*}

        </form>
    </div>

{include file="footer.tpl"}