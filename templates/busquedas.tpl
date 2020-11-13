{include file="header.tpl"}
<section class ="servicios">
    <div class="primero">

        <table>
        {if $servicios}
        <thead>
          <tr>
            <th>Servicio</th>
            <th>Descripcion</th>
            <th>Honorarios Minimos</th>
          </tr>
        </thead>
        <tbody>
        {foreach from=$servicios item=servicio}
          <tr>
            <td>{$servicio->nombre|upper}</td>
            <td>{$servicio->descripcion}</td>
            <td>{$servicio->honorarios}</td>
          </tr>
        {/foreach}
        </tbody>
        {else}
            <p>{$msg}</p>
        {/if}

      </table>
      
    </div>
</section>
{include file="footer.tpl"}