<div class="primeroTOP">
        {*FILTRO POR CATEGORIA*}
        <div class="primeroFiltrado">
            
            <form method="post" action="filtrar/" class="select">
                {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
                    <a href="agregarCategoria" class="myButtonAdd">AGREGAR CATEGORIA</a>
    
                    <a href="agregarServicio" class="myButtonAdd">AGREGAR SERVICIO</a>
                {/if}

                <h5>FILTRAR POR CATEGORIA</h5>

                <select name="filtrar" class="filtroCategoria">
                        <option value="ERROR">SELECCIONE UNA CATEGORIA</option>
                    {foreach from=$filtro item=fil}
                        <option value="{$fil->id}">{$fil->nombre}</option>
                    {/foreach}
                </select>

                <button type="submit" class="myButtonFiltrar">FILTRAR</button>
            </form>
        </div>
        {*/////////////////////*}

        {*FILTRO DE PALABRAS*}
        <div class="primeroFiltrado">
            <form method="post" action="buscarServicio">
                <h5>FILTRAR POR PALABRA CLAVE</h5><br>
                <input type="search" name="buscar" placeholder="Texto a filtrar...">
                <button type="submit" class="myButtonFiltrar2"> <i class="fas fa-search"></i></button>
            </form>
        </div>
        {*/////////////////////*}



        {*FILTRO DE HONORARIOS*}
        <div class="primeroFiltrado">
            <form method="post" action="buscarHonorario">
                <h5>FILTRAR POR HONORARIOS</h5><br>
                <input type="radio" name="valor" value="mayor">
                <label for="mayor">MAYORES A</label>

                <input type="radio" name="valor" value="menor">
                <label for="menor">MENORES A</label><br>

                <br><input type="number" name="honorario" placeholder="Honorarios">
                <button type="submit" class="myButtonFiltrar2"> <i class="fas fa-search"></i></button>
            </form>
        </div>
        {*/////////////////////*}

    </div>