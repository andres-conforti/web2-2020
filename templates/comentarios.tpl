<div class="py-2 offset-1 col-lg-10 bg-dark">
    <h1 class="text-center tituloTabla"> Comentarios</h1>
    <div class="comentarios">

    </div>
</div>

{include file="vue/list-comentarios.vue"}

<div class="container-fluid">
    <div class="row">
        <div class="py-5 offset-1 col-lg-10 bg-dark">


            


            <form method="POST" class="table-bordered table-dark form-comentario">
                <h1 class="text-center tituloTabla"> Agregar comentario </h1>
                <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                    <textarea  class="form-control" rows="3" cols="50" name="text-comentario"></textarea>
                </div>
                <input type="hidden" class="form-control" name="id_usuario-comentario" value="{if isset($smarty.session)}{$smarty.session.ID_USER}{/if}">
                <input type="hidden" class="form-control" name="admin-comentario" value="{if isset($smarty.session)}{$smarty.session.ISADMIN}{/if}">
                <div class="form-group col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
		            <select  name="puntaje-comentario" class="form-control">
                        <option selected disabled hidden>Puntaje</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                    </select>
	            </div>
                <div class="text-center col-sm-8 offset-sm-2 col-lg-6 offset-lg-3">
                    <button type="sumbit" class="btn btn-primary">Agregar</button>
                </div>
            </form>





        </div>
    </div>
</div>

<script src="js/comentarios.js"></script> {*comentarios*}