{include file="header.html.php"}
<h1>Lista użytkowników</h1>
{if isset($allUsers)}
{if $allUsers|@count === 0}
<b>Brak użytkowników w bazie!</b><br/><br/>
{else}
<ul>
    {foreach $allUsers as $user}
    <li class="list-group-item align-items-center">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">{$user['name']} {$user['surname']}</h4>
                <p>({$user['login']})</p>
                <div class="text-right">
                    <a class="btn btn-primary"
                       href="http://{$smarty.server.HTTP_HOST}{$subdir}users/edit/{$user['id']}">edycja</a>
                    <button type="button" class="btn btn-danger"
                            data-href="http://{$smarty.server.HTTP_HOST}{$subdir}users/delete/{$user['id']}"
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
                <h4 class="modal-title">Usuwanie konta użytkownika</h4>
            </div>

            <div class="modal-body">
                <p>Usunięcie konta użytkownika jest nieodwracalne.</p>
                <p>Czy na pewno chcesz usunąć konto tego użytkownika ?</p>
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
<a class="form-control btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}users/add">Dodaj użytkownika</a>
{include file="footer.html.php"}