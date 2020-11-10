{include file="header.tpl"}

    <div class="login">
        {if $msg!=''}<div class="incorrecto"><h2>{$msg}</h2></div>{/if}
        <form class="FormContent" method="post" action="registrarse">
        
        <h1>INGRESE SUS DATOS</h1>

            <label for="email">Email:</label>
            <input type="text" class="inputLogin" id="inputMail" name="email" value="" placeholder="Ingrese su email"/>
            <pre></pre>
            <label for="pass">Contraseña:</label>
            <input type="password" class="inputRegist1" name="pass" value="" placeholder="********"/>
            <label for="pass">Repita la contraseña:</label>
            <input type="password" class="inputRegist2" name="pass2" value="" placeholder="********"/>
            <button class="botonEnviar" type="submit"><h1>REGISTRARSE</h1></button>

        </form>

        
    </div>

    <script src="funciones.js"></script>
    
{include file="footer.tpl"}