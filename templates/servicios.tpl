{include file="header.tpl"}

<section class="servicios">



    {include file="filtros.tpl"}

    {foreach from=$categorias item=categoria}
    
        <div class="primero">
            <div>
                <img src="img/servicios/{$categoria->img}" alt="{$categoria->nombre|capitalize:true}">
    
            </div>
    
            <h3>{$categoria->nombre} <br>
                {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
                    <a href="editarCategoria/{$categoria->id}" class="myButtonEditarCAT"><i class="fas fa-edit"></i></a>
                    <a href="borrarCategoria/{$categoria->id}" class="myButtonBorrarCAT"><i class="fas fa-trash-alt"></i></a>
                {/if}
            </h3>
    
    
            {foreach from=$servicios item=servicio}
                {if $categoria->id == $servicio->idFk}
            
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


    {*PAGINAR*}
    
    <div class="primeroTOP">
    <p>PRIMERA: {$paginasTotales.0}</p>
    <br>
    <p>ACTUAL: {$paginaActual} </p>
    <br>
    <p>ULTIMA: {$paginasTotales|@end}</p>
    <br>
    <p>~TOTAL~  {foreach from=$paginasTotales item=pagina} {$pagina} {/foreach}</p>
            
        
        <div class="pagination">

                {if $paginaActual!=$paginasTotales.0} <a href="servicios/{$paginaActual-1}">&laquo;</a> {/if}
                
                {foreach from=$paginasTotales item=pagina}

                <a href="servicios/{$pagina}">{$pagina}</a>
               
                {/foreach}

                {if $paginaActual!=($paginasTotales|@end)} <a href="servicios/{$paginaActual+1}">&raquo;</a> {/if}

            </div>
    </div>
    {*PAGINAR*}


    
</section>



{include file="footer.tpl"}