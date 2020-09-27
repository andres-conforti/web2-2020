{include file="header.tpl"}
{include file="navbar.tpl"}

<section class="servicios">
    
        


{foreach from=$categorias item=categoria}



<div class="primero">
        <div>
            <img src="img/servicios/{$categoria->img}" alt="{$categoria->nombre}">
        </div>

        <h3>{$categoria->nombre}</h3>
        
        
        {foreach from=$servicios item=servicio}
        {if $categoria->id == $servicio->id_categoria_fk}
        <ul>
        <li>{$servicio->nombre}</li>
        </ul>
        {/if}
        {/foreach}
    </div>


        {/foreach}



    
</section>

{include file="footer.tpl"}