{include file="headerFix.tpl"}
{include file="navbar.tpl"}

<h3>Hola</h3>
{foreach from=$servicio item=nombre}
<h3>{$nombre->nombre}</h3>
{/foreach}
{include file="footer.tpl"}