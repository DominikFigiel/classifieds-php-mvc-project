{include file="header.html.php"}
<h1>Edycja Użytkownika</h1>

{if isset($oneUser) and $oneUser|@count === 1}
{foreach $oneUser as $user}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}users/update" method="post">
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="{$user['id']}">
        Login: <input class="form-control" type="text" name="login" value="{$user['login']}" required/><br/>
        Hasło: <input class="form-control" type="password" name="password"/><br/>
        Imię: <input class="form-control" type="text" name="name" value="{$user['name']}" required/><br/>
        Nazwisko: <input class="form-control" type="text" name="surname" value="{$user['surname']}" required/><br/>
        <input class="form-control btn-primary" type="submit" value="Aktualizuj"/>
    </div>
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}