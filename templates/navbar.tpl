<nav class="navbar">
        <ul class="navigation">
        
            <li>
                <a href="{$BASE_URL}home">HOME</a>
            </li>
            <li>
                <a href="{$BASE_URL}servicios">SERVICIOS</a>
            </li>
            <li>
                <a href="{$BASE_URL}faq">FAQ</a>
            </li>
            <li>
                <a  href="{$BASE_URL}contacto">CONTACTO</a>
            </li>
            {if !$Login}
            <li>
                <a href="{$BASE_URL}login">LOGIN</a>
            </li>
            </li>
            <li>
                <a href="{$BASE_URL}register">REGISTRARSE</a>
            </li>
            {else}
            <li>
                <a href="{$BASE_URL}administrar">ADMINISTRAR</a>
            </li>
            <li>
                <a href="{$BASE_URL}logout">LOGOUT</a>
            </li>
            {/if}
        </ul>
    </nav>

