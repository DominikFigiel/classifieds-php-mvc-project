{include file="header.html.php"}

<h1>Dodaj użytkownika</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}users/insert" method="post">
    Login: <input type="text" name="login" required /><br />
    Hasło: <input type="password" name="password" required /><br />
    Imię: <input type="text" name="name" required /><br />
    Nazwisko: <input type="text" name="surname" required /><br />
    <input type="submit" value="Dodaj" />
</form>

{include file="footer.html.php"}