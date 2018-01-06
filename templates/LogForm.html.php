{extends file="Main.html.php"}
{block name=title}BazaOgłoszeń - Logowanie{/block}
{block name=body}
<div class="container">
    <div class="page-header">
        <h1>Zaloguj się do Bazy Ogłoszeń</h1>
    </div>
    <form id="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}access/login" method="post">
        <div class="form-group">
            <label for="name">Login</label>
            <input type="text" class="form-control" id="login" name="login" placeholder="Wprowadź login">
        </div>
        <div class="form-group">
            <label for="name">Hasło</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Wprowadź hasło">
        </div>
        <div class="alert alert-danger collapse" role="alert"></div>
        {if isset($message)}
        <div class="alert alert-success" role="alert">{$message}</div>
        {/if}
        {if isset($error)}
        <div class="alert alert-danger" role="alert">{$error}</div>
        {/if}
        <button type="submit" class="btn btn-default">Zaloguj</button>
        <span>Nie masz konta? <a
                    href="http://{$smarty.server.HTTP_HOST}{$subdir}access/regform/">Zarejestruj się</a></span>

    </form>
</div>
{/block}