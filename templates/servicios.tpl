{include file="header.tpl"}

<section class="servicios">
        
    <div class="primeroTOP">
        <form method="post" action="filtrar/" class="select">
        {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
        <a href="agregarCategoria" class="myButtonAdd">AGREGAR CATEGORIA</a>

        <a href="agregarServicio" class="myButtonAdd">AGREGAR SERVICIO</a>
        {/if}
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
        {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
        <a href="editarCategoria/{$categoria->id}" class="myButtonEditarCAT"><i class="fas fa-edit"></i></a>
        <a href="borrarCategoria/{$categoria->id}" class="myButtonBorrarCAT"><i class="fas fa-trash-alt"></i></a>
        {/if}
        </h3>
        
        
        
        {foreach from=$servicios item=servicio}
        {if $categoria->id == $servicio->id_categoria_fk}
        
        <ul>

            <li class="ServicioStyle" ><a href='infoServicio/{$servicio->id}'>{$servicio->nombre}</a></li>
        {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
            <a href="editarServicio/{$servicio->id}" class="myButtonEditar"><i class="fas fa-edit"></i></a>
            <a href="borrarServicio/{$servicio->id}" class="myButtonBorrar"><i class="fas fa-trash-alt"></i></a>
            {/if}
        </ul>

        {/if}
        {/foreach}
        </div>


        {/foreach}


</section>

{include file="footer.tpl"}