{include file="header.html.php"}

<h1>Rejestracja użytkownika</h1>
<form id="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}users/insert" method="post">
    <div class="form-group">
        <label>Login:</label>
        <input class="form-control" type="text" name="login" required/><br/>
    </div>
    <div class="form-group">
        <label>Hasło: </label>
        <input class="form-control" type="password" name="password" required/><br/>
    </div>
    <div class="form-group">
        <label>Imię: </label>
        <input class="form-control" type="text" name="name" required/><br/>
    </div>
    <div class="form-group">
        <label>Nazwisko: </label>
        <input class="form-control" type="text" name="surname" required/><br/>
    </div>
    <div class="alert alert-danger collapse" role="alert"></div>
    <input class="form-control btn btn-primary" type="submit" value="Zarejestruj się"/>
</form>
<span>Posiadasz już konto? <a href="http://{$smarty.server.HTTP_HOST}{$subdir}access/logform/">Zaloguj się</a></span>
{include file="footer.html.php"}