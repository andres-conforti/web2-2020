{if $smarty.session}     
<section class="servicios" data-serv="{$servicio->id}" data-isAdmin ="{($smarty.session.ISADMIN)}" id="data">
<div class="primero"> 

        <form id="comentarios-form" method="POST" data-user ="{($smarty.session.ID_USER)}">
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
            
        
        <button type="submit" class="btn-primary">ENVIAR COMENTARIO</button>
    </form>




    
        </div>
</section>
{/if}

{include file="vue/list-comentarios.tpl"}
<script src="js/comentarios.js"></script> {*comentarios*}