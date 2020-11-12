{include file="header.tpl"}
<section class ="servicios">
    <div class="busquedas">
        <ul>
        {foreach from=$servicios item=servicio}
            <li>{$servicio->nombre|upper}: {$servicio->descripcion} </li>
        {/foreach}
        </ul>

    </div>
</section>
{include file="footer.tpl"}