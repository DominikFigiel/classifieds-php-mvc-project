{include file="header.html.php"}
<h1>Edycja Kategorii</h1>

{if isset($oneCat) and $oneCat|@count === 1}
{foreach $oneCat as $id => $name}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}categories/update" method="post">
    <div class="form-group">
        <input class="form-control" type="hidden" name="id" value="{$id}">
        <label>Nazwa kategorii:</label>
        <input class="form-control" type="text" name="name" value="{$name}" required/><br/>
        <input class="form-control btn-primary" type="submit" value="Aktualizuj"/>
    </div>
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}