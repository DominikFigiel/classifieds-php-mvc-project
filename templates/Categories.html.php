{include file="header.html.php"}
<h1>Lista kategorii</h1>
{if isset($allCats)}
{if $allCats|@count === 0}
<b>Brak kategorii w bazie!</b><br/><br/>
{else}
<ul>
    {foreach $allCats as $id => $name}
    <li>{$name}
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Categories/showone/{$id}">szczegóły</a>
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}Categories/delete/{$id}">usuń</a>
    </li>
    {/foreach}
</ul>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a href="http://{$smarty.server.HTTP_HOST}{$subdir}Categories/add">Dodaj kategorię</a>
{include file="footer.html.php"}