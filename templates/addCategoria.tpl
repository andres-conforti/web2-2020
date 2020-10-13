{include file="header.tpl"}
{if $msg!=NULL}<div class="errorMensaje"><h2>{$msg}</h2></div>{/if}
<div class="vencimientos">
<div class="tblvencimientos">

<form action="nuevaCategoria" method="POST" enctype="multipart/form-data">
 <h3>NOMBRE:</h3>
 <textarea name="nombre" rows="3" cols="75"></textarea> <br>

<h3>IMAGEN:</h3>
  <input type="file" name="imagen"><br><br>
  <h3><input type="submit" value="CREAR CATEGORIA" name="imagen" class="myButtonAdd2"></h3>
</form>
</div>
</div>


{include file="footer.tpl"}