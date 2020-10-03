{include file="headerLogin.tpl"}

    <div class="login">
    
        <form class="FormContent" method="post" action="verificar">
        <h1>INGRESE SUS DATOS</h1>

            <label for="email">Email:</label>
            <input type="text" class="inputLogin" name="email" value="" placeholder="Ingrese su email"/>
            <pre></pre>
            <label for="pass">Contraseña:</label>
            <input type="password" class="inputLogin" name="pass" value="" placeholder="********"/>
            <button class="botonEnviar" type="submit"><h1>INGRESAR</h1></button>

        </form>

        
    </div>

{include file="footer.tpl"}