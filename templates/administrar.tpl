{include file="header.tpl"}

<section class="servicios">
<div class="tblvencimientos">
<table>
    <thead>
        <tr>
            <th>Usuarios</th>
            <th>Administrador</th>
            <th>Permisos</th>
            <th>Borrar</th>
        </tr>
    </thead>
    <tbody>
    {foreach from= $usuarios item=usuario}
        <tr>
            <td>{$usuario->email}</td>
            <td>{if ($usuario->isAdmin)}SI
                    {else}NO
                {/if}
            </td>
            <td>
                <a class="" href="editarPermisos/{$usuario->id}/{$usuario->isAdmin}"><i class="fas fa-edit"></i></a>
            </td>
            <td>
                <a class="" href="borrarUsuario/{$usuario->id}"><i class="fas fa-trash-alt"></i></a>
            </td>
    </tr>
    {/foreach}
  </tbody>
</table>

</div>
</section>


{include file="footer.tpl"}