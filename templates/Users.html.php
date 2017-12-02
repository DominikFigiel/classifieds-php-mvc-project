{include file="header.html.php"}
<h1>Lista użytkowników</h1>
{if isset($allUsers)}
{if $allUsers|@count === 0}
<b>Brak użytkowników w bazie!</b><br/><br/>
{else}
<ul>
    {foreach $allUsers as $user}
    <li>{$user['name']} {$user['surname']} ({$user['login']})
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