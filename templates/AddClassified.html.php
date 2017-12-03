{include file="header.html.php"}

<h1>Dodaj ogłoszenie</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/insert" method="post">
    ID Użytkownika: <input type="text" name="user_id" value="1" readonly/><br/>
    Kategoria:
    <select name="category_id">
        {foreach $allCats as $id => $name}
        <option value="{$id}">{$name}</option>
        {/foreach}
    </select>
    <br/>
    Tytuł: <input type="text" name="title" required/><br/>
    Cena: <input type="number" step="0.01" name="price" required/><br/>
    Treść: <textarea name="content" rows="7" cols="50" required></textarea><br/>
    <input type="submit" value="Dodaj"/>
</form>

{include file="footer.html.php"}