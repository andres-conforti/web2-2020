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
            <form method="post" action="editarPermisos">
            <input name="id" type="hidden" value="{$usuario->id}">
            <input name="isAdmin" type="hidden" value="{$usuario->isAdmin}">
            <button type="submit" class="myButtonEditarCAT"><i class="fas fa-edit"></i></button>
            </form>
            </td>
            <td>
            <form method="post" action="borrarUsuario">
            <button type="submit" class="myButtonBorrarCAT" name="id" value="{$usuario->id}"><i class="fas fa-trash-alt"></i></button>
            </form>
            </td>
    </tr>
    {/foreach}
  </tbody>
</table>

</div>
</section>


{include file="footer.tpl"}