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
                    <a class="btn btn-danger"
                       href="http://{$smarty.server.HTTP_HOST}{$subdir}users/delete/{$user['id']}">usuń</a>
                </div>
            </div>
        </div>
    </li>
    {/foreach}
</ul>
{/if}
{/if}
{if isset($error)}
<strong>{$error}</strong>
{/if}
<a class="form-control btn btn-primary" href="http://{$smarty.server.HTTP_HOST}{$subdir}users/add">Dodaj użytkownika</a>
{include file="footer.html.php"}