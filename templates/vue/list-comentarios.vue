{literal}
<section id="app" class="servicios">

<div class="primero">
<br>
    <ul>
        <li v-for="comment in comentarios"> 
        
         <div class="primeroFiltrado">USUARIO: {{ comment.usuario }} - PUNTAJE: {{ comment.puntaje }}</div>
         
         <div class="primeroFiltrado">{{ comment.comentario }}</div>
        <br><br>
         

         <span v-if="comment.admin == 1"><a v-on:click="del(comment.id_comentario)"  :data-id="comment.id_comentario" class="btn-eliminar"><i class="fas fa-trash-alt"></i></a></span>
        
        </li>
    </ul>
</div>

</section>
{/literal}