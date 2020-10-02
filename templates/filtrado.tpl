{include file="header.tpl"}

<section class="servicios">
        
<div class="primero">
{foreach from=$categorias item=categoria}
    {if $categoria->id == $categoriaFiltrada}
        <div>
            <img src="img/servicios/{$categoria->img}" alt="{$categoria->nombre}">
        </div>

        <h3>{$categoria->nombre}</h3>
        
        {foreach from=$servicios item=servicio}
        {if $categoria->id == $servicio->id_categoria_fk}
        <ul>
            <li><a href='infoServicio/{$servicio->id}'>{$servicio->nombre}</a></li>
        </ul>
        {/if}
        {/foreach}
        {/if}
        {/foreach}
</div>

</section>

{include file="footer.tpl"}