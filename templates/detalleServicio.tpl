{include file="header.tpl"}
{include file="navbar.tpl"}

  <section class="servicios">
    <div class="primero">
      <h3>{$servicio['nombre']}</h3>
      <table>
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>Honorarios Minimos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{$servicio['descripcion']}</td>
            <td>{$servicio['honorarios']}</td>
          </tr>
        </tbody>
      </table>
      {*<ul class="detalleServicio">

        <li class="list-group-item">
          <h3> - ${$servicio['honorarios']} - {$categoria['nombre']}<h3>
        </li>
        <li class="list-group-item">{$servicio['descripcion']}</li>
      </ul>*}
    </div>
  </section>

{include file="footer.tpl"}