{include file="header.tpl"}

<div class="vencimientos">
<div class="tblvencimientos">

<form action="nuevaCategoria" method="POST" enctype="multipart/form-data">
 <h3>NOMBRE:</h3>
 <textarea name="nombre" rows="3" cols="75"></textarea> <br>

<h3>IMAGEN:</h3>
  <input type="file" name="imagen"><br><br>
  <h3><input type="submit" value="CREAR CATEGORIA" name="imagen"></h3>
</form>
</div>
</div>



{include file="footer.tpl"}