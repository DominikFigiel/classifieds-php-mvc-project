{include file="header.html.php"}
<h1>Edycja Ogłoszenia</h1>

{if isset($oneClassified) and $oneClassified|@count === 1}
{foreach $oneClassified as $classified}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/update" method="post">
    <input type="hidden" name="id" value="{$classified['id']}"/>
    ID Użytkownika: <input type="text" name="user_id" value="{$classified['user_id']}" readonly/><br/>
    Kategoria:
    <select name="category_id">
        {foreach $allCats as $id => $name}
        {if $id == $classified['category_id']}
        <option value="{$id}" selected>{$name}</option>
        {else}
        <option value="{$id}">{$name}</option>
        {/if}
        {/foreach}
    </select>
    <br/>
    Tytuł: <input type="text" name="title" value="{$classified['title']}" required/><br/>
    Cena: <input type="number" step="0.01" name="price" value="{$classified['price']}" required/><br/>
    Treść: <textarea name="content" rows="7" cols="50" required>{$classified['content']}</textarea><br/>
    <input type="submit" value="Aktualizuj"/>
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}