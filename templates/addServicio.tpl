{include file="header.tpl"}

<div class="vencimientos">
<div class="tblvencimientos">

<form action="nuevoServicio" method="POST">
 <h3>NOMBRE:</h3>
 <textarea name="nombre" rows="3" cols="75"></textarea> <br>

  <h3>HONORARIOS:</h3>
  <input type="number" name="honorarios">

  <h3>DESCRIPCION:</h3>
 <textarea name="descripcion" rows="3" cols="75"></textarea> <br>

  <h3>CATEGORIA:</h3>
    <select name="categoria" class="filtroCategoria">
    <option value="0">ELIJA UNA CATEGORIA</option>
    {foreach from=$categorias item=categoria}
        <option value="{$categoria->id}">{$categoria->nombre}</option>
    {/foreach}
    </select>

<br><h3><input type="submit" value="CREAR SERVICIO" name="submit"></h3>
</form>
</div>
</div>



{include file="footer.tpl"}