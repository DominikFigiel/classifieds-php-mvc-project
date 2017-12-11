{include file="header.html.php"}

<h1>Dodaj ogłoszenie</h1>
<form action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/insert" method="post">
    <div class="form-group">
        <input class="form-control sr-only" type="text" name="user_id" value="1" readonly/><br/>
        <label>Kategoria:</label>
        <select class="form-control" name="category_id">
            {foreach $allCats as $id => $name}
            <option value="{$id}">{$name}</option>
            {/foreach}
        </select>
        <br/>
        <label>Tytuł:</label>
        <input class="form-control" type="text" name="title" required/><br/>
        <label>Cena:</label>
        <input class="form-control" type="number" step="0.01" min="0" name="price" required/><br/>
        <label>Miasto:</label>
        <input class="form-control" type="text" name="city" required/><br/>
        <label>Treść:</label>
        <textarea class="form-control" name="content" rows="7" cols="50" required></textarea><br/>
        <input class="form-control btn btn-primary" type="submit" value="Dodaj"/>
    </div>
</form>

{include file="footer.html.php"}