{include file="header.html.php"}

<h1>Dodaj kategorię</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}categories/insert" method="post">
    Nazwa kategorii: <input type="text" name="name" /><br />
    <input type="submit" value="Dodaj" />
</form>

{include file="footer.html.php"}