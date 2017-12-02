{include file="header.html.php"}
<h1>Lista ogłoszeń</h1>
{if isset($allClassifieds)}
{if $allClassifieds|@count === 0}
<b>Brak ogłoszeń w bazie!</b><br/><br/>
{else}
<ul>
    {foreach $allClassifieds as $classified}
    <li>{$classified['name']} {$classified['login']} {$classified['title']} {$classified['content']} {$classified['price']} {$classified['date']}
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}users/edit/{$user['id']}">edycja</a>
        <a href="http://{$smarty.server.HTTP_HOST}{$subdir}users/delete/{$user['id']}">usuń</a>
    </li>
    {/foreach}
</ul>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a href="http://{$smarty.server.HTTP_HOST}{$subdir}users/add">Dodaj użytkownika</a>
{include file="footer.html.php"}