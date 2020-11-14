{include file="header.tpl"}

<section class="servicios">
        
 <div class="primero">
 <div>
            <img src="img/servicios/{$servicios[0]->img}" alt="{$servicios[0]->categoria}">
            
        </div>

        <h3>{$servicios[0]->categoria}<br>

        {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
        <a href="editarCategoria/{$servicios[0]->id_categoria_fk}" class="myButtonEditarCAT"><i class="fas fa-edit"></i></a>
        <a href="borrarCategoria/{$servicios[0]->id_categoria_fk}" class="myButtonBorrarCAT"><i class="fas fa-trash-alt"></i></a>
        {/if}
        
        </h3>



    {foreach from=$servicios item=servicio}
        <ul>
            <li class="ServicioStyle" ><a href='infoServicio/{$servicio->id}'>{$servicio->nombre}</a></li>

            {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
            <a href="editarServicio/{$servicio->id}" class="myButtonEditar"><i class="fas fa-edit"></i></a>
            <a href="borrarServicio/{$servicio->id}" class="myButtonBorrar"><i class="fas fa-trash-alt"></i></a>
            {/if}

        </ul>
        {/foreach}

</div>
</section>
{include file="footer.tpl"}