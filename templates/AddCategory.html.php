{include file="header.html.php"}

<h1>Dodaj kategorię</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}categories/insert" method="post">
    <div class="form-group">
        <label>Nazwa kategorii:</label>
        <input class="form-control" type="text" name="name" placeholder="Wpisz nazwę.." autofocus/><br/>
        <input class="form-control btn-primary" type="submit" value="Dodaj"/>
    </div>
</form>

{include file="footer.html.php"}