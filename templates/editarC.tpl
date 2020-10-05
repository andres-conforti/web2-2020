{include file="header.tpl"}

<div class="vencimientos">
<div class="tblvencimientos">


<form action="editCategoria/{$categoria->id}" method="post" enctype="multipart/form-data">
 <h3>NOMBRE:</h3>
 <textarea name="nombre" rows="3" cols="75">
 {$categoria->nombre}
 </textarea> <br>

<h3>IMAGEN:</h3>
  <input type="file" name="fileToUpload" id="fileToUpload"><br><br>
  <h3><input type="submit" value="EDITAR" name="submit"></h3>
</form>
</div>
</div>



{include file="footer.tpl"}