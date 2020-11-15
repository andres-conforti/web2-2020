{literal}
<section id="app">
    <ul>
        <li v-for="tarea in tareas"
            v-bind:class="{'bg-success': tarea.finalizada == 1}"> 
            
            {{ tarea.titulo }} - {{ tarea.descripcion }} 
        </li>
    </ul>
</section>
{/literal}