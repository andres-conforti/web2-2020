{include file="header.tpl"}
{include file="navbar.tpl"}

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

{include file="footer.tpl"}