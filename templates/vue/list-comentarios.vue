{literal}

<section id="vue-comentarios" class="servicios">

<div class="primero">
<br>
    <ul>
        <li v-for="comentario in comments"> 
        
         <div class="primeroFiltrado">USUARIO: {{ comentario.usuario }} - PUNTAJE: {{ comentario.puntaje }}</div>
         
         <div class="primeroFiltrado">{{ comentario.texto }}</div>
        <br><br>
    
        
        </li>
    </ul>
</div>

</section>
{/literal}