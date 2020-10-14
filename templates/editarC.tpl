{include file="header.tpl"}
{if $msg!=''}<div class="errorMensaje"><h2>{$msg}</h2></div>{/if}

<div class="vencimientos">

<div class="tblvencimientos">
<form action="editCategoria/{$categoria->id}" method="post" enctype="multipart/form-data">
 <h3>NOMBRE:</h3>
 <p>(CAMPO OBLIGATORIO)</p>
 <textarea name="nombre" rows="3" cols="75">{$categoria->nombreC}</textarea> <br>

<h3>IMAGEN:</h3>
  <input type="file" name="imagen"><br><br>
  <h3><input type="submit" value="EDITAR" name="submit" class="myButtonAdd2"></h3>
</form>
</div>
</div>



{include file="footer.tpl"}