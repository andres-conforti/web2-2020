{include file="header.tpl"}

<section class="servicios">
        
{*<div class="filtrar">
<form method="get" action="filtrar">
    <select name="filtro" class="filtroCategoria">
        <option value=" "> </option>
    {foreach from=$categorias item=categoria}
        <option value="{$categoria->id}">{$categoria->nombre}</option>
    {/foreach}
    </select>
    <button type="button">Filtrar</button>
    </form>
</div>*}
<div class="filtrar">

<form  method="post" action="filtrar/">
    <select name="filtrar" class="filtroCategoria">
    {foreach from=$categorias item=categoria}
        <option value="{$categoria->id}">{$categoria->nombre}</option>
    {/foreach}
    </select>
  <button type="submit">FILTRAR</button>
</form>
</div>

{foreach from=$categorias item=categoria}

<div class="primero">
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
    </div>


        {/foreach}



    
</section>

{include file="footer.tpl"}