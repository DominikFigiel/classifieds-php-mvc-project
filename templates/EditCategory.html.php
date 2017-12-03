{include file="header.html.php"}
<h1>Edycja Kategorii</h1>

{if isset($oneCat) and $oneCat|@count === 1}
{foreach $oneCat as $id => $name}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}categories/update" method="post">
    <input type="hidden" name="id" value="{$id}">
    Nazwa kategorii: <input type="text" name="name" value="{$name}" required /><br />
    <input type="submit" value="Aktualizuj" />
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}