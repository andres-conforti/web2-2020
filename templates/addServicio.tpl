{include file="header.tpl"}
{if $msg!=NULL}<div class="errorMensaje"><h2>{$msg}</h2></div>{/if}
<div class="vencimientos">
<div class="tblvencimientos">

<form action="nuevoServicio" method="POST">
 <h3>NOMBRE:</h3>
 <textarea class="servicioNombre" name="nombre" rows="3" cols="75"></textarea> <br>

  <h3>HONORARIOS:</h3>
  <input class="honorarios" type="number" name="honorarios">

  <h3>DESCRIPCION:</h3>
 <textarea class="descripcion" name="descripcion" rows="3" cols="75"></textarea> <br>

  <h3>CATEGORIA:</h3>
    <select name="categoria" class="filtroCategoria">
    <option value="">ELIJA UNA CATEGORIA</option>
    {foreach from=$categorias item=categoria}
        <option value="{$categoria->id}">{$categoria->nombreC}</option>
    {/foreach}
    </select>

<br><h3><input type="submit" value="CREAR SERVICIO" name="submit" class="myButtonAdd2 botonservicio"></h3>
</form>
</div>
</div>


<script src="js/funciones.js"></script>
{include file="footer.tpl"}