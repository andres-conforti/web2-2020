{include file="header.tpl"}

<section class="servicios">



    {include file="filtros.tpl"}

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
            
                        <li class="ServicioStyle"><a href='infoServicio/{$servicio->id}'>{$servicio->nombre}</a></li>
                        {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
                            <a href="editarServicio/{$servicio->id}" class="myButtonEditar"><i class="fas fa-edit"></i></a>
                            <a href="borrarServicio/{$servicio->id}" class="myButtonBorrar"><i class="fas fa-trash-alt"></i></a>
                        {/if}
                    </ul>
            
                {/if}
            {/foreach}
        </div>
    
    
    {/foreach}


    {*PAGINACION*}
    <div class="primeroTOP">
        <div class="primeroFiltrado">
            <div class="pagination">
        <a href="servicios/{$anterior}">&laquo;</a>
                
                {foreach from=$cantidadPaginas item=pagina}
                    <a href="servicios/{$pagina}">{$pagina}</a>
                {/foreach}
                <a href="servicios/{$siguiente}">&raquo;</a>

            </div>
        </div>
    </div>
    {*PAGINACION*}
</section>



{include file="footer.tpl"}