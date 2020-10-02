{include file="header.tpl"}

  <section class="servicios">
    
    <div class="primero">
      <h3>{$categoria->nombre}</h3>
      <h4>{$servicio->nombre}</h4>
      <table>
        <thead>
          <tr>
            <th>Descripcion</th>
            <th>Honorarios Minimos</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>{$servicio->descripcion}</td>
            <td>{$servicio->honorarios}</td>
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