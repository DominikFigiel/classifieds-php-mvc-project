{include file="header.html.php"}
<h1>Edycja Ogłoszenia</h1>

{if isset($oneClassified) and $oneClassified|@count === 1}
{foreach $oneClassified as $classified}

<form id="form" action="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/update" method="post">
        <input type="hidden" name="id" value="{$classified['id']}"/>
        <input type="hidden" name="user_id" value="{$classified['user_id']}" readonly/><br/>
    <div class="form-group">
        <label>Kategoria:</label>
        <select class="form-control" name="category_id">
            {foreach $allCats as $id => $name}
            {if $id == $classified['category_id']}
            <option value="{$id}" selected>{$name}</option>
            {else}
            <option value="{$id}">{$name}</option>
            {/if}
            {/foreach}
        </select>
    </div>
    <div class="form-group">
        <label>Tytuł:</label>
        <input class="form-control" type="text" name="title" value="{$classified['title']}" required/>
    </div>
    <div class="form-group">
        <label>Cena:</label>
        <input class="form-control" type="number" step="0.01" name="price" value="{$classified['price']}"
               required/>
    </div>
    <div class="form-group">
        <label>Miasto:</label>
        <input class="form-control" type="text" name="city" value="{$classified['city']}" required/>
    </div>
    <div class="form-group">
        <label>Treść:</label>
        <textarea class="form-control" name="content" rows="7" cols="50" required>{$classified['content']}</textarea>
    </div>
    <div class="alert alert-danger collapse" role="alert"></div>

    <div class="form-group text-right">
        <button type="button" class="btn btn-danger"
                data-href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/delete/{$classified['id']}"
                data-toggle="modal" data-target="#confirm-delete">
            Usuń ogłoszenie
        </button>
        <input class="btn btn-primary" type="submit" value="Aktualizuj"/>
        <a class="btn btn-secondary" href="http://{$smarty.server.HTTP_HOST}{$subdir}classifieds/"
           role="button">Powrót</a>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Usuwanie ogłoszenia</h4>
                </div>

                <div class="modal-body">
                    <p>Usunięcie ogłoszenia jest nieodwracalne.</p>
                    <p>Czy na pewno chcesz usunąć to ogłoszenie ?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Powrót</button>
                    <a class="btn btn-danger btn-ok">Usuń</a>
                </div>
            </div>
        </div>
    </div>

</form>
{/foreach}
{/if}

{if isset($error)}
<strong>{$error}</strong>
{/if}
{include file="footer.html.php"}