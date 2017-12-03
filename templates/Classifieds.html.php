{include file="header.html.php"}
<h1>Lista ogłoszeń</h1>
{if isset($allClassifieds)}
{if $allClassifieds|@count === 0}
<b>Brak ogłoszeń w bazie!</b><br/><br/>
{else}
<ul>
    {foreach $allClassifieds as $classified}
    <li>
        <strong>{$classified['name']}</strong><br/>
        {$classified['login']}<br/>
        {$classified['title']}<br/>
        {$classified['content']}<br/>
        {$classified['price']} {$classified['date']}
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/edit/{$classified['id']}">edycja</a>
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/delete/{$classified['id']}">usuń</a>
    </li>
    {/foreach}
</ul>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/add">Dodaj ogłoszenie</a>
{include file="footer.html.php"}