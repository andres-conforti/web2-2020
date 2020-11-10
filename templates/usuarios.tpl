{include file="header.tpl"}
<section class="servicios">
    <div class="primero">
        {if ($smarty.session) && ($smarty.session.ISADMIN)==1}
        <ul>
        {foreach from=$usuarios item=usuario}
            <li class="ServicioStyle" >{$usuario->email}</li>
        </ul>
    </div>
</section>

{include file="footer.tpl"}