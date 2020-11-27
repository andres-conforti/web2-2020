{literal}

<section id="vue-comentarios" class="servicios">

<div class="primero" v-if="comments !== null">
<br>
    <ul>
        <li v-for="comentario in comments"> 
         <div class="primeroFiltrado">{{ comentario.usuario }}
         <div class="">{{ comentario.puntaje }} ESTRELLAS</div>
         </div>
         
         <div class="primeroFiltrado">{{ comentario.texto }}</div>

         <div><span v-if="admin == 1"><a v-on:click="del(comentario.id)"  :data-id="comentario.id"><i class="fas fa-trash-alt"></i></a></span></div>

        <br><br>
         </li>
    
        
        
    </ul>
</div>

</section>
{/literal}