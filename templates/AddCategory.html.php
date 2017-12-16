{include file="header.html.php"}

<h1>Dodaj kategorię</h1>
<form id="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}categories/insert" method="post">
    <div class="form-group">
        <label>Nazwa kategorii:</label>
        <input class="form-control" type="text" name="name" placeholder="Wpisz nazwę.." autofocus/><br/>
    </div>
    <div class="alert alert-danger collapse" role="alert"></div>
    <input class="form-control btn-primary" type="submit" value="Dodaj"/>
</form>

{include file="footer.html.php"}