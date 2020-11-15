{include file="header.tpl"}



  <section class="servicios">
    
    <div class="primero">

      <h2>{$servicio->categoria}</h2>
      <h4>{$servicio->nombre}{if ($smarty.session) && ($smarty.session.ISADMIN)==1}
            <a href="editarServicio/{$servicio->id}" class="myButtonEditar"><i class="fas fa-edit"></i></a>
            <a href="borrarServicio/{$servicio->id}" class="myButtonBorrar"><i class="fas fa-trash-alt"></i></a>
            {/if}</h4>

      
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
    </div>
  

    </section>
    
{include file='comentarios.tpl'}

{include file="footer.tpl"}