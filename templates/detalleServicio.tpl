{include file="headerFix.tpl"}
{include file="navbar.tpl"}

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


{include file="footer.tpl"}