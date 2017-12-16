{include file="header.html.php"}
<h1>Edycja Kategorii</h1>

{if isset($oneCat) and $oneCat|@count === 1}
{foreach $oneCat as $id => $name}
<form id="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}categories/update" method="post">
    <div class="form-group">
        <input class="form-control" type="hidden" name="id" value="{$id}">
        <label>Nazwa kategorii:</label>
    </div>
    <div class="form-group">
        <input class="form-control" type="text" name="name" value="{$name}" required/><br/>
    </div>

    <div class="alert alert-danger collapse" role="alert"></div>

    <input class="form-control btn-primary" type="submit" value="Aktualizuj"/>

</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}