      
<section class="servicios">
<div class="primero"> 

        <form id="comentarios-form" method="POST">
            <div>
            <h5>COMENTARIO</h5><br>
            <textarea id="input-text" name="texto" class="form-control" rows="4" cols="40"></textarea>
            </div><br>
                    <h5>CALIFICACION</h5><br>
                    <select id="select-puntaje" name="puntaje" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    {if $smarty.session}
                    <input id="idUser" type="hidden" name="idUsuario" value="{($smarty.session.ID_USER)}">
                    <input type="hidden" name="admin" value="{($smarty.session.ISADMIN)}">
                    {/if}
            
        
        <button type="submit" class="btn-primary">ENVIAR COMENTARIO</button>
    </form>




    
        </div>
</section>


{include file="vue/list-comentarios.vue"}
<script src="js/comentarios.js"></script> {*comentarios*}