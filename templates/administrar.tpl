{include file="header.tpl"}

<div class="vencimientos">
<div class="tblvencimientos">
{if ($smarty.session) && ($smarty.session.ISADMIN)==1}USUARIO ADMINISTRADOR{else}USUARIO NO ADMINISTRADOR{/if}

</div>
</div>



{include file="footer.tpl"}