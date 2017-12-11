{include file="header.html.php"}
<h1>Edycja Ogłoszenia</h1>

{if isset($oneClassified) and $oneClassified|@count === 1}
{foreach $oneClassified as $classified}
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/update" method="post">
    <div class="form-group">
        <input type="hidden" name="id" value="{$classified['id']}"/>
        <input type="hidden" name="user_id" value="{$classified['user_id']}" readonly/><br/>
        Kategoria:
        <select class="form-control" name="category_id">
            {foreach $allCats as $id => $name}
            {if $id == $classified['category_id']}
            <option value="{$id}" selected>{$name}</option>
            {else}
            <option value="{$id}">{$name}</option>
            {/if}
            {/foreach}
        </select>
        <br/>
        <label>Tytuł:</label>
        <input class="form-control" type="text" name="title" value="{$classified['title']}" required/><br/>
        <label>Cena:</label>
        <input class="form-control" type="number" step="0.01" name="price" value="{$classified['price']}"
               required/><br/>
        <label>Miasto:</label>
        <input class="form-control" type="text" name="city" value="{$classified['city']}" required/><br/>
        Treść: <textarea class="form-control" name="content" rows="7" cols="50"
                         required>{$classified['content']}</textarea><br/>
        <input class="form-control btn-primary" type="submit" value="Aktualizuj"/>
    </div>
</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}