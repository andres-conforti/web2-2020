{include file="header.tpl"}

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

{include file="footer.tpl"}