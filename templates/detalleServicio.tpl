{include file="headerFix.tpl"}
{include file="navbar.tpl"}

<<<<<<< HEAD
<div>
  <div>
    <div>


      <ul class="detalleServicio">

        <li class="list-group-item">
          <h3>{$servicio['nombre']} - ${$servicio['honorarios']} - {$categoria['nombre']}<h3>
        </li>
        <li class="list-group-item">{$servicio['descripcion']}</li>
      </ul>
    </div>
  </div>
  <br>
  <br>
</div>


=======
<h3>Hola</h3>
{foreach from=$servicio item=nombre}
<h3>{$nombre->nombre}</h3>
{/foreach}
>>>>>>> 227833993cc8ee8c1f10eb52576177b3fb411c1c
{include file="footer.tpl"}