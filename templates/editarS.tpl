{include file="header.tpl"}
{if $msg!=''}<div class="errorMensaje"><h2>{$msg}</h2></div>{/if}


<div class="vencimientos">
<div class="tblvencimientos">

<form action="editServicio/{$servicio->id}" method="post">
 <h3>NOMBRE:</h3>
<textarea name="nombre" rows="3" cols="75">{$servicio->nombre}</textarea> <br>

  <h3>HONORARIOS:</h3>
  <input type="number" name="honorarios" value="{$servicio->honorarios}">

  <h3>DESCRIPCION:</h3>
 <textarea name="descripcion" rows="3" cols="75">{$servicio->descripcion}</textarea> <br>

  <h3>CATEGORIA:</h3>
    <select name="categoria" class="filtroCategoria">
    <option value="{$servicio->id_categoria_fk}"> - SIN CAMBIOS - </option>
    {foreach from=$categorias item=categoria}
        {if $categoria->id != $servicio->id_categoria_fk}
        <option value="{$categoria->id}">{$categoria->nombre}</option>
        {/if}
    {/foreach}
    </select>

<br><h3><input type="submit" value="EDITAR" name="submit" class="myButtonAdd"></h3>
</form>
</div>
</div>



{include file="footer.tpl"}