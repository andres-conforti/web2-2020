{include file="header.tpl"}

<section class="servicios">

    <div class="primero">
        <h3>{$servicios[0]->categoria}</h3>
        {foreach from=$servicios item=servicio}
            <ul>
                <li><a href='infoServicio/{$servicio->id}'>{$servicio->nombre}</a></li>
            </ul>
        {/foreach}
    </div>
</section>

{include file="footer.tpl"}