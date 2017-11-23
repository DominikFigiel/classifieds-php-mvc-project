{include file="header.html.php"}
<h1>Lista kategorii</h1>
{if isset($allCats)}
{if $allCats|@count === 0}
<b>Brak kategorii w bazie!</b><br/><br/>
{else}
<ul>
    {foreach $allCats as $id => $name}
    <li>{$name}
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/edit/{$id}">edycja</a>
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/delete/{$id}">usuń</a>
    </li>
    {/foreach}
</ul>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/add">Dodaj kategorię</a>
{include file="footer.html.php"}