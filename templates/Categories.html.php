{include file="header.html.php"}
<h1>Lista kategorii</h1>
{if isset($allCats)}
{if $allCats|@count === 0}
<b>Brak kategorii w bazie!</b><br/><br/>
{else}
<ul class="list-group">
    {foreach $allCats as $id => $name}

    <li class="list-group-item align-items-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{$name}</h4>
                <div class="text-right">
                    <a class="btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/edit/{$id}">edycja</a>
                    <button type="button" class="btn btn-danger"
                            data-href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/delete/{$id}"
                            data-toggle="modal" data-target="#confirm-delete">
                        usuń
                    </button>
                </div>
            </div>
        </div>
    </li>
    {/foreach}
</ul>

<!-- Modal -->
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Usuwanie kategorii</h4>
            </div>

            <div class="modal-body">
                <p>Usunięcie kategorii jest nieodwracalne.</p>
                <p>Czy na pewno chcesz usunąć tę kategorię ?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Powrót</button>
                <a class="btn btn-danger btn-ok">Usuń</a>
            </div>
        </div>
    </div>
</div>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a class="form-control btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}categories/add">Dodaj
    kategorię</a>
{include file="footer.html.php"}