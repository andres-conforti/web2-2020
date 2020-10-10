{include file="header.tpl"}

{debug}

VARIABLE LOGIN:  {$Login}<br>

{*VARIABLE ADMIN:  {$Admin}*}

<section class="servicios">
        
        <div class="primeroTOP">
        <form method="post" action="filtrar/" class="select">
        <a href="agregarCategoria" class="myButtonAdd cat">AGREGAR CATEGORIA</a>

        <a href="agregarServicio" class="myButtonAdd">AGREGAR SERVICIO</a>
    <select name="filtrar" class="filtroCategoria">
    {foreach from=$categorias item=categoria}
        <option value="{$categoria->id}">{$categoria->nombre}</option>
    {/foreach}
    </select>
  <button type="submit" class="myButtonFiltrar">FILTRAR</button>
</form>
        </div>




{foreach from=$categorias item=categoria}

<div class="primero">
        <div>
            <img src="img/servicios/{$categoria->img}" alt="{$categoria->nombre}">
            
        </div>

        <h3>{$categoria->nombre} <br>
        <a href="editarCategoria/{$categoria->id}" class="myButtonEditarCAT">EDITAR</a>
        <a href="borrarCategoria/{$categoria->id}" class="myButtonBorrarCAT">BORRAR</a>
        </h3>
        
        
        
        {foreach from=$servicios item=servicio}
        {if $categoria->id == $servicio->id_categoria_fk}
        
        <ul>
            <a href="editarServicio/{$servicio->id}" class="myButtonEditar">EDITAR</a>
            <a href="borrarServicio/{$servicio->id}" class="myButtonBorrar">BORRAR</a>
         
            
            <li class="ServicioStyle" ><a href='infoServicio/{$servicio->id}'>{$servicio->nombre}</a></li>
        </ul>

        {/if}
        {/foreach}
        </div>


        {/foreach}


</section>

{include file="footer.tpl"}