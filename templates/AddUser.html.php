{include file="header.html.php"}

<h1>Dodaj użytkownika</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}users/insert" method="post">
    <div class="form-group">
        <label>Login:</label>
        <input class="form-control" type="text" name="login" required/><br/>
        <label>Hasło: </label>
        <input class="form-control" type="password" name="password" required/><br/>
        <label>Imię: </label>
        <input class="form-control" type="text" name="name" required/><br/>
        <label>Nazwisko: </label>
        <input class="form-control" type="text" name="surname" required/><br/>
        <input class="form-control btn btn-primary" type="submit" value="Dodaj"/>
    </div>
</form>

{include file="footer.html.php"}