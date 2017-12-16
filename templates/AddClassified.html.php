{include file="header.html.php"}

<h1>Dodaj ogłoszenie</h1>
<form id="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/insert" method="post">
    <div class="form-group">
        <input class="form-control sr-only" type="text" name="user_id" value="1" readonly/><br/>
    </div>
    <div class="form-group">
        <label>Kategoria:</label>
        <select class="form-control" name="category_id">
            {foreach $allCats as $id => $name}
            <option value="{$id}">{$name}</option>
            {/foreach}
        </select>
    </div>
    <div class="form-group">
        <label>Tytuł:</label>
        <input class="form-control" type="text" name="title" required/>
    </div>
    <div class="form-group">
        <label>Cena:</label>
        <input class="form-control" type="number" step="0.01" min="0" name="price" required/>
    </div>
    <div class="form-group">
        <label>Miasto:</label>
        <input class="form-control" type="text" name="city" required/>
    </div>
    <div class="form-group">
        <label>Treść:</label>
        <textarea class="form-control" name="content" rows="7" cols="50" required></textarea>
    </div>
    <div class="alert alert-danger collapse" role="alert"></div>
    <input class="form-control btn btn-primary" type="submit" value="Dodaj"/>
</form>

{include file="footer.html.php"}