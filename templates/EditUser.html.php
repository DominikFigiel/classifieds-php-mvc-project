{include file="header.html.php"}
<h1>Edycja Użytkownika</h1>

{if isset($oneUser) and $oneUser|@count === 1}
{foreach $oneUser as $user}
<form id="edit-user-form" action="http://{$smarty.server.HTTP_HOST}{$subdir}users/update" method="post">
    <div class="form-group">
        <div class="form-group">
        <input type="hidden" id="id" name="id" value="{$user['id']}">
        </div>
        <div class="form-group">
            Login: <input class="form-control" type="text" name="login" value="{$user['login']}" required/><br/>
        </div>
        <div class="form-group">
            Hasło: <input class="form-control" type="password" name="password"/><br/>
        </div>
        <div class="form-group">
        Imię: <input class="form-control" type="text" name="name" value="{$user['name']}" required/><br/>
        </div>
        <div class="form-group">
            Nazwisko: <input class="form-control" type="text" name="surname" value="{$user['surname']}" required/><br/>
        </div>
        <div class="alert alert-danger collapse" role="alert"></div>
        <input class="form-control btn-primary" type="submit" value="Aktualizuj"/>
    </div>
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}