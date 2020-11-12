<div>
    <h1> Comentarios</h1>
    <div>

    </div>
</div>

{include file="vue/list-comentarios.tpl"}

<div>
    <div>
        <div>
            <form method="POST">
                <h1 class="tituloTabla"> Agregar comentario </h1>
                <div>
                    <textarea name="text-comentario"></textarea>
                </div>
                <input type="hidden" name="id_usuario-comentario" value="{$smarty.session.ID_USER}">
                <input type="hidden" name="admin-comentario" value="{$smarty.session.ISADMIN}">
                <div>
		            <select  name="puntaje-comentario" >
                        <option selected disabled hidden>Puntaje</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                    </select>
	            </div>
                <div>
                    <button type="sumbit">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="js/comentarios.js"></script> {*comentarios*}