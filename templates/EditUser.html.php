{include file="header.html.php"}
<h1>Edycja Użytkownika</h1>

{if isset($oneUser) and $oneUser|@count === 1}
{foreach $oneUser as $user}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}users/update" method="post">
    <input type="hidden" id="id" name="id" value="{$user['id']}">
    Login: <input type="text" name="login" value="{$user['login']}" required /><br />
    Hasło: <input type="password" name="password" /><br />
    Imię: <input type="text" name="name" value="{$user['name']}" required /><br />
    Nazwisko: <input type="text" name="surname" value="{$user['surname']}" required /><br />
    <input type="submit" value="Aktualizuj" />
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}